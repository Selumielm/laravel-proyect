// Importacions para la APP
require("./bootstrap");
window.Vue = require("vue");

import VueRouter from "vue-router";

// Componentes
import AppComponent from "./components/AppComponent.vue";
import LoginComponent from "./components/LoginComponent.vue";
import Navbar from "./components/Navbar.vue";
import donacionesComponent from "./components/Donaciones.vue";
import beneficiariosComponent from "./components/Beneficiarios.vue";
import agregarDonacionesComponent from "./components/AgregarDonacion.vue";
import agregarBeneficiarioComponent from "./components/agregarBeneficiario.vue";

Vue.use(VueRouter);

const router = new VueRouter({
    routes: [
        {
            path: "/home",
            component: AppComponent
        },
        {
            path: "/login",
            component: LoginComponent
        },
        {
            path: "/donaciones",
            component: donacionesComponent
        },
        {
            path: "/beneficiarios",
            component: beneficiariosComponent
        },
        {
            path: "/donaciones/nuevo",
            component: agregarDonacionesComponent
        },
        {
            path: "/beneficiarios/nuevo",
            component: agregarBeneficiarioComponent
        }
    ]
});

Vue.component("navbar-component", Navbar);

const app = new Vue({
    el: "#app",
    router: router
});
