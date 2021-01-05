
require('./bootstrap');

import Vue from "vue";
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import VueSimpleAlert from "vue-simple-alert";
import 'sweetalert2/src/sweetalert2.scss'
Vue.use(VueSimpleAlert);

Vue.use(require('vue-moment'));

import VueToast from 'vue-toast-notification';
// Import one of available themes
import 'vue-toast-notification/dist/theme-default.css';
import 'vue-toast-notification/dist/theme-sugar.css';


Vue.use(VueToast);


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('welcome-component', require('./components/welcome.vue').default);
Vue.component('veri-component', require('./components/veri.vue').default);
Vue.component('mtto-component', require('./components/mantenimiento.vue').default);
Vue.component('verificar', require('./components/verificar.vue').default);
import usuarios from './components/usuarios';
import registrados from './components/registrados';
import revisar from './components/revisar';
import actualizar from './components/actualizar';
import registrar from './components/registrar';
import reportes from './components/reportes';
import especial from './components/especial';
import mamas from './components/mama';
import educations from './components/education';
import listado from './components/listado';
import informe from './components/informe';
const routes = [
    { path: '/usuarios', component: usuarios },
    { path: '/registrados', component: registrados },
    { path: '/actualizar', component: actualizar },
    { path: '/revisar', component: revisar },
    { path: '/registrar', component: registrar },
    { path: '/reportes', component: reportes },
    { path: '/especial', component: especial },
    { path: '/mamas', component: mamas },
    { path: '/educations', component: educations },
    { path: '/listado', component: listado },
    { path: '/informe', component: informe },
]
const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
});
const app = new Vue({
    el: '#app',
    router,
    mounted() {
        // You are able to access plugin from everywhere via this.$toastr
        // this.$toastr.defaultPosition = "toast-top-left";
        // Send message to browser screen
        // this.$toastr.s(
        //     "This Message From Toastr Plugin\n You can access this plugin : <font color='yellow'>this.$toastr</font>"
        // );
    }
});


