import axios from "axios";
import { defineStore } from "pinia";

export const useLocationStore = defineStore("location", {
  state: () => ({
    locations: [],
  }),
  getters: {
    getLocations: (state) => state.locations,
  },
  actions: {
    async fetchLocations(URL) {
      try {
        const data = await axios.get(URL);
        this.locations = data.data;
      } catch (error) {
        console.log(error);
      }
    },
  },
});
