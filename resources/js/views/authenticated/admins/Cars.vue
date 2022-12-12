<script setup>
import { ref, defineProps } from "vue";
const props = defineProps(["locations", "cars"]);
const table = ref({
    layout: "list",
});
const gearbox = [{ name: "manuelle" }, { name: "automatique" }];
const doors = [{ number: 3 }, { number: 5 }];
const places = [{ number: 2 }, { number: 4 }, { number: 5 }, { number: 7 }];
const fuel = [
    { name: "essence" },
    { name: "diesel" },
    { name: "hybride" },
    { name: "electrique" },
];
const car = ref({
    modelYear: null,
    fuelType: null,
    transmission: null,
    placesNumber: null,
    doorsNumber: null,
    price_less_than_3_days: null,
    price_less_than_15_days: null,
    price_more_than_15_days: null,
    price_per_month: null,
});

const addModal = ref(false);
const editModal = ref(false);
</script>
<template>
    <Authenticated>
        <div class="rounded-lg bg-white p-5">
            <div class="flex items-center justify-between">
                <h2 class="text-2xl font-semibold capitalize">
                    liste des vehicles
                </h2>
                <Button
                    class="p-button-sm p-button-info"
                    icon="pi pi-plus"
                    label="Nouveau"
                    @click="addModal = true"
                />
            </div>
        </div>

        <div class="rounded-lg">
            <!--add agency car modal-->
            <Dialog
                v-model:visible="addModal"
                :modal="true"
                class="md:min-w-52"
            >
                <template #header>
                    <h3 class="font-semibold">Ajouter un véhicule</h3>
                </template>
                <form class="mt-2">
                    <div class="md:mt-6 md:flex md:justify-between">
                        <Dropdown
                            v-model="brand"
                            :filter="true"
                            :options="carBrands"
                            class="md:mr-5 md:flex-1 w-full mb-2"
                            optionLabel="name"
                            optionValue="id"
                            placeholder="Sélectionnez la marque"
                        />
                        <Dropdown
                            v-model="model"
                            :filter="true"
                            :options="carBrandModels"
                            class="md:flex-1 w-full mb-2"
                            optionLabel="name"
                            optionValue="id"
                            placeholder="Sélectionnez un model"
                        />
                    </div>
                    <div class="md:mt-6 md:flex md:justify-between">
                        <div class="md:flex-1 mb-2">
                            <span class="p-float-label">
                                <Calendar
                                    v-model="car.modelYear"
                                    class="w-full"
                                    dateFormat="yy"
                                    view="year"
                                />
                                <label> L'année du modèle </label>
                            </span>
                        </div>
                    </div>
                    <!-- <div class="md:mt-6 md:flex md:justify-between">
                            <MultiSelect
                                v-model="locations"
                                :filter="true"
                                :options="locations"
                                class="md:mr-4 w-full md:flex-1 mb-2"
                                display="chip"
                                optionLabel="name"
                                optionValue="id"
                                placeholder="Sélectionnez emplacement(s)"
                            />
                        </div> -->
                    <!-- <div class="md:mt-6 md:flex md:justify-between">
                            <span class="p-float-label md:flex-1 mb-2">
                                <InputNumber
                                    v-model="car.rental_price"
                                    class="w-full"
                                    suffix=" €"
                                />
                                <label> plaque d'immatriculation </label>
                            </span>
                        </div> -->
                    <div class="md:mt-6 md:flex md:justify-between">
                        <span class="p-float-label md:mr-4 md:flex-1 mb-2">
                            <InputNumber
                                v-model="car.price_less_than_3_days"
                                class="w-full"
                                suffix=" €"
                            />
                            <label> Prix &lt; 3 jours </label>
                        </span>
                        <span class="p-float-label md:mr-4 md:flex-1 mb-2">
                            <InputNumber
                                v-model="car.price_less_than_15_days"
                                class="w-full"
                                suffix=" €"
                            />
                            <label> Prix entre 4 et 15 jours </label>
                        </span>
                        <span class="p-float-label md:mr-4 md:flex-1 mb-2">
                            <InputNumber
                                v-model="car.price_more_than_15_days"
                                class="w-full"
                                suffix=" €"
                            />
                            <label> Prix plus 15 jours </label>
                        </span>
                        <span class="p-float-label md:mr-4 md:flex-1 mb-2">
                            <InputNumber
                                v-model="car.price_per_month"
                                class="w-full"
                                suffix=" €"
                            />
                            <label> Prix plus 1 mois </label>
                        </span>
                    </div>
                    <div class="md:mt-6 md:flex md:justify-between">
                        <div class="md:flex-1 border pl-5 mb-2">
                            <h4 class="mb-4 font-semibold">Carburant</h4>
                            <div class="md:flex">
                                <div
                                    v-for="type of fuel"
                                    :key="type.name"
                                    class="mr-5 mb-2 flex items-center"
                                >
                                    <RadioButton
                                        :id="type.name"
                                        v-model="car.fuelType"
                                        :value="type.name"
                                        name="fuel"
                                    />
                                    <label
                                        :for="type.name"
                                        class="ml-2 align-middle capitalize"
                                    >
                                        {{ type.name }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="md:flex-1 border pl-5 mb-2">
                            <h4 class="mb-4 font-semibold">Transmission</h4>
                            <div class="flex">
                                <div
                                    v-for="type of gearbox"
                                    :key="type.name"
                                    class="mr-5 mb-2 flex items-center"
                                >
                                    <RadioButton
                                        :id="type.name"
                                        v-model="car.transmission"
                                        :value="type.name"
                                        name="gearbox"
                                    />
                                    <label
                                        :for="type.name"
                                        class="ml-2 align-middle capitalize"
                                    >
                                        {{ type.name }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="md:mt-6 md:flex md:justify-between">
                        <div class="md:flex-1 border pl-5 mb-2">
                            <h4 class="mb-4 font-semibold">Nombre de places</h4>
                            <div class="flex">
                                <div
                                    v-for="place of places"
                                    :key="place.number"
                                    class="mr-5 mb-2 flex items-center"
                                >
                                    <RadioButton
                                        :id="place.number"
                                        v-model="car.placesNumber"
                                        :value="place.number"
                                        name="places"
                                    />
                                    <label
                                        :for="place.number"
                                        class="ml-2 align-middle capitalize"
                                    >
                                        {{ place.number }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="md:flex-1 border pl-5 mb-2">
                            <h4 class="mb-4 font-semibold">Nombre de portes</h4>
                            <div class="flex">
                                <div
                                    v-for="door of doors"
                                    :key="door.number"
                                    class="mr-5 mb-2 flex items-center"
                                >
                                    <RadioButton
                                        :id="door.number"
                                        v-model="car.doorsNumber"
                                        :value="door.number"
                                        name="doors"
                                    />
                                    <label
                                        :for="door.number"
                                        class="ml-2 align-middle capitalize"
                                    >
                                        {{ door.number }}
                                    </label>
                                </div>
                            </div>
                        </div>
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
            <!--cars-->
            <div class="mb-2 rounded-md shadow-sm">
                <DataTable
                    :layout="table.layout"
                    :paginator="true"
                    :rows="9"
                    :sortField="sortField"
                    :sortOrder="sortOrder"
                    :value="cars"
                >
                    <Column header="Image">
                        <template #body="slotProps">
                            <img
                                :src="`/img/cars/${slotProps.data.brand.name.toLowerCase()}/${slotProps.data.car_model.name
                                    .toLowerCase()
                                    .replace(' ', '_')}.png`"
                                alt=""
                                class="w-40"
                            />
                        </template>
                    </Column>
                    <Column bodyClass="capitalize" header="Véhicule">
                        <template #body="slotProps">
                            <span class="font-bold">
                                {{ slotProps.data.brand.name }}
                                {{ slotProps.data.car_model.name }}
                            </span>
                        </template>
                    </Column>
                    <Column header="Action">
                        <template #body="slotProps">
                            <Button
                                class="p-button-sm p-button-info p-button-rounded"
                                icon="pi pi-eye"
                                @click="goto(slotProps.data.id)"
                            />
                        </template>
                    </Column>
                </DataTable>
            </div>
        </div>
    </Authenticated>
</template>

<style lang="scss" scoped>
::v-deep(.p-dataview-content) {
    .grid {
        display: flex;
        flex-wrap: wrap;
    }
}

::v-deep(div.flex-auto:nth-child(2)) {
    .p-dataview-layout-options {
        box-shadow: none;
    }
}
</style>
