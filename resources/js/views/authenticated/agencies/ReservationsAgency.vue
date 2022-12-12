<script>
export default {
    props: ["reservations", "selectedDate"],
    data() {
        return {
            selectedAgency: null,
            selectedReservation: null,
            expandedRows: [],
        };
    },
};
</script>

<template>
    <Authenticated>
        <div class="grid grid-cols-1">
            <DataTable
                v-model:expandedRows="expandedRows"
                v-model:filters="filters"
                :paginator="true"
                :rows="10"
                :rowsPerPageOptions="[10, 25, 50]"
                :value="reservations"
                class="rounded-xl"
                dataKey="id"
                responsiveLayout="scroll"
            >
                <template #header>
                    <div class="items-center flex justify-between flex-wrap">
                        <h5 class="text-2xl font-bold">Reservations</h5>
                        <div class="p-float-label my-5">
                            <Calendar
                                v-model="selectedDate"
                                :showIcon="true"
                                dateFormat="dd/mm/yy"
                                @date-select="filterWithDate"
                            />
                            <label for="date">Date</label>
                        </div>
                    </div>
                </template>
                <template #empty>Aucune reservation.</template>
                <template #loading>
                    Loading agencies data. Please wait.</template
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
                <Column bodyClass="capitalize" header="Client">
                    <template #body="slotProps">
                        <span>
                            {{ slotProps.data.client.first_name }}
                            {{ slotProps.data.client.last_name }}
                        </span>
                    </template>
                </Column>
                <Column header="Téléphone">
                    <template #body="slotProps">
                        <span v-if="slotProps.data.status_agency == 1">
                            {{ slotProps.data.client.phone }}
                        </span>
                    </template>
                </Column>
                <Column header="Prix">
                    <template #body="slotProps">
                        <span> {{ slotProps.data.total_price }} &euro; </span>
                    </template>
                </Column>
                <Column header="Statut">
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
                <Column header="Action">
                    <template #body="{ data }">
                        <div v-if="data.status_agency == 1" class="flex">
                            <Button
                                class="p-button-sm p-button-success"
                                disabled="disabled"
                                icon="pi pi-check"
                                @click="confirmedStatus(data.id)"
                            />
                            <Button
                                class="p-button-sm p-button-danger"
                                disabled="disabled"
                                icon="pi pi-times"
                                @click="canceledStatus(data.id)"
                            />
                        </div>
                        <div v-if="data.status_agency == 0" class="flex">
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
                        </div>
                    </template>
                </Column>
                <template #expansion="{ data }">
                    <ul>
                        <li class="capitalize">
                            <span v-if="$page.props.auth.user.can.isAgency">
                                <span v-if="data.status_agency == 1">
                                    Confirmé par :
                                    <span class="font-semibold">
                                        {{ data.updated_by_agency.name }}</span
                                    >
                                </span>
                                <span v-else-if="data.status_agency == 2">
                                    Annulé par :
                                    <span class="font-semibold">
                                        {{ data.updated_by_agency.name }}</span
                                    ></span
                                >
                            </span>
                            <br />
                        </li>
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
                    </ul>
                </template>
            </DataTable>
        </div>
    </Authenticated>
</template>

<style scoped>
/* /deep/  .p-speeddial-action:last-child {
    background: #36b42b;
    color: #fff;
} */
::v-deep(.p-button-danger) {
    margin-left: 0.5rem;
}
</style>
