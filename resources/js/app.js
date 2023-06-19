require("./bootstrap");
import Vue from "vue";
import Vuetify from "vuetify";
import Router from "./router";
import store from "./store";
import App from "./template/App";
import VueSweetalert2 from "vue-sweetalert2";
import "sweetalert2/dist/sweetalert2.min.css";
import VueMask from "v-mask";
Vue.use(VueMask);
Vue.use(Vuetify);
Vue.use(VueSweetalert2);
const app = new Vue({
    el: "#app",
    store,
    router: Router,
    vuetify: new Vuetify(),
    render: (h) => h(App),
});

export default app;
