<script setup>
import { ref } from "vue";

const basicData = ref({
    labels: ["January", "February", "March", "April", "May", "June", "July"],
    datasets: [
        {
            label: "Reseravtions confirmed",
            backgroundColor: "#ff7b00",
            data: [65, 59, 80, 81, 56, 55, 40],
        },
        {
            label: "Reseravtions not confirmed",
            backgroundColor: "#001933",
            data: [28, 48, 40, 19, 86, 27, 10],
        },
        {
            label: "Total reservation",
            backgroundColor: "#003399",
            data: [22, 104, 120, 100, 137, 89, 50],
        },
    ],
});
</script>
<template>
    <!--    <Authenticated>-->
    <div class="grid grid-cols-1 gap-4 md:grid-cols-4">
        <div
            class="flex max-h-40 items-center rounded-xl bg-white p-8 drop-shadow-lg"
        >
            <div class="w-full">
                <div class="flex items-center justify-between">
                    <span class="text-3xl text-orange-500">
                        <i class="pi pi-phone text-3xl"></i>
                    </span>
                    <span class="flex-end">
                        <span
                            class="block rounded-full bg-gradient-to-tl from-slate-900 to-slate-600 p-3 text-2xl font-bold text-white"
                        >
                            12
                        </span>
                    </span>
                </div>
                <div class="mt-3 flex justify-between">
                    <span>
                        <div class="font-bold text-green-500">5</div>
                        <div class="text-sm text-gray-400">
                            <Badge severity="success" value=""></Badge>
                            confirmé
                        </div>
                    </span>
                    <span>
                        <div class="font-bold text-red-500">0</div>
                        <div class="text-sm text-gray-400">
                            <Badge severity="danger" value=""></Badge>
                            non-confirmé
                        </div>
                    </span>
                </div>
            </div>
        </div>
        <div
            class="flex max-h-40 items-center rounded-xl bg-white p-8 drop-shadow-lg"
        >
            <div class="w-full">
                <div class="flex items-center justify-between">
                    <span class="text-3xl text-orange-500">
                        <i class="pi pi-car text-3xl"></i>
                    </span>
                    <span class="flex-end">
                        <span
                            class="block rounded-full bg-gradient-to-tl from-slate-900 to-slate-600 p-3 text-2xl font-bold text-white"
                        >
                            56
                        </span>
                    </span>
                </div>
                <div class="mt-3 flex justify-between">
                    <span>
                        <div class="font-bold text-green-500">7</div>
                        <div class="text-sm text-gray-400">
                            <Badge severity="success" value=""></Badge>
                            disponible
                        </div>
                    </span>
                    <span>
                        <div class="font-bold text-red-500">24</div>
                        <div class="text-sm text-gray-400">
                            <Badge severity="danger" value=""></Badge>
                            non-disponible
                        </div>
                    </span>
                </div>
            </div>
        </div>
        <div
            class="flex max-h-40 items-center rounded-xl bg-white p-8 drop-shadow-lg"
        >
            <div class="w-full">
                <div class="flex items-center justify-between">
                    <span class="text-3xl text-orange-500">
                        <i class="pi pi-users text-3xl"></i>
                    </span>
                    <span class="flex-end">
                        <span
                            class="block rounded-full bg-gradient-to-tl from-slate-900 to-slate-600 p-3 text-2xl font-bold text-white"
                        >
                            12
                        </span>
                    </span>
                </div>
                <div class="mt-3 flex justify-between">
                    <span>
                        <div class="font-bold text-green-500">5</div>
                        <div class="text-sm text-gray-400">
                            <Badge severity="success" value=""></Badge>
                            inscrit
                        </div>
                    </span>
                    <span>
                        <div class="font-bold text-red-500">0</div>
                        <div class="text-sm text-gray-400">
                            <Badge severity="danger" value=""></Badge>
                            non-inscrit
                        </div>
                    </span>
                </div>
            </div>
        </div>
        <div
            class="flex max-h-40 items-center rounded-xl bg-white p-8 drop-shadow-lg"
        >
            <div class="w-full">
                <div class="flex items-center justify-between">
                    <span class="text-3xl text-orange-500">
                        <i class="pi pi-building text-3xl"></i>
                    </span>
                    <span class="flex-end">
                        <span
                            class="block rounded-full bg-gradient-to-tl from-slate-900 to-slate-600 p-3 text-2xl font-bold text-white"
                        >
                            19
                        </span>
                    </span>
                </div>
                <div class="mt-3 flex justify-between">
                    <span>
                        <div class="font-bold text-green-500">5</div>
                        <div class="text-sm text-gray-400">
                            <Badge severity="success" value=""></Badge>
                            active
                        </div>
                    </span>
                    <span>
                        <div class="font-bold text-red-500">0</div>
                        <div class="text-sm text-gray-400">
                            <Badge severity="danger" value=""></Badge>
                            non-active
                        </div>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-10 grid grid-cols-1 gap-4 md:grid-cols-2">
        <div class="rounded-xl bg-white p-6 drop-shadow-lg">
            <Chart type="bar" :data="basicData" class="p-chart-Container" />
        </div>
        <div
            class="flex items-center justify-between rounded-xl bg-white p-6 drop-shadow-lg"
        >
            <!-- <h1 class="text-4xl text-white font-bold">Les revenus</h1> -->
            <div>
                <h1 class="text-2xl font-bold">
                    <h1 class="text-lg text-orange-600">Total revenus</h1>
                    <div class="mt-1 flex items-center text-slate-600">
                        <i class="pi pi-dollar text-xl"></i>
                        <h1>267.56</h1>
                    </div>
                </h1>
                <h1 class="text-2xl font-bold">
                    <h1 class="text-lg text-orange-600">Montant payents</h1>
                    <div class="mt-1 flex items-center text-slate-600">
                        <i class="pi pi-dollar text-xl"></i>
                        <h1>149.00</h1>
                    </div>
                </h1>
                <h1 class="text-2xl font-bold">
                    <h1 class="text-lg text-orange-600">Montant restants</h1>
                    <div class="mt-1 flex items-center text-slate-600">
                        <i class="pi pi-dollar text-xl"></i>
                        <h1>116.60</h1>
                    </div>
                </h1>
            </div>
            <!-- card -->
            <div
                class="h-44 w-72 rounded-xl bg-gradient-to-tl from-gray-900 to-gray-600 p-6 text-white shadow-md"
            >
                <div class="flex h-full flex-col justify-between">
                    <div class="flex items-start justify-between space-x-4">
                        <div class="tracking-tigh text-xl font-semibold">
                            LOCAOTO
                        </div>

                        <div
                            class="inline-flex flex-col items-center justify-center"
                        >
                            <svg
                                class="h-8 w-8"
                                width="24"
                                height="24"
                                stroke-width="1.5"
                                viewBox="0 0 24 24"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M2 15V9C2 5.68629 4.68629 3 8 3H16C19.3137 3 22 5.68629 22 9V15C22 18.3137 19.3137 21 16 21H8C4.68629 21 2 18.3137 2 15Z"
                                    stroke="currentColor"
                                    stroke-width="1.5"
                                ></path>
                                <path
                                    d="M13 15.5V12.7M15.8571 12.7C16.5714 12.7 18 12.7 18 10.6C18 8.5 16.5714 8.5 15.8571 8.5L13 8.5V12.7M15.8571 12.7C14.7143 12.7 13.4762 12.7 13 12.7M15.8571 12.7L18 15.5"
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                ></path>
                                <path
                                    d="M11 8.5L8 15.5L5 8.5"
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                ></path>
                            </svg>

                            <div class="font-semibold text-white">wallet</div>
                        </div>
                    </div>

                    <div
                        class="inline-block h-8 w-12 overflow-hidden rounded-md bg-gradient-to-tl from-yellow-200 to-yellow-100 shadow-inner"
                    >
                        <div
                            class="relative grid h-full w-full grid-cols-2 gap-1"
                        >
                            <div
                                class="absolute left-4 top-1 h-6 w-4 rounded border border-gray-900"
                            ></div>
                            <div
                                class="rounded-br border-b border-r border-gray-900"
                            ></div>
                            <div
                                class="rounded-bl border-b border-l border-gray-900"
                            ></div>
                            <div class=""></div>
                            <div class=""></div>
                            <div
                                class="rounded-tr border-t border-r border-gray-900"
                            ></div>
                            <div
                                class="rounded-tl border-t border-l border-gray-900"
                            ></div>
                        </div>
                    </div>

                    <div class="">
                        <div class="text-xs font-semibold tracking-tight">
                            Balance
                        </div>

                        <div class="text-2xl font-semibold">$268</div>
                    </div>
                </div>
            </div>
            <!--  -->
        </div>
    </div>
    <!--    </Authenticated>-->
</template>
