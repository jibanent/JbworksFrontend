<template>
  <div class="sidebar-panel-wrap" :style="styles">
    <div class="sidebar-panel" :class="sidebarSelectedFilter.extraClass">
      <div class="sidebar-top">
        <div class="sidebar-logo-wrap d-flex justify-content-center py-20">
          <app-logo />
        </div>
        <user-block />
      </div>
      <sidebar-content />
    </div>
  </div>
</template>

<script>
import AppLogo from '@/components/AppLogo'
import UserBlock from './UserBlock'
import SidebarContent from './SidebarContent'
import { mapGetters } from 'vuex'
export default {
  name: 'Sidebar',
  components: {
    AppLogo,
    UserBlock,
    SidebarContent
  },
  computed: {
    ...mapGetters({
      selectedSidebarBgImage: 'settings/selectedSidebarBgImage',
      backgroundImage: 'settings/backgroundImage',
      sidebarSelectedFilter: 'settings/sidebarSelectedFilter'
    }),
    styles() {
      if (this.backgroundImage === false) {
        return { 'background-image': null }
      } else {
        return {
          'background-image': `url('${this.selectedSidebarBgImage.url}')`,
          'background-position': `center`
        }
      }
    }
  }
}
</script>

<style></style>
