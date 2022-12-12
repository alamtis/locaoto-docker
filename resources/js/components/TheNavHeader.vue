<script setup>
import Avatar from "primevue/avatar";
import { useSideMenuStore } from "../stores/SideMenuStore.js";

const sideMenu = useSideMenuStore();
const toggleSideBar = () => {
    sideMenu.toggleSideMenu();
};
const props = defineProps({
    isNotificationsMenuOpen: {
        type: Boolean,
        default: false,
    },
    isProfileMenuOpen: {
        type: Boolean,
        default: false,
    },
});
</script>

<template>
    <header class="z-10 py-4 md:bg-inherit bg-white">
        <div
            class="flex items-center justify-between h-full px-6 mx-auto text-slate-500"
        >
            <div class="hidden lg:block"></div>
            <!-- Mobile hamburger -->
            <button
                aria-label="Menu"
                class="p-1 -ml-1 mr-5 rounded-md lg:hidden focus:outline-none focus:shadow-outline-purple"
                @click="toggleSideBar"
            >
                <svg
                    aria-hidden="true"
                    class="w-6 h-6"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                >
                    <path
                        clip-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        fill-rule="evenodd"
                    ></path>
                </svg>
            </button>
            <ul class="flex items-center flex-shrink-0 space-x-6">
                <!-- Notifications menu -->
                <li class="relative">
                    <button
                        aria-haspopup="true"
                        aria-label="Notifications"
                        class="relative align-middle rounded-md focus:outline-none focus:shadow-outline-purple"
                    >
                        <svg
                            aria-hidden="true"
                            class="w-5 h-5"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                        >
                            <path
                                d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"
                            ></path>
                        </svg>
                        <!-- Notification badge -->
                        <span
                            aria-hidden="true"
                            class="absolute top-0 right-0 inline-block w-3 h-3 transform translate-x-1 -translate-y-1 bg-orange-600 border-2 border-white rounded-full"
                        ></span>
                    </button>
                    <template v-if="isNotificationsMenuOpen">
                        <transition
                            leave-active-class="transition ease-in duration-150"
                            leave-from-class="opacity-100"
                            leave-to-class="opacity-0"
                        >
                            <ul
                                aria-label="submenu"
                                class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md"
                            >
                                UL LIST
                            </ul>
                        </transition>
                    </template>
                </li>
                <!-- Profile menu -->
                <li class="relative">
                    <span class="text-slate-800 capitalize mr-3">
                        USERNAME
                    </span>
                    <button
                        aria-haspopup="true"
                        aria-label="Account"
                        class="align-middle rounded-full focus:shadow-outline-purple focus:outline-none"
                    >
                        <Avatar
                            class="w-8 h-8"
                            icon="pi pi-user"
                            shape="circle"
                        />
                    </button>
                    <template v-if="isProfileMenuOpen">
                        <transition
                            leave-active-class="transition ease-in duration-150"
                            leave-from-class="opacity-100"
                            leave-to-class="opacity-0"
                        >
                            <ul
                                aria-label="submenu"
                                class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md"
                            ></ul>
                        </transition>
                    </template>
                </li>
            </ul>
        </div>
    </header>
</template>
