<script setup>
import { useSideMenuStore } from "../stores/SideMenuStore.js";

const sideMenu = useSideMenuStore();
</script>

<template>
    <transition
        enter-active-class="transition ease-in-out duration-150"
        enter-from-class="opacity-0 transform -translate-x-20"
        enter-to-class="opacity-100"
        leave-active-class="transition ease-in-out duration-150"
        leave-from-class="opacity-100"
        leave-to-class="opacity-0 transform -translate-x-20"
    >
        <aside
            class="fixed inset-y-0 lg:static mt-16 lg:mt-0 z-20 w-64 flex-shrink-0 overflow-y-auto bg-gradient-to-b from-slate-800 to-blue-900 lg:block"
            :class="{ hidden: !sideMenu.isOpen }"
        >
            <div class="py-8 mb-12">
                <h1 class="ml-16 text-xl font-bold text-white">
                    LOCAOTO<span class="text-sm text-orange-500">.ma</span>
                </h1>
            </div>
            <!-- admins -->
            <router-link
                class="mb-3 text-gray-400 flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-200"
                :to="{ name: 'dashboard' }"
            >
                <span class="span-active"></span>
                <span
                    class="span-active-oronge ml-6 p-2 rounded-lg w-48 flex items-center"
                >
                    <i class="pi pi-home mr-2"></i>
                    Dashboard
                </span>
            </router-link>
            <router-link
                class="mb-3 text-gray-400 flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-200"
                :to="{ name: 'reservationsadmin' }"
            >
                <span class="span-active"></span>
                <span
                    class="span-active-oronge ml-6 p-2 rounded-lg w-48 flex items-center"
                >
                    <i class="pi pi-book mr-2"></i>
                    Réservations
                </span>
            </router-link>
            <router-link
                class="mb-3 text-gray-400 flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-200"
                :to="{ name: 'agencies' }"
            >
                <span class="span-active"></span>
                <span
                    class="span-active-oronge ml-6 p-2 rounded-lg w-48 flex items-center"
                >
                    <i class="pi pi-building mr-2"></i>
                    Agences
                </span>
            </router-link>
            <router-link
                class="mb-3 text-gray-400 flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-200"
                :to="{ name: 'cars' }"
            >
                <span class="span-active"></span>
                <span
                    class="span-active-oronge ml-6 p-2 rounded-lg w-48 flex items-center"
                >
                    <i class="pi pi-car mr-2"></i>
                    Véhicules
                </span>
            </router-link>
            <router-link
                class="mb-3 text-gray-400 flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-200"
                :to="{ name: 'employees' }"
            >
                <span class="span-active"></span>
                <span
                    class="span-active-oronge ml-6 p-2 rounded-lg w-48 flex items-center"
                >
                    <i class="pi pi-users mr-2"></i>
                    Employés
                </span>
            </router-link>
            <router-link
                class="mb-3 text-gray-400 flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-200"
                :to="{ name: 'users' }"
            >
                <span class="span-active"></span>
                <span
                    class="span-active-oronge ml-6 p-2 rounded-lg w-48 flex items-center"
                >
                    <i class="pi pi-user mr-2"></i>
                    Utilisateurs
                </span>
            </router-link>
            <router-link
                class="mb-3 text-gray-400 flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-200"
                :to="{ name: 'logos' }"
            >
                <span class="span-active"></span>
                <span
                    class="span-active-oronge ml-6 p-2 rounded-lg w-48 flex items-center"
                >
                    <i class="pi pi-images mr-2"></i>
                    Logos
                </span>
            </router-link>
            <!-- agencies -->
            <router-link
                class="mb-3 text-gray-400 flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-200"
                :to="{ name: 'agencycars' }"
            >
                <span class="span-active"></span>
                <span
                    class="span-active-oronge ml-6 p-2 rounded-lg w-48 flex items-center"
                >
                    <i class="pi pi-car mr-2"></i>
                    Véhicules
                </span>
            </router-link>
            <router-link
                class="mb-3 text-gray-400 flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-200"
                :to="{ name: 'reservationsagency' }"
            >
                <span class="span-active"></span>
                <span
                    class="span-active-oronge ml-6 p-2 rounded-lg w-48 flex items-center"
                >
                    <i class="pi pi-book mr-2"></i>
                    Reservations
                </span>
            </router-link>
            <router-link
                class="mb-3 text-gray-400 flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-200"
                :to="{ name: 'clients' }"
            >
                <span class="span-active"></span>
                <span
                    class="span-active-oronge ml-6 p-2 rounded-lg w-48 flex items-center"
                >
                    <i class="pi pi-users mr-2"></i>
                    Clients
                </span>
            </router-link>
            <router-link
                class="mb-3 text-gray-400 flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-200"
                :to="{ name: 'calendaragency' }"
            >
                <span class="span-active"></span>
                <span
                    class="span-active-oronge ml-6 p-2 rounded-lg w-48 flex items-center"
                >
                    <i class="pi pi-calendar-plus mr-2"></i>
                    Calendar
                </span>
            </router-link>
        </aside>
    </transition>
</template>

<style>
div a {
    display: block;
}
div a.router-link-exact-active {
    color: white;
    /* border-left: 4px solid white; */
}
div a.router-link-exact-active .span-active {
    background-color: white;
    width: 4px;
    height: 26px;
    border-radius: 0 8px 8px 0;
    position: absolute;
    left: 0;
}
div a.router-link-exact-active .span-active-oronge {
    background: linear-gradient(to right, #ff7b00, #ff5100);
}
div a.router-link-exact-active .span-active-oronge:hover {
    background: linear-gradient(to right, #ff5100, #ff7b00);
}
</style>
