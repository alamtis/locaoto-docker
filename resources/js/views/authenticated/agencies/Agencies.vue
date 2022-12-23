<script setup>
import { computed, onBeforeMount, ref } from "vue";
import useStore from "../../../composables/store";
import useImage from "../../../composables/image";
import { useFormData } from "../../../composables/formData";
import { useLocationStore } from "../../../stores/locations";
import axios from "axios";

const AGENCY_URL = "http://localhost:80/api/v1/agencies";
const locationStore = useLocationStore();
const locations = computed(() => locationStore.getLocations);
const totalRecords = ref(null);
const agencies = ref(null);
axios
    .get(AGENCY_URL)
    .then((response) => {
        agencies.value = response.data;
        totalRecords.value = response.data.total;
    })
    .catch((error) => {
        console.log(error);
    });
const { imageFile, imageUrl, handleSelectedImage } = useImage();
const agency = ref({
    name: null,
    phone: null,
    address: null,
    email: null,
    password: null,
    location_id: null,
    logo: null,
});
const addModal = ref(false);
const editModal = ref(false);
const loading = ref(false);

const expandedRows = [];

const storeAgency = () => {
    agency.value.logo = imageFile.value;
    addModal.value = false;
    // const formData = new FormData();
    // for(let key in agency.value) {
    //     formData.append(key, agency.value[key])
    // }
    const { data } = useStore(AGENCY_URL, useFormData(agency.value));
};

const editAgency = (agencyData) => {
    editModal.value = true;
    for (let key in agencyData) {
        if (agency.value.hasOwnProperty(key)) {
            if (key === "logo") imageUrl.value = agencyData[key];

            agency.value[key] = agencyData[key];
        }
    }
};
// UPADET AGENCY
const updateAgency = () => {
    editModal.value = false;
    const formData = new FormData();
    for (let key in agency.value) {
        formData.append(key, agency.value[key]);
    }
    const { data } = useStore(AGENCY_URL, formData);
};
// DELETE AGENCY
const deleteAgency = (id) => {
    axios
        .delete(`${AGENCY_URL}/${id}`)
        .then((response) => {
            console.log(response);
        })
        .catch((error) => {
            console.log(error);
        });
};

// Lifecycle hooks
onBeforeMount(() => {
    locationStore.fetchLocations("http://localhost/api/v1/locations");
    // totalRecords.value = agenciesData;
});
</script>

<template>
    <Toast />
    <div class="flex justify-between">
        <h2 class="text-2xl font-semibold capitalize">liste des agences</h2>
        <Button
            class="p-button-sm p-button-info"
            icon="pi pi-plus"
            label="Nouveau"
            @click="addModal = true"
        />
    </div>

    <!--add agency modal-->
    <Dialog v-model:visible="addModal" :modal="true" class="w-full md:w-1/2">
        <template #header>
            <h3 class="font-semibold">Ajouter un agence</h3>
        </template>
        <form class="mt-2" @submit.prevent="storeAgency">
            <div class="mt-6">
                <span class="p-float-label">
                    <InputText
                        v-model.trim="agency.name"
                        class="w-full"
                        type="text"
                    />
                    <label>Nom d'agence</label>
                </span>
            </div>
            <div class="mt-6">
                <span class="p-float-label">
                    <InputText
                        id="phone"
                        v-model.trim="agency.phone"
                        class="w-full"
                        type="tel"
                    />
                    <label for="phone">Téléphone</label>
                </span>
            </div>
            <div class="mt-6">
                <span class="p-float-label">
                    <InputText
                        id="address"
                        v-model.trim="agency.address"
                        class="w-full"
                        type="text"
                    />
                    <label for="address">Adresse</label>
                </span>
            </div>
            <div class="mt-6">
                <Dropdown
                    v-model="agency.location_id"
                    :filter="true"
                    :options="locations"
                    class="w-full"
                    optionLabel="name"
                    optionValue="id"
                    placeholder="Sélectionnez une ville"
                />
            </div>
            <div class="mt-6">
                <span class="p-float-label">
                    <InputText
                        id="email"
                        v-model="agency.email"
                        class="w-full"
                        type="email"
                    />
                    <label>Adresse email</label>
                </span>
            </div>
            <div class="mt-6">
                <span class="p-float-label">
                    <Password
                        v-model="agency.password"
                        :feedback="false"
                        class="w-full"
                        inputClass="w-full"
                        toggleMask
                    />
                    <label>Mot de passe</label>
                </span>
            </div>
            <div class="mt-6">
                <img
                    v-show="imageUrl"
                    :src="imageUrl"
                    accept="image/*"
                    class="h-48 w-48 object-cover"
                />
                <input
                    accept="image/*"
                    class="w-full"
                    type="file"
                    @change="handleSelectedImage"
                />
            </div>
            <div class="mt-6">
                <Button
                    class="p-button-info w-full"
                    icon="pi pi-check"
                    label="Ajouter"
                    type="submit"
                />
            </div>
        </form>
    </Dialog>

    <!--edit agency modal-->
    <Dialog
        v-model:visible="editModal"
        :modal="true"
        class="w-full md:max-w-2xl"
    >
        <template #header>
            <h3 class="font-semibold">Modifier un agence</h3>
        </template>
        <form class="mt-2" @submit.prevent="updateAgency">
            <div class="mt-6">
                <span class="p-float-label">
                    <InputText
                        v-model.trim="agency.name"
                        class="w-full"
                        type="text"
                    />
                    <label>Nom d'agence</label>
                </span>
            </div>
            <div class="mt-6">
                <span class="p-float-label">
                    <InputText
                        v-model.trim="agency.phone"
                        class="w-full"
                        type="tel"
                    />
                    <label for="phone">Téléphone</label>
                </span>
            </div>
            <div class="mt-6">
                <span class="p-float-label">
                    <InputText
                        v-model.trim="agency.address"
                        class="w-full"
                        type="text"
                    />
                    <label for="address">Adresse</label>
                </span>
            </div>
            <div class="mt-6">
                <Dropdown
                    v-model="agency.location_id"
                    :filter="true"
                    :options="locations"
                    class="w-full"
                    optionLabel="name"
                    optionValue="id"
                    placeholder="Sélectionnez une ville"
                />
            </div>
            <div class="mt-6">
                <span class="p-float-label">
                    <InputText
                        v-model="agency.email"
                        class="w-full"
                        type="email"
                    />
                    <label for="email">Adresse email</label>
                </span>
            </div>
            <div class="mt-6">
                <span class="p-float-label">
                    <Password
                        v-model="agency.password"
                        :feedback="false"
                        class="w-full"
                        inputClass="w-full"
                        toggleMask
                    />
                    <label>Mot de passe</label>
                </span>
            </div>
            <div class="mt-6">
                <span class="p-float-label">
                    <InputNumber v-model="agency.percentage" class="w-full" />
                    <label>Commission</label>
                </span>
            </div>
            <div class="mt-6">
                <img :src="imageUrl" v-show="imageUrl" class="h-48 w-48" />
                <input
                    accept="image/*"
                    class="w-full"
                    type="file"
                    @change="handleSelectedImage"
                />
            </div>
            <div class="mt-6">
                <Button
                    :loading="agency.processing"
                    class="p-button-info w-full"
                    icon="pi pi-check"
                    label="Modifier"
                    type="submit"
                />
            </div>
        </form>
    </Dialog>

    <!-- agencies datatable-->
    <div class="mt-10 grid grid-cols-1">
        <DataTable
            v-model:expandedRows="expandedRows"
            :globalFilterFields="['user.name', 'location.name', 'phone']"
            :paginator="true"
            :loading="loading"
            :lazy="true"
            :totalRecords="totalRecords"
            :rows="10"
            :rowsPerPageOptions="[10, 25, 50]"
            :value="agencies"
            class="p-datatable-customers"
            dataKey="id"
            filterDisplay="menu"
            responsiveLayout="scroll"
        >
            <template #header>
                <div class="align-items-center flex justify-between">
                    <h5 class="m-0">Agencies</h5>
                    <Dropdown
                        :filter="true"
                        :options="locations"
                        class="mb-4 w-64"
                        emptyFilterMessage="Aucune résultat"
                        emptyMessage="Aucune résultat"
                        optionLabel="name"
                        optionValue="id"
                        placeholder="Sélectionnez une ville"
                    />
                </div>
            </template>
            <template #empty> Aucune agence.</template>
            <template #loading>
                Chargement des données des agences. S'il vous plaît, attendez.
            </template>
            <Column :expander="true" headerStyle="width: 3rem" />
            <Column bodyClass="capitalize" field="name" header="Nom" />
            <Column field="email" header="Adresse email" />
            <Column field="phone" header="Téléphone" />
            <Column
                bodyClass="uppercase"
                field="location.name"
                header="Ville"
            />
            <!-- <Column header="Statut">
                <template #body="{ data }">
                    <InputSwitch
                        v-model="data.user.is_active"
                        class=""
                        @change="
                            updateAccountStatus(
                                data.id,
                                data.user.is_active
                            )
                        "
                    />
                </template>
            </Column> -->
            <Column header="Action">
                <template #body="{ data }">
                    <Button
                        class="p-button-sm p-button-secondary mx-1"
                        icon="pi pi-pencil"
                        @click="editAgency(data)"
                    ></Button>
                    <Button
                        class="p-button-sm p-button-danger mx-1"
                        icon="pi pi-trash"
                        @click="deleteAgency(data.id)"
                    ></Button>
                </template> </Column
            ><!--
                <template #expansion="{ data }">
                    <ul>
                        <li class="capitalize">
                            address:
                            <span class="font-semibold">{{
                                data.address
                            }}</span>
                        </li>
                        <li class="capitalize">
                            Affiliation date:
                            <span class="font-semibold">{{
                                data.affiliation_date
                            }}</span>
                        </li>
                    </ul>
                </template> -->
        </DataTable>
    </div>
</template>

<style lang="scss" scoped>
::v-deep(.p-paginator) {
    .p-paginator-current {
        margin-left: auto;
    }
}

::v-deep(.p-datatable.p-datatable-customers) {
    .p-datatable-header {
        padding: 1rem 0;
        text-align: left;
        font-size: 1.5rem;
    }

    .p-paginator {
        padding: 1rem;
    }

    .p-datatable-thead > tr > th {
        text-align: left;
    }

    .p-datatable-tbody > tr > td {
        cursor: auto;
    }

    .p-dropdown-label:not(.p-placeholder) {
        text-transform: uppercase;
    }
}
</style>
