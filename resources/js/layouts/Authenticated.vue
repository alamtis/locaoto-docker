<script setup>
import TheSideBar from "../components/TheSideBar.vue";
import TheBackdrop from "../components/TheBackdrop.vue";
import TheNavHeader from "../components/TheNavHeader.vue";
import { useSideMenuStore } from "../stores/SideMenuStore.js";

const sideMenu = useSideMenuStore();
</script>

<template>
    <div
        :class="{ 'overflow-hidden': sideMenu.isOpen }"
        class="flex min-h-screen bg-gray-50"
    >
        <!-- Sidebar -->
        <TheSideBar />
        <!-- Backdrop -->
        <TheBackdrop />
        <div class="flex flex-col flex-1">
            <!-- Nav header -->
            <TheNavHeader />
            <main class="h-full pb-16">
                <div class="container">
                    <div class="p-8">
                        <slot />
                    </div>
                </div>
            </main>
        </div>
    </div>
</template>
