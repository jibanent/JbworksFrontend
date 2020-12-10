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
import AppLogo from 'Components/AppLogo/AppLogo'
import SidebarContent from './SidebarContent'
import UserBlock from './UserBlock'
import { mapGetters } from 'vuex'

export default {
  name: 'Sidenav',
  components: {
    AppLogo,
    SidebarContent,
    UserBlock
  },
  computed: {
    ...mapGetters([
      'selectedSidebarBgImage',
      'backgroundImage',
      'sidebarSelectedFilter'
    ]),
    styles() {
      if (this.backgroundImage == false) {
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

<style lang="scss">
	.scroll-area {
		margin: auto;
		width: 100%;
		min-height: 100%;
	}
</style>
