/**
 * Vuely Global Components
 */

// perfect scroll bar
import VuePerfectScrollbar from 'vue-perfect-scrollbar'

// page title bar
import PageTitleBar from 'Components/PageTitleBar/PageTitleBar'

// count up
import CountUp from 'Components/CountUp/CountUp';

// App Card component
import AppCard from 'Components/AppCard/AppCard'

// App Card loader
import AppSectionLoader from 'Components/AppSectionLoader/AppSectionLoader'

// crypto slider
import CryptoSlider from 'Components/Widgets/CryptoSlider'

const GlobalComponents = {
  install(Vue) {
    Vue.component('countUp', CountUp)
    Vue.component('vuePerfectScrollbar', VuePerfectScrollbar)
    Vue.component('pageTitleBar', PageTitleBar)
    Vue.component('appCard', AppCard)
    Vue.component('appSectionLoader', AppSectionLoader)
    Vue.component('cryptoSlider', CryptoSlider)
  }
}

export default GlobalComponents
