import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import { BootstrapVue } from 'bootstrap-vue'
import VueBreadcrumbs from 'vue2-breadcrumbs'
import fullscreen from 'vue-fullscreen'
import LiquorTree from 'liquor-tree'
<<<<<<< HEAD
=======
import TreeTable from 'tree-table-vue'
>>>>>>> da0ea647bc24b1cb7107623a395e8a40b03281e0

Vue.use(BootstrapVue)

// adminify scripts
import './libs/adminifyScripts'
import './libs'

import BaseLayout from './layouts/BaseLayout'
// i18n
import i18n from './lang'
//global components
import GlobalComponents from './globalComponents'

Vue.component('base-layout', BaseLayout)

Vue.use(VueBreadcrumbs)
Vue.use(fullscreen)
Vue.use(GlobalComponents)
Vue.use(LiquorTree)
<<<<<<< HEAD
=======
Vue.use(TreeTable)
>>>>>>> da0ea647bc24b1cb7107623a395e8a40b03281e0

Vue.config.productionTip = false

new Vue({
  router,
  store,
  i18n,
  render: h => h(App)
}).$mount('#app')
