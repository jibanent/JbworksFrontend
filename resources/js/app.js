import Vue from "vue";
import VueRouter from "vue-router";
import Notifications from "vue-notification";
import routes from "./routes";
import store from "./store";

Vue.use(VueRouter);
Vue.use(Notifications);

import App from "./components/App.vue";
const router = new VueRouter({
  routes,
  mode: "history"
});

const app = new Vue({
  render: h => h(App),
  store,
  router
}).$mount("#app");
