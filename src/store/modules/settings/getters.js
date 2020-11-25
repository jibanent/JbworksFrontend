export default {
  collapsedSidebar: state => {
    return state.collapsedSidebar
  },
  fullScreen: state => {
    return state.fullScreen
  },
  rightSidebar: state => {
    return state.rightSidebar
  },
  languages: state => {
    return state.languages
  },
  selectedLocale: state => {
    return state.selectedLocale
  },
  customizer: state => {
    return state.customizer
  },
  boxLayout: state => {
    return state.boxLayout
  },
  darkMode: state => {
    return state.darkMode
  },
  rtlLayout: state => {
    return state.rtlLayout
  },
  themeColor: state => {
    return state.themeColor
  },
  sidebarSelectedFilter: state => {
    return state.sidebarSelectedFilter
  },
  backgroundImage: state => {
    return state.backgroundImage
  },
  sidebarBackgroundImages: state => {
    return state.sidebarBackgroundImages
  },
  selectedSidebarBgImage: state => {
    return state.selectedSidebarBgImage
  }
}
