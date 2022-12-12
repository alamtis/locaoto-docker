import { createRouter, createWebHistory } from "vue-router";
import Home from "../views/guest/Home.vue";
import Dashboard from "../views/authenticated/Dashboard.vue";
import Agencies from "../views/authenticated/agencies/Agencies.vue";
import Cars from "../views/authenticated/admins/Cars.vue";
import Users from "../views/authenticated/admins/Users.vue";
import Employees from "../views/authenticated/employees/Employees.vue";
import ReservationsAdmin from "../views/authenticated/admins/ReservationsAdmin.vue";
import Logos from "../views/authenticated/admins/Logos.vue";
import Login from "../views/guest/Login.vue";
import AgencyCars from "../views/authenticated/agencies/AgencyCars.vue";
import ReservationsAgency from "../views/authenticated/agencies/ReservationsAgency.vue";
import Clients from "../views/authenticated/agencies/Clients.vue";
import CalendarAgency from "../views/authenticated/agencies/CalendarAgency.vue";

const routes = [
  { path: "/", name: "Home", component: Home },
  { path: "/login", name: "login", component: Login },
  // admins
  { path: "/dashboard", name: "dashboard", component: Dashboard },
  { path: "/agencies", name: "agencies", component: Agencies },
  { path: "/admins/cars", name: "cars", component: Cars },
  { path: "/admins/users", name: "users", component: Users },
  { path: "/employees", name: "employees", component: Employees },
  {
    path: "/admins/reservations",
    name: "reservationsadmin",
    component: ReservationsAdmin,
  },
  { path: "/logos", name: "logos", component: Logos },
  // agencies
  { path: "/agencies/cars", name: "agencycars", component: AgencyCars },
  {
    path: "/agencies/reservations",
    name: "reservationsagency",
    component: ReservationsAgency,
  },
  { path: "/agencies/clients", name: "clients", component: Clients },
  {
    path: "/agencies/calendar",
    name: "calendaragency",
    component: CalendarAgency,
  },
];

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes,
});

export default router;
