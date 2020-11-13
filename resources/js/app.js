
require('./bootstrap');

import Vue from "vue";
import VueToastr from "vue-toastr";
Vue.use(VueToastr, {
    /* OverWrite Plugin Options if you need */
});

Vue.config.productionTip = false;

import VueSimpleAlert from "vue-simple-alert";
Vue.use(VueSimpleAlert);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('welcome-component', require('./components/welcome.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    mounted() {
        // You are able to access plugin from everywhere via this.$toastr
        this.$toastr.defaultPosition = "toast-top-left";
        // Send message to browser screen
        // this.$toastr.s(
        //     "This Message From Toastr Plugin\n You can access this plugin : <font color='yellow'>this.$toastr</font>"
        // );
    }
});
