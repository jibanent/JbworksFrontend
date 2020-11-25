/**
 * Vuely Global Components
 */

// perfect scroll bar
import VuePerfectScrollbar from 'vue-perfect-scrollbar'

// page title bar
import PageTitleBar from 'Components/PageTitleBar/PageTitleBar'

// App Card component
import AppCard from 'Components/AppCard/AppCard'

// App Card loader
import AppSectionLoader from 'Components/AppSectionLoader/AppSectionLoader'

const GlobalComponents = {
  install(Vue) {
    Vue.component('vuePerfectScrollbar', VuePerfectScrollbar)
    Vue.component('pageTitleBar', PageTitleBar)
    Vue.component('appCard', AppCard)
    Vue.component('appSectionLoader', AppSectionLoader)
  }
}

export default GlobalComponents
