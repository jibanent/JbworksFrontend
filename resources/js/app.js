

require('./bootstrap');
window.Vue = require('vue');


import VueRouter from 'vue-router';
Vue.use(VueRouter)

import {routes} from './routes.js';

Vue.component('app', require('./components/App.vue'))

const router = new VueRouter({
  routes, // short for `routes: routes`
  mode: 'history'
})

import App from './components/App.vue'

const app = new Vue({
    render: h => h(App),
    router
}).$mount('#app');


