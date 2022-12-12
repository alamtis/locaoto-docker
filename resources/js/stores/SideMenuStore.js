import { defineStore } from "pinia";
export const useSideMenuStore = defineStore("SideMenu", {
  // state
  state: () => {
    return {
      isOpen: false,
    };
  },

  // actions
  actions: {
    toggleSideMenu() {
      this.isOpen = !this.isOpen;
    },
  },
});
