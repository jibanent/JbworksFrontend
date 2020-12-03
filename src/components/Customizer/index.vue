<template>
  <div class="idb-customizer" :class="{ 'customizer-out': customizerIn }">
    <a class="customizer-toggle gradient-primary faa-parent animated-hover" href="javascript:;" @click="toggleCustomizer">
      <i aria-hidden="true" class="fa fa-wrench faa-slow faa-wrench spin-icon" />
    </a>
    <div class="settings-panel">
      <div class="theme-options">
        <div class="theme-head gradient-primary">
          <h4 class="m-0">
            {{ $t('message.themeSettings') }}
          </h4>
        </div>
        <vue-perfect-scrollbar class="customizer-scroll-area" :settings="settings">
          <div class="theme-body">
            <div class="layout-item form-check more-theme-style mb-4">
              <label class="mb-3 d-block">{{ $t('message.chooseThemeColor') }}</label>
              <a
                v-for="color in themeColor"
                :key="color.iconColor"
                href="javascript:void(0)"
                :class="{ 'active-theme': color === sidebarSelectedFilter }"
                class="theme d-block mb-2"
                @click="emitSidebarFilters(color)"
              >
                <i class="fa fa-circle fa-lg" :class="color.iconColor" aria-hidden="true" />
                {{ color.text }}
              </a>
            </div>
            <div class="layout-item form-check mb-4">
              <label class="custom-control custom-checkbox" for="darkMode">
                <input id="darkMode" class="custom-control-input" type="checkbox" :value="darkMode" @change="darkModeHandler">
                <span class="custom-control-indicator" />
                <span class="d-block mb-15 theme-option-text">{{ $t('message.darkMode') }}</span>
              </label>
              <img src="/static/img/nightmode.png" alt="layout">
            </div>
            <div class="layout-item rtl-layout-xl form-check mb-2">
              <label class="custom-control custom-checkbox" for="rtlLayout">
                <input id="rtlLayout" class="custom-control-input" type="checkbox" :value="rtlLayout" @change="emitRtlLayout">
                <span class="custom-control-indicator" />
                <span class="d-block mb-15 theme-option-text">{{ $t('message.rtlLayout') }}</span>
              </label>
            </div>
            <div class="layout-item form-check mb-4">
              <label class="custom-control custom-checkbox" for="backgroundImage">
                <input id="backgroundImage" class="custom-control-input" type="checkbox" :checked="backgroundImage" @change="emitEnableBackgroundImage">
                <span class="custom-control-indicator" />
                <span class="d-block mb-15 theme-option-text">{{ $t('message.backgroundImage') }}</span>
              </label>
            </div>
            <div v-if="backgroundImage" class="sidebar-images mb-4 text-center">
              <div v-for="backgroundImage in sidebarBackgroundImages" :key="backgroundImage.id" class="d-inline-block mx-1 mb-2">
                <a class="img-holder" :class="{ 'active-theme': backgroundImage === selectedSidebarBgImage }">
                  <img :src="backgroundImage.url" height="200" width="75" alt="dynamic sidebar images" @click="changeBackgroundImage(backgroundImage)">
                </a>
              </div>
            </div>
          </div>
        </vue-perfect-scrollbar>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
  data() {
    return {
      settings: {
        maxScrollbarLength: 100
      },
      selected: undefined
    }
  },
  computed: {
    ...mapGetters({
      customizer: 'settings/customizer',
      boxLayout: 'settings/boxLayout',
      darkMode: 'settings/darkMode',
      rtlLayout: 'settings/rtlLayout',
      backgroundImage: 'settings/backgroundImage',
      sidebarBackgroundImages: 'settings/sidebarBackgroundImages',
      selectedSidebarBgImage: 'settings/selectedSidebarBgImage',
      themeColor: 'settings/themeColor',
      sidebarSelectedFilter: 'settings/sidebarSelectedFilter'
    }),
    customizerIn() {
      return this.customizer
    }
  },
  methods: {
    // method to customizer event
    toggleCustomizer() {
      this.$store.dispatch('settings/toggleCustomizer')
    },
    // method to darkMode event
    darkModeHandler() {
      this.$store.dispatch('settings/darkModeHandler')
    },
    // RTL handler
    emitRtlLayout() {
      this.$store.dispatch('settings/rtlLayout')
    },
    // method to change themeColor event
    changeBackgroundImage(sidebarImage) {
      this.$store.dispatch('settings/changeBackgroundImage', sidebarImage)
    },
    // method to enable background image
    emitEnableBackgroundImage() {
      this.$store.dispatch('settings/backgroundImage')
    },
    // method to change sidebar filter
    emitSidebarFilters(value) {
      this.$store.dispatch('settings/changeThemeColor', value)
    }
  }
}
</script>
