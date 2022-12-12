<script setup>
import { useSideMenuStore } from "../stores/SideMenuStore.js";

const sideMenu = useSideMenuStore();
</script>

<template>
    <transition
        enter-active-class="transition ease-in-out duration-150"
        enter-from-class="opacity-0"
        enter-to-class="opacity-100"
        leave-active-class="transition ease-in-out duration-150"
        leave-from-class="opacity-100"
        leave-to-class="opacity-0"
    >
        <div
            v-show="sideMenu.isOpen"
            class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center lg:hidden"
        ></div>
    </transition>
</template>
