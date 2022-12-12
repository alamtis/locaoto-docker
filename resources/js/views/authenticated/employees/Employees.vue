<script setup>
import { ref, defineProps } from "vue";
const props = defineProps(["locations", "success", "employees"]);
const employee = ref({
    name: null,
    phone: null,
    cin: null,
    email: null,
    password: null,
});
const addModal = ref(false);
const editModal = ref(false);
const expandedRows = [];
</script>
<template>
    <Authenticated>
        <Toast />
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-semibold capitalize">
                liste des employes
            </h2>
            <Button
                class="p-button-sm p-button-info"
                icon="pi pi-plus"
                label="Nouveau"
                @click="addModal = true"
            />
        </div>

        <!--add employee modal-->
        <Dialog
            v-model:visible="addModal"
            :modal="true"
            class="md:max-w-2xl w-full"
        >
            <template #header>
                <h3 class="font-semibold">Ajouter un employe</h3>
            </template>
            <form class="mt-2" @submit.prevent="submit">
                <div class="mt-6">
                    <span class="p-float-label">
                        <InputText
                            id="name"
                            v-model.trim="employee.name"
                            class="w-full"
                            type="text"
                        />
                        <label for="name">Nom complet</label>
                    </span>
                </div>
                <div class="mt-6">
                    <span class="p-float-label">
                        <InputText
                            id="phone"
                            v-model.trim="employee.cin"
                            class="w-full"
                            type="tel"
                        />
                        <label for="phone">Cin</label>
                    </span>
                </div>
                <div class="mt-6">
                    <span class="p-float-label">
                        <InputText
                            id="phone"
                            v-model.trim="employee.phone"
                            class="w-full"
                            type="tel"
                        />
                        <label for="phone">Téléphone</label>
                    </span>
                </div>
                <div class="mt-6">
                    <Dropdown
                        v-model="selectedLocation"
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
                            v-model="employee.email"
                            class="w-full"
                            type="email"
                        />
                        <label for="email">Adresse email</label>
                    </span>
                </div>
                <div class="mt-6">
                    <Password
                        v-model="employee.password"
                        :feedback="false"
                        class="w-full"
                        inputClass="w-full"
                        placeholder="Mot de passe"
                        toggleMask
                    />
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

        <!-- edit employee modal-->
        <Dialog
            v-model:visible="editModal"
            :modal="true"
            class="md:max-w-2xl w-full"
        >
            <template #header>
                <h3 class="font-semibold">Modifier un employe</h3>
            </template>
            <form class="mt-2" @submit.prevent="update">
                <ValidationErrors />
                <div class="mt-6">
                    <span class="p-float-label">
                        <InputText
                            v-model.trim="employee.name"
                            class="w-full"
                            type="text"
                        />
                        <label for="name">Nom complet</label>
                    </span>
                </div>
                <div class="mt-6">
                    <span class="p-float-label">
                        <InputText
                            v-model.trim="employee.phone"
                            class="w-full"
                            type="tel"
                        />
                        <label for="phone">Téléphone</label>
                    </span>
                </div>
                <div class="mt-6">
                    <span class="p-float-label">
                        <InputText
                            v-model.trim="employee.cin"
                            class="w-full"
                            type="text"
                        />
                        <label>Cin</label>
                    </span>
                </div>
                <div class="mt-6">
                    <Dropdown
                        v-model="employee.selectedLocation"
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
                            v-model="employee.email"
                            class="w-full"
                            type="email"
                        />
                        <label for="email">Adresse email</label>
                    </span>               
                </div>
                <div class="mt-6">
                    <Password
                        v-model="employee.password"
                        :feedback="false"
                        class="w-full"
                        inputClass="w-full"
                        toggleMask
                    />
                </div>
                <div class="mt-6">
                    <Button
                        :loading="employee.processing"
                        class="w-full p-button-info"
                        icon="pi pi-check"
                        label="Modifier"
                        type="submit"
                    />
                </div>
            </form>
        </Dialog>

        <!-- employee datatable-->
        <div class="mt-6 grid grid-cols-1">
            <DataTable
                v-model:expandedRows="expandedRows"
                v-model:filters="filters"
                :globalFilterFields="['name']"
                :paginator="true"
                :rows="10"
                :rowsPerPageOptions="[10, 25, 50]"
                :value="employees"
                class="p-datatable-customers"
                dataKey="id"
                filterDisplay="menu"
                responsiveLayout="scroll"
            >
                <template #header>
                    <div class="items-center flex justify-between flex-wrap">
                        <h5 class="mb-2 md:m-0">Employes</h5>
                        <span class="p-input-icon-left">
                            <i class="pi pi-search" />
                            <InputText placeholder="Rechercher" />
                        </span>
                    </div>
                </template>
                <template #empty> Aucun employés.</template>
                <template #loading>
                    Loading employees data. Please wait.</template
                >
                <Column :expander="true" headerStyle="width: 3rem" />
                <Column bodyClass="capitalize" field="name" header="Nom" />
                <Column field="email" header="Email" />
                <Column field="phone" header="Téléphone" />
                <Column field="cin" header="Cin" />
                <Column bodyClass="uppercase" field="" header="Ville" />
                <Column header="Action">
                    <template #body="{ data }">
                        <Button
                            class="p-button-secondary"
                            icon="pi pi-pencil"
                            @click="showEditModal(data)"
                        ></Button>
                    </template>
                </Column>
            </DataTable>
        </div>
    </Authenticated>
</template>

<style lang="scss" scoped>
::v-deep(.p-paginator) {
    .p-paginator-current {
        margin-left: auto;
    }
}

::v-deep(.p-datatable.p-datatable-customers) {
    .p-datatable-header {
        padding: 1rem;
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
