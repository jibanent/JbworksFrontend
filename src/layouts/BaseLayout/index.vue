<template>
  <div>
    <div class="app-container" :class="{ 'collapsed-sidebar': sidebarCollapse }">
      <div
        class="app-content"
        :class="{
          'rtl-layout': rtlLayout,
          'box-layout': toggleBoxLayout,
          'dark-mode': darkModeEvent,
          red: getThemeColor === 'red',
          green: getThemeColor === 'green',
          orange: getThemeColor === 'orange',
          '': getThemeColor === 'default'
        }"
      >
        <div class="sidebar-wrapper">
          <app-sidebar />
        </div>
        <!-- Sidebar panel closed -->
        <div class="sidebarOverlay" @click="closeSidebar" />
        <div class="main-content">
          <app-header />
          <!-- header closed -->
          <div class="base-container">
            <div class="inner-container">
              <transition name="router-anim" enter-active-class="animated slideInUpTiny animation-duration-fast">
                <router-view />
              </transition>
            </div>
            <!-- inner container closed -->
            <app-customizer />
          </div>
          <!-- base container closed -->
        </div>
        <!-- Main Content closed -->
      </div>
    </div>
    <!-- app container closed -->
  </div>
  <!-- app container closed -->
</template>

<script>
import Header from './Header'
import Sidebar from './Sidebar'
import Customizer from '@/components/Customizer'
import { mapGetters } from 'vuex'
export default {
  name: 'BaseLayout',
  components: {
    appHeader: Header,
    appSidebar: Sidebar,
    appCustomizer: Customizer
  },
  computed: {
    ...mapGetters({
      rtlLayout: 'settings/rtlLayout',
      boxLayout: 'settings/boxLayout',
      darkMode: 'settings/darkMode',
      themeColor: 'settings/themeColor',
      collapsedSidebar: 'settings/collapsedSidebar'
    }),
    // computed property to get the state of collapsed sidebar
    sidebarCollapse() {
      return this.collapsedSidebar
    },
    // computed property to get the state of box layout
    toggleBoxLayout() {
      return this.boxLayout
    },
    // computed property to get the state of dark mode
    darkModeEvent() {
      return this.darkMode
    },
    // computed property to get theme color
    getThemeColor() {
      return this.themeColor
    }
  },
  mounted() {
    this.toggleSidebar()
  },
  beforeUpdate() {
    this.toggleSidebar()
  },
  methods: {
    closeSidebar() {
      document.querySelector('.app-container').classList.add('collapsed-sidebar')
      document.querySelector('.sidebarOverlay').classList.remove('active')
    },
    toggleSidebar() {
      if (window.innerWidth < 1265) {
        document.querySelector('.app-container').classList.add('collapsed-sidebar')
        document.querySelector('.sidebarOverlay').classList.remove('active')
      } else if (window.innerWidth < 1201) {
        document.querySelector('.app-content').classList.remove('box-layout')
      } else if (window.innerWidth > 1265) {
        document.querySelector('.sidebarOverlay').style.display = 'block'
      }
      $(window).resize(function() {
        if (window.innerWidth < 1265) {
          document.querySelector('.app-container').classList.add('collapsed-sidebar')
        } else if (window.innerWidth < 1201) {
          document.querySelector('.app-content').classList.remove('box-layout')
        } else {
          document.querySelector('.sidebarOverlay').style.display = 'block'
          document.querySelector('.app-container').classList.remove('collapsed-sidebar')
        }
      })
    }
  }
}
</script>

<style></style>
