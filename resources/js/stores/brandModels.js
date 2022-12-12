import axios from "axios";
import { defineStore } from "pinia";

export const useBrandModelsStore = defineStore("brandModels", {
  state: () => ({
    brandModels: [],
  }),
  getters: {
    getBrandModels: (state) => state.brandModels,
  },
  actions: {
    async fetchBrandModels(URL) {
      try {
        const data = await axios.get(URL);
        this.brandModels = data.data;
      } catch (error) {
        console.log(error);
      }
    },
  },
});
