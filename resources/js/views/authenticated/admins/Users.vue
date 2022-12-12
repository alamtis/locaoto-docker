<script setup>
import { ref, defineProps } from "vue";
const props = defineProps(["users"]);
const user = ref({
    name: null,
    email: null,
    password: null,
});
const addModal = ref(false);
const editModal = ref(false);
</script>

<template>
    <Authenticated>
        <div class="flex justify-between items-center">
            <h2 class="capitalize text-2xl font-semibold">
                liste des utilisateurs
            </h2>
            <Button
                class="p-button-sm p-button-info"
                icon="pi pi-plus"
                label="Nouveau"
                @click="addModal = true"
            />
        </div>
        <!--add user modal-->
        <Dialog v-model:visible="addModal" :modal="true">
            <template #header>
                <h3 class="font-semibold">Ajouter un utilisateur</h3>
            </template>
            <form class="mt-2">
                <div class="mt-6">
                    <span class="p-float-label">
                        <InputText
                            id="name"
                            v-model="user.name"
                            class="w-full"
                            type="text"
                        />
                        <label for="name">Nom complet</label>
                    </span>
                </div>
                <div class="mt-6">
                    <span class="p-float-label">
                        <InputText
                            id="email"
                            v-model="user.email"
                            class="w-full"
                            type="email"
                        />
                        <label for="email">Adresse email</label>
                    </span>
                </div>
                <div class="mt-6">
                    <Password
                        v-model="user.password"
                        :feedback="false"
                        class="w-full"
                        placeholder="Mot de passe"
                        toggleMask
                    />
                </div>
            </form>
            <template #footer>
                <Button
                    :loading="processing"
                    class="p-button-info w-full"
                    icon="pi pi-check"
                    label="Ajouter"
                    @click="submit"
                />
            </template>
        </Dialog>
        <!--edit user modal-->
        <Dialog v-model:visible="editModal" :modal="true">
            <template #header>
                <h3 class="font-semibold">Modifier l'utilisateur</h3>
            </template>
            <form class="mt-2" @submit.prevent="update">
                <div class="mt-6">
                    <span class="p-float-label">
                        <InputText
                            v-model.trim="user.name"
                            class="w-full"
                            type="text"
                        />
                        <label for="name">Nom complet</label>
                    </span>
                </div>
                <div class="mt-6">
                    <span class="p-float-label">
                        <InputText
                            v-model="user.email"
                            class="w-full"
                            type="email"
                        />
                        <label for="email">Adresse email</label>
                    </span>
                </div>
                <div class="mt-6">
                    <Password
                        v-model="user.password"
                        :feedback="false"
                        class="w-full"
                        inputClass="w-full"
                        placeholder="Mot de passe"
                        toggleMask
                    />
                </div>
                <div class="mt-6">
                    <Button
                        :loading="user.processing"
                        class="w-full p-button-info"
                        icon="pi pi-check"
                        label="Modifier"
                        type="submit"
                    />
                </div>
            </form>
        </Dialog>
        <!-- users datatable-->
        <div class="mt-6">
            <DataTable
                v-model:expandedRows="expandedRows"
                v-model:filters="filters"
                :globalFilterFields="['name']"
                :paginator="true"
                :rows="10"
                :rowsPerPageOptions="[10, 25, 50]"
                :value="users"
                class="p-datatable-customers"
                dataKey="id"
                filterDisplay="menu"
                responsiveLayout="scroll"
            >
                <template #empty> Aucun Utilisateur.</template>
                <template #loading>
                    Loading employees data. Please wait.</template
                >
                <Column :expander="true" headerStyle="width: 3rem" />
                <Column field="name" header="Nom" />
                <Column field="email" header="Email" />
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
