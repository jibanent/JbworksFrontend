import "./bootstrap";
import Vue from "vue";
import VueRouter from "vue-router";
import Notifications from "vue-notification";
import routes from "./routes";
import store from "./store";
import i18n from "./lang";
import ElementUI from "element-ui";
import "element-ui/lib/theme-chalk/index.css";
import VueChatScroll from "vue-chat-scroll";
import Antd from "ant-design-vue";

Vue.use(Antd);
Vue.use(ElementUI);
Vue.use(VueRouter);
Vue.use(Notifications);
Vue.use(VueChatScroll);

import Auth from "./auth.js";
Vue.prototype.$auth = new Auth(store.state.auth);

import App from "./components/App.vue";
const router = new VueRouter({
  baseUrl: "",
  routes,
  mode: "history"
});

const app = new Vue({
  render: h => h(App),
  i18n,
  store,
  router
}).$mount("#app");
