<script setup>
import { ref, defineProps } from "vue";
const props = defineProps(["clients", "nationalities"]);
const addModal = ref(false);
const editModal = ref(false);
const client = ref({
    firstName: null,
    lastName: null,
    phone: null,
    identity: null,
    address: null,
    email: null,
});
</script>

<template>
    <Authenticated>
        <div class="mb-5 flex justify-between items-center">
            <h2 class="text-2xl font-semibold capitalize">liste des clients</h2>
            <Button
                class="p-button-sm p-button-info"
                icon="pi pi-plus"
                label="Nouveau"
                @click="addModal = true"
            />
        </div>

        <!--add client modal-->
        <Dialog
            ref="modal"
            v-model:visible="addModal"
            :modal="true"
            class="w-full md:max-w-2xl"
        >
            <template #header>
                <h3 class="font-semibold">Ajouter un client</h3>
            </template>
            <form class="mt-2" @submit.prevent="submit">
                <div class="md:mt-6 md:flex md:justify-between">
                    <span class="p-float-label md:flex-1 md:mr-4 mt-6 md:mt-0">
                        <InputText
                            v-model.trim="client.firstName"
                            class="w-full"
                            type="text"
                        />
                        <label>Prénom</label>
                    </span>
                    <span class="p-float-label md:flex-1 mt-6 md:mt-0">
                        <InputText
                            v-model.trim="client.lastName"
                            class="w-full"
                            type="text"
                        />
                        <label>Nom</label>
                    </span>
                </div>
                <div class="md:mt-6 md:flex md:justify-between">
                    <span class="p-float-label md:flex-1 md:mr-4 mt-6 md:mt-0">
                        <InputText
                            v-model.trim="client.phone"
                            class="w-full"
                            type="tel"
                        />
                        <label for="phone">Téléphone</label>
                    </span>
                    <span class="p-float-label md:flex-1 mt-6 md:mt-0">
                        <InputText
                            id="identity"
                            v-model.trim="client.identity"
                            class="w-full"
                        />
                        <label for="identity">Identité</label>
                    </span>
                </div>
                <div class="mt-6">
                    <span class="p-float-label">
                        <InputText
                            id="address"
                            v-model.trim="address"
                            class="w-full"
                            type="text"
                        />
                        <label for="address">Adresse</label>
                    </span>
                </div>
                <div class="mt-6">
                    <span class="p-float-label">
                        <InputText id="email" v-model="email" class="w-full" />
                        <label for="email">
                            Adresse email
                            <span class="text-sm text-red-400">
                                (Optionnel)
                            </span>
                        </label>
                    </span>
                </div>
                <div class="mt-6">
                    <span class="p-float-label">
                        <Dropdown
                            class="w-full"
                            optionLabel="name"
                            optionValue="id"
                        />
                        <label> Nationalité </label>
                    </span>
                </div>
                <div class="mt-6">
                    <Button
                        :loading="processing"
                        class="w-full p-button-info"
                        icon="pi pi-check"
                        label="Ajouter"
                        type="submit"
                    />
                </div>
            </form>
        </Dialog>

        <!--edit client modal-->
        <Dialog
            ref="modal"
            v-model:visible="editModal"
            :modal="true"
            class="w-full md:max-w-2xl"
        >
            <template #header>
                <h3 class="font-semibold">Modifier un client</h3>
            </template>
            <form @submit.prevent="update">
                <div class="md:mt-6 md:flex md:justify-between">
                    <span class="p-float-label md:flex-1 md:mr-4 mt-6 md:mt-0">
                        <InputText
                            id="efirstName"
                            v-model.trim="client.first_name"
                            class="w-full"
                            type="text"
                        />
                        <label for="efirstName">Prénom</label>
                    </span>
                    <span
                        class="p-float-label p-float-label md:flex-1 mt-6 md:mt-0"
                    >
                        <InputText
                            id="elastName"
                            v-model.trim="client.last_name"
                            class="w-full"
                            type="text"
                        />
                        <label for="elastName">Nom</label>
                    </span>
                </div>
                <div class="md:mt-6 md:flex md:justify-between">
                    <span class="p-float-label md:flex-1 md:mr-4 mt-6 md:mt-0">
                        <InputText
                            id="ephone"
                            v-model.trim="client.phone"
                            class="w-full"
                            type="tel"
                        />
                        <label for="ephone">Téléphone</label>
                    </span>
                    <span class="p-float-label md:flex-1 mt-6 md:mt-0">
                        <InputText
                            id="eidentity"
                            v-model.trim="client.identity"
                            class="w-full"
                        />
                        <label for="eidentity">Identité</label>
                    </span>
                </div>
                <div class="md:mt-6 md:flex md:justify-between">
                    <span class="p-float-label md:flex-1 md:mr-4 mt-6 md:mt-0">
                        <Calendar
                            id="ebirthday"
                            v-model="client.birthdate"
                            class="w-full"
                            dateFormat="dd/mm/yy"
                        />
                        <label for="ephone">Date de naissance</label>
                    </span>
                    <span class="p-float-label md:flex-1 mt-6 md:mt-0">
                        <Calendar
                            id="edriverLicenseDate"
                            v-model="client.driver_license_date"
                            class="w-full"
                            dateFormat="dd/mm/yy"
                        />
                        <label for="eidentity"
                            >Date d'obtention de permis</label
                        >
                    </span>
                </div>
                <div class="mt-6">
                    <span class="p-float-label">
                        <InputText
                            id="edriverLicense"
                            v-model.trim="client.driver_license"
                            class="w-full"
                            type="text"
                        />
                        <label for="edriverLicense">N° Permis</label>
                    </span>
                </div>
                <div class="mt-6">
                    <span class="p-float-label">
                        <InputText
                            id="eaddress"
                            v-model.trim="client.address"
                            class="w-full"
                            type="text"
                        />
                        <label for="eaddress">Adresse</label>
                    </span>
                </div>
                <div class="mt-6">
                    <span class="p-float-label">
                        <InputText
                            id="eemail"
                            v-model="client.email"
                            class="w-full"
                        />
                        <label for="eemail">
                            Adresse email
                            <span class="text-sm text-red-400">
                                (Optionnel)
                            </span>
                        </label>
                    </span>
                </div>
                <div class="mt-6">
                    <span class="p-float-label">
                        <Dropdown
                            id="enationality"
                            v-model="client.nationality"
                            class="w-full"
                            optionLabel="name"
                            optionValue="id"
                        />
                        <label for="enationality"> Nationalité </label>
                    </span>
                </div>
                <div class="mt-6">
                    <Button
                        :loading="client.processing"
                        class="w-full p-button-info"
                        icon="pi pi-check"
                        label="Modifier"
                        type="submit"
                    />
                </div>
            </form>
        </Dialog>

        <!--    === Clients ===    -->
        <div class="grid grid-cols-1">
            <DataTable
                v-model:expandedRows="expandedRows"
                :globalFilterFields="['name', 'identity']"
                :paginator="true"
                :rows="10"
                :rowsPerPageOptions="[10, 25, 50]"
                :value="clients"
                class="p-datatable-customers"
                dataKey="id"
                filterDisplay="menu"
                responsiveLayout="scroll"
            >
                <template #header>
                    <div class="items-center flex justify-between flex-wrap">
                        <h5 class="m-0">Clients</h5>
                        <span class="p-input-icon-left">
                            <i class="pi pi-search" />
                            <InputText placeholder="Rechercher" />
                        </span>
                    </div>
                </template>
                <template #empty> Aucun clients.</template>
                <template #loading>
                    Chargement des clients, veuillez patienter.</template
                >
                <Column :expander="true" headerStyle="width: 3rem" />
                <Column
                    bodyClass="capitalize"
                    field="name"
                    header="Nom complet"
                />
                <Column
                    bodyClass="capitalize"
                    field="nationality"
                    header="Nationalité"
                />
                <Column field="identity" header="Identité" />
                <Column field="phone" header="Téléphone" />
                <Column header="Action">
                    <template #body="{ data }">
                        <Button
                            class="p-button-sm p-button-secondary"
                            icon="pi pi-pencil"
                            @click="showEditModal(data)"
                        >
                        </Button>
                    </template>
                </Column>
                <template #expansion="{ data }">
                    <ul>
                        <li class="capitalize">
                            Adresse:
                            <span class="font-semibold">
                                {{ data.address }}
                            </span>
                        </li>
                        <li v-if="data.email" class="capitalize">
                            Adresse email:
                            <span class="font-semibold">
                                {{ data.email }}
                            </span>
                        </li>
                        <li class="capitalize">
                            Age:
                            <span class="font-semibold"> {{ data.age }} </span>
                        </li>
                        <li class="capitalize">
                            Permis depuis:
                            <span class="font-semibold">
                                {{ data.driver_license_age }}
                            </span>
                        </li>
                    </ul>
                </template>
            </DataTable>
        </div>
    </Authenticated>
</template>
