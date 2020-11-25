export default {
  toggleCustomizer({ commit }) {
    commit('toggleCustomizerHandler')
  },
  darkModeHandler({ commit }) {
    commit('darkModeHandler')
  },
  rtlLayout({ commit }) {
    commit('rtlLayoutHandler')
  },
  changeThemeColor({ commit }, payload) {
    commit('changeSidebarFilterHandler', payload)
  },
  collapsedSidebar({ commit }) {
    commit('collapsedSidebarHandler')
  },
  toggleFullscreen({ commit }, payload) {
    commit('toggleFullscreenHandler', payload)
  },
  toggleRightSidebar({ commit }) {
    commit('toggleRightSidebarHandler')
  },
  backgroundImage({ commit }) {
    commit('sidebarBgImageHandler')
  },
  changeBackgroundImage({ commit }, payload) {
    commit('changeBackgroundImageHandler', payload)
  }
}
