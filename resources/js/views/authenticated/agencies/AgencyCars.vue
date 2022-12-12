<script setup>
  import { ref, reactive, computed, onBeforeMount } from "vue";
  import { useBrandStore } from "../../../stores/brands";
  import { useBrandModelsStore } from "../../../stores/brandModels";
  import { useLocationStore } from "../../../stores/locations";

  const brandStore = useBrandStore();
  const brandModelsStore = useBrandModelsStore();
  const locationStore = useLocationStore();
  const brands = computed(() => brandStore.getBrands);
  const brandModels = computed(() => brandModelsStore.getBrandModels);
  const locations = computed(() => locationStore.getLocations);
  const addModal = ref(false);
  const editModal = ref(false);
  const table = reactive({
    layout: "list",
  });
  const fuel = ["essence", "diesel", "hybride", "electrique"];
  const transmission = ["manuelle", "automatique"];
  const doors = [2, 4];
  const passangers = [2, 4, 5];
  const airConditioning = ["oui", "non"];

  const car = reactive({
    brand: null,
    model: null,
    fuel: null,
    transmission: null,
    doors: null,
    passangers: null,
    air_conditioning: null,
    locations: [],
  });
  const updateBrandModels = (brandId) => {
    brandModelsStore.fetchBrandModels(
      `http://localhost:80/api/v1/brand-models?filter[brand_id]=${brandId}`
    );
  };
  onBeforeMount(() => {
    brandStore.fetchBrands("http://localhost:80/api/v1/brands");
    locationStore.fetchLocations("http://localhost:80/api/v1/locations");
  });
</script>
<template>
  <Authenticated>
    <div class="rounded-lg bg-white p-5">
      <div class="flex items-center justify-between">
        <h2 class="text-2xl font-semibold capitalize">liste des vehicles</h2>
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
          <div class="md:mt-3 md:flex md:space-x-6 md:justify-around">
            <div class="my-3">
              <h4 class="mb-4 font-semibold">Marque</h4>
              <Dropdown
                v-model="car.brand"
                :filter="true"
                :options="brands"
                class="md:mr-5 md:flex-1 w-full mb-2"
                optionLabel="name"
                optionValue="id"
                placeholder="Sélectionnez la marque"
                @change="updateBrandModels($event.value)"
              />
            </div>
            <div class="my-3">
              <h4 class="mb-4 font-semibold">Modèle</h4>
              <Dropdown
                v-model="car.model"
                :filter="true"
                :options="brandModels"
                class="md:flex-1 w-full mb-2"
                optionLabel="name"
                optionValue="id"
                placeholder="Sélectionnez un model"
              />
            </div>
          </div>
          <div class="md:mt-3 md:flex md:space-x-6 md:justify-around">
            <div class="my-3">
              <h4 class="mb-4 font-semibold">Emplacements</h4>
              <MultiSelect
                v-model="car.locations"
                :filter="true"
                :options="locations"
                class="md:mr-4 w-full md:flex-1 mb-2"
                display="chip"
                optionLabel="name"
                optionValue="id"
                placeholder="Sélectionnez emplacement(s)"
              />
            </div>
            <div class="my-3">
              <h4 class="mb-4 font-semibold">Transmission</h4>
              <Dropdown
                v-model="car.transmission"
                :options="transmission"
                class="md:mr-5 md:flex-1 w-full mb-2"
                placeholder="Sélectionnez la transmission"
              />
            </div>
          </div>
          <!-- <div class="md:mt-3 md:flex md:space-x-6 md:justify-around">
                        <span class="p-float-label md:flex-1 mb-2">
                            <InputNumber
                                v-model="car.rental_price"
                                class="w-full"
                                suffix=" €"
                            />
                            <label> plaque d'immatriculation </label>
                        </span>
                    </div> -->
          <div class="md:mt-3 md:flex md:space-x-6 md:justify-around">
            <div class="my-3">
              <h4 class="mb-4 font-semibold">Carburant</h4>
              <Dropdown
                v-model="car.fuel"
                :options="fuel"
                class="md:mr-5 md:flex-1 w-full mb-2"
                placeholder="Sélectionnez le carburant"
              />
            </div>
            <div class="my-3">
              <h4 class="mb-4 font-semibold">Climatisation</h4>
              <Dropdown
                v-model="car.air_conditioning"
                :options="airConditioning"
                class="md:mr-5 md:flex-1 w-full mb-2"
                placeholder="Sélectionnez la transmission"
              />
            </div>
          </div>
          <div class="md:mt-3 md:flex md:space-x-6 md:justify-around">
            <div class="my-3">
              <h4 class="mb-4 font-semibold">Nombre de places</h4>
              <Dropdown
                v-model="car.passangers"
                :options="passangers"
                class="md:mr-5 md:flex-1 w-full mb-2"
                placeholder="Sélectionnez le nombre de places"
              />
            </div>
            <div class="my-3">
              <h4 class="mb-4 font-semibold">Nombre de portes</h4>
              <Dropdown
                v-model="car.doors"
                :options="doors"
                class="md:mr-5 md:flex-1 w-full mb-2"
                placeholder="Sélectionnez le nombre de portes"
              />
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
          <Column
            bodyClass="capitalize"
            header="Véhicule"
          >
            <template #body="slotProps">
              <span class="font-bold">
                {{ slotProps.data.brand.name }}
                {{ slotProps.data.car_model.name }}
              </span>
            </template>
          </Column>
          <Column header="Ville">
            <template #body="slotProps">
              <span
                v-for="location in slotProps.data.locations"
                :key="location.id"
                class="font-bold"
              >
                {{ location.name }}
              </span>
            </template>
          </Column>
          <Column header="Statut">
            <template #body="slotProps">
              <span v-if="slotProps.data.status == 0">
                <span class="p-badge p-badge-success">Disponible</span>
              </span>
              <span v-else-if="slotProps.data.status == 1">
                <span class="p-badge p-badge-info">Loué</span>
              </span>
              <span v-else-if="slotProps.data.status == 2">
                <span class="p-badge p-badge-danger">Non disponible</span>
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
