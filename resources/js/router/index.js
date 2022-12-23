import { createRouter, createWebHistory } from "vue-router";
import Home from "@/views/guest/Home.vue";

const routes = [
    { path: "/", name: "Home", component: Home },
    {
        path: "/login",
        name: "login",
        component: () => import("@/views/guest/Login.vue"),
    },
    {
        meta: { requiresAuth: true },
        path: "/admin",
        redirect: "/admin/dashboard",
        name: "authenticated",
        component: () => import("@/layouts/Authenticated.vue"),
        children: [
            {
                path: "dashboard",
                name: "admin.dashboard",
                component: () => import("@/views/authenticated/Dashboard.vue"),
            },
            {
                path: "/agencies",
                name: "admin.agencies",
                component: () =>
                    import("@/views/authenticated/agencies/Agencies.vue"),
            },
            {
                path: "cars",
                name: "admin.cars",
                component: () =>
                    import("@/views/authenticated/admins/Cars.vue"),
            },
            {
                path: "users",
                name: "admin.users",
                component: () =>
                    import("@/views/authenticated/admins/Users.vue"),
            },
            {
                path: "employees",
                name: "admin.employees",
                component: () =>
                    import("@/views/authenticated/employees/Employees.vue"),
            },
            {
                path: "reservations",
                name: "admin.reservations",
                component: () =>
                    import(
                        "@/views/authenticated/admins/ReservationsAdmin.vue"
                    ),
            },
            {
                path: "/logos",
                name: "logos",
                component: () =>
                    import("@/views/authenticated/admins/Logos.vue"),
            },
        ],
    },
    {
        path: "/agency",
        component: () => import("@/layouts/Authenticated.vue"),
        meta: { requiresAuth: true },
        children: [
            {
                path: "cars",
                name: "agency.cars",
                component: () =>
                    import("@/views/authenticated/agencies/AgencyCars.vue"),
            },
            {
                path: "reservations",
                name: "agency.reservations",
                component: () =>
                    import(
                        "@/views/authenticated/agencies/ReservationsAgency.vue"
                    ),
            },
            {
                path: "clients",
                name: "agency.clients",
                component: () =>
                    import("@/views/authenticated/agencies/Clients.vue"),
            },
            {
                path: "calendar",
                name: "agency.calendar",
                component: () =>
                    import("@/views/authenticated/agencies/CalendarAgency.vue"),
            },
        ],
    },
];

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes,
});

export default router;
