import * as Vue from "vue";
import App from "./App.vue";
import router from "./router";
import axios from "axios";
import VueAxios from "vue-axios";
import { IconsPlugin } from "bootstrap-vue";
// import { BootstrapVue, IconsPlugin } from "bootstrap-vue";
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
// Import Bootstrap and BootstrapVue CSS files (order is important)
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue/dist/bootstrap-vue.css";
// import "./assets/main.css";

const app = Vue.createApp(App);
app.use(VueAxios, axios);
app.use(VueSweetalert2);
// app.use(BootstrapVue);
app.use(IconsPlugin);
app.use(router);

app.mount("#app");
