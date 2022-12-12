<script setup>
import { ref, defineProps } from "vue";

const date = null;
const expandedRows = [];
</script>
<template>
    <Authenticated>
        <div class="bg-white">
            <DataTable
                v-model:expandedRows="expandedRows"
                v-model:filters="filters"
                :globalFilterFields="['client.first_name']"
                :paginator="true"
                :rows="10"
                :rowsPerPageOptions="[10, 25, 50, 100]"
                :value="reservations"
                class="p-datatable"
                dataKey="id"
            >
                <template #header>
                    <div class="align-items-center flex justify-between">
                        <h5 class="text-2xl font-bold">Reservations</h5>
                        <div class="p-float-label">
                            <Calendar
                                :showIcon="true"
                                dateFormat="dd/mm/yy"
                                @date-select="filterWithDate"
                            />
                            <label for="date">Date</label>
                        </div>
                    </div>
                </template>

                <template #empty> No resrvation found.</template>
                <template #loading>
                    Loading resrvation data. Please wait.</template
                >
                <Column :expander="true" headerStyle="width: 3rem" />
                <Column header="Image">
                    <template #body="slotProps">
                        <img
                            :src="`/img/cars/${slotProps.data.car.brand.name.toLowerCase()}/${slotProps.data.car.car_model.name
                                .toLowerCase()
                                .replace(' ', '_')}.png`"
                            class="w-24"
                        />
                    </template>
                </Column>
                <Column bodyClass="capitalize" header="Véhicule">
                    <template #body="slotProps">
                        <span>
                            {{ slotProps.data.car.brand.name }}
                            {{ slotProps.data.car.car_model.name }}
                        </span>
                    </template>
                </Column>
                <Column bodyClass="capitalize w-50" header="Agence">
                    <template #body="slotProps">
                        <Dropdown
                            :options="slotProps.data.agencies"
                            :placeholder="slotProps.data.agency.name"
                            class="w-full"
                            optionLabel="name"
                            optionValue="id"
                            @change="updateAgency($event, slotProps.data.id)"
                        >
                            <template #option="slotProps">
                                <div class="flex justify-between">
                                    <span class="mr-6">{{
                                        slotProps.option.name
                                    }}</span>
                                    <span class="p-badge p-badge-info">
                                        {{
                                            slotProps.option.reservations_count
                                        }}
                                    </span>
                                </div>
                            </template>
                        </Dropdown>
                    </template>
                </Column>
                <Column bodyClass="capitalize" header="Client">
                    <template #body="slotProps">
                        <span>
                            {{ slotProps.data.client.first_name }}
                            {{ slotProps.data.client.last_name }}
                        </span>
                    </template>
                </Column>
                <Column header="Prix total">
                    <template #body="slotProps">
                        <span> {{ slotProps.data.total_price }} &euro; </span>
                    </template>
                </Column>
                <Column header="Statut d'agence">
                    <template #body="slotProps">
                        <span v-if="slotProps.data.status_agency == 0">
                            <span class="p-badge p-badge-warning"
                                >En attente</span
                            >
                        </span>
                        <span v-else-if="slotProps.data.status_agency == 1">
                            <span class="p-badge p-badge-success"
                                >Confirmé</span
                            >
                        </span>
                        <span v-else-if="slotProps.data.status_agency == 2">
                            <span class="p-badge p-badge-danger">Annulé</span>
                        </span>
                    </template>
                </Column>
                <Column header="Statut">
                    <template #body="slotProps">
                        <span v-if="slotProps.data.status_admin == 0">
                            <span class="p-badge p-badge-warning"
                                >En attente</span
                            >
                        </span>
                        <span v-else-if="slotProps.data.status_admin == 1">
                            <span class="p-badge p-badge-success"
                                >Confirmé</span
                            >
                        </span>
                        <span v-else-if="slotProps.data.status_admin == 2">
                            <span class="p-badge p-badge-danger">Annulé</span>
                        </span>
                    </template>
                </Column>
                <Column header="Action">
                    <template #body="{ data }">
                        <div class="flex">
                            <Button
                                class="p-button-sm p-button-success"
                                icon="pi pi-check"
                                @click="confirmedStatus(data.id)"
                            />
                            <Button
                                class="p-button-sm p-button-danger"
                                icon="pi pi-times"
                                @click="canceledStatus(data.id)"
                            />
                            <Button
                                class="p-button-sm p-button-secondary"
                                icon="pi pi-trash"
                                @click="deleteReservation(data.id)"
                            />
                        </div>
                    </template>
                </Column>
                <template #expansion="{ data }">
                    <ul>
                        <li class="capitalize">
                            Date de début:
                            <span class="font-semibold">
                                {{ data.start_date }}
                            </span>
                            Date fin:
                            <span class="font-semibold">
                                {{ data.end_date }}
                            </span>
                        </li>
                        <li class="capitalize">
                            Durée:
                            <span class="font-semibold">
                                {{ data.number_of_days }} jours
                            </span>
                        </li>
                        <li class="capitalize">
                            Client Télephone:
                            <span class="font-semibold">
                                {{ data.client.phone }}
                            </span>
                        </li>
                        <li class="capitalize">
                            Ville:
                            <span
                                v-for="location in data.car.locations"
                                class="font-semibold"
                            >
                                <span
                                    v-if="
                                        location.pivot.location_id ===
                                        data.location_id
                                    "
                                >
                                    {{ location.name }}
                                </span>
                            </span>
                        </li>
                        <li class="capitalize">
                            Nom d'agence:
                            <span class="font-semibold">
                                {{ data.agency.name }}
                            </span>
                        </li>
                        <li class="capitalize">
                            Agence Télephone:
                            <span class="font-semibold">
                                {{ data.agency.phone }}
                            </span>
                            <br />
                        </li>
                        <li class="capitalize">
                            Prix par jour:
                            <span class="font-semibold">
                                {{ data.price_per_day }} &euro;
                            </span>
                            <br />
                        </li>
                        <li class="capitalize">
                            <span v-if="$page.props.auth.user.can.viewAll">
                                <span v-if="data.status_admin == 1">
                                    Confirmé par :
                                    <span class="font-semibold">{{
                                        data.updated_by_admin.name
                                    }}</span>
                                </span>
                                <span v-else-if="data.status_admin == 2">
                                    Annulé par :
                                    <span class="font-semibold">{{
                                        data.updated_by_admin.name
                                    }}</span>
                                </span>
                            </span>
                            <br />
                        </li>
                    </ul>
                </template>
            </DataTable>
        </div>
    </Authenticated>
</template>

<style lang="scss" scoped>
::v-deep(.p-button-danger) {
    margin-left: 0.5rem;
    margin-right: 0.5rem;
}
</style>
