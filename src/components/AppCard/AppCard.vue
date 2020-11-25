<template>
  <div :class="[customClasses, { 'd-none': close }]" class="idb-block customClasses">
    <fullscreen ref="fullscreen" class="h-100">
      <div class="app-card " :class="appCardClass">
        <app-card-heading
          :heading="heading"
          :heading-color="headingColor"
          :heading-menu="headingMenu"
          :closeable="closeable"
          :reloadable="reloadable"
          :full-screen="fullScreen"
          :with-tabs="withTabs"
          :tabs="tabs"
          :block-title-class="blockTitleClass"
          :show-today-btn="showTodayBtn"
          :redirect-url="redirectUrl"
          @onChangeTabCallback="onChangeTab"
          @onCollapse="onCollapse"
          @onReload="onReload"
          @onClose="onClose"
        />
        <app-card-content :extra-class="[contentCustomClass]" :full-block="fullBlock">
          <slot />
        </app-card-content>
        <div v-if="enableFooter" class="idb-block-footer" :class="footerClasses">
          <slot name="footer" />
        </div>
        <app-section-loader :status="reload" />
      </div>
    </fullscreen>
  </div>
</template>

<script>
import AppCardHeading from './AppCardHeading'
import AppCardContent from './AppCardContent'
// import AppCardFooter from './AppCardFooter';
import AppSectionLoader from '../AppSectionLoader/AppSectionLoader'

export default {
  components: {
    AppCardHeading,
    AppCardContent,
    // AppCardFooter,
    AppSectionLoader
  },
  props: [
    'appCardClass',
    'heading',
    'headingColor',
    'headingMenu',
    'customClasses',
    'footerClasses',
    'blockTitleClass',
    'enableFooter',
    'fullBlock',
    'contentCustomClass',
    'closeable',
    'reloadable',
    'fullScreen',
    'withTabs',
    'tabs',
    'onChangeTabCallback',
    'showTodayBtn',
    'redirectUrl'
  ],
  data() {
    return {
      reload: false,
      close: false
    }
  },
  methods: {
    onCollapse() {
      this.$refs['fullscreen'].toggle()
    },
    onReload() {
      this.reload = true
      const self = this
      setTimeout(() => {
        self.reload = false
      }, 1500)
    },
    onClose() {
      this.close = true
    },
    onChangeTab(value) {
      this.$emit('onChangeTabCallback', value)
    }
  }
}
</script>
