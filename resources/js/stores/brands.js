import axios from "axios";
import { defineStore } from "pinia";

export const useBrandStore = defineStore("brand", {
  state: () => ({
    brands: [],
  }),
  getters: {
    getBrands: (state) => state.brands,
  },
  actions: {
    async fetchBrands(URL) {
      try {
        const data = await axios.get(URL);
        this.brands = data.data;
      } catch (error) {
        console.log(error);
      }
    },
  },
});
