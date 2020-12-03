<template>
  <header class="app-header">
    <div class="d-flex justify-content-between align-items-center nav-wrap">
      <div class="d-flex align-items-center">
        <div class="ham-icon">
          <button type="button" class="c-hamburger c-hamburger--rot  v-step-0" name="button" @click="collapseSidebarHandler">
            <span class="ham-line" />
          </button>
        </div>
        <search-form class="v-step-1" />
        <div class="mobile-search d-none">
          <b-btn class="mobile-search-btn" variant="white">
            <span class="zmdi zmdi-search" />
          </b-btn>
        </div>
      </div>
      <b-navbar-nav class="navbar-right">
        <b-nav-item class="v-step-2 zoom-out" href="#" @click="toggleScreenFull">
          <i class="zmdi zmdi-fullscreen" />
        </b-nav-item>
        <b-nav-item-dropdown right no-caret class="notification-wrap">
          <template slot="button-content">
            <span class="zmdi animated infinite wobble zmdi-hc-fw">
              <i class="zmdi zmdi-notifications-active" />
              <b-badge pill variant="success" class="badge-sm badge-top-right fa-notify">4</b-badge>
            </span>
          </template>
          <b-dropdown-header class="gradient-primary text-white">
            {{ $t('message.notifications') }}
          </b-dropdown-header>
          <b-dropdown-item v-for="notification in notifications" :key="notification.img" href="#" class="mb-10 notification">
            <div class="media">
              <div class="d-flex pos-relative avatar-wrap">
                <img :src="notification.img" class="rounded-circle" width="60" height="60">
                <span class="badge badge-label-sm badge-thumb-top-right badge-pill fa-notify" :class="notification.badgeColor">&nbsp;</span>
              </div>
              <div class="media-body pt-10">
                <h6 class="fw-bold">
                  {{ notification.name }}
                </h6>
                <p class="m-0 small">
                  {{ notification.message }}
                </p>
              </div>
            </div>
          </b-dropdown-item>
        </b-nav-item-dropdown>
        <language-provider />
        <b-nav-item class="customizer" @click="toggleRightSidebar">
          <i class="zmdi zmdi-tune" />
        </b-nav-item>
      </b-navbar-nav>
    </div>
    <!-- <tour :data="tourData"></tour> -->
    <right-sidebar :sidebar-open="rightSidebar" />
  </header>
</template>

<script>
import SearchForm from './SearchForm.vue'
import RightSidebar from './RightSidebar'
import LanguageProvider from './LanguageProvider'
import screenfull from 'screenfull'
import { mapGetters } from 'vuex'
export default {
  components: {
    RightSidebar,
    LanguageProvider,
    SearchForm
  },
  data() {
    return {
      notifications: [
        {
          name: 'John Doe',
          message: 'Hey, We have a meeting planned at the end of the day.',
          img: '/static/img/user-1.jpg',
          badgeColor: 'badge-danger'
        },
        {
          name: 'John Doe',
          message: 'Can we schedule a call this afternoon?',
          img: '/static/img/user-2.jpg',
          badgeColor: 'badge-success'
        },
        {
          name: 'John Doe',
          message: 'Great presentation the other day. Keep up the good work!',
          img: '/static/img/user-3.jpg',
          badgeColor: 'badge-warning'
        },
        {
          name: 'John Doe',
          message: 'Need the updates of the project at the end of the week.',
          img: '/static/img/user-4.jpg',
          badgeColor: 'badge-success'
        }
      ]
    }
  },
  computed: {
    ...mapGetters({
      rightSidebar: 'settings/rightSidebar'
    })
  },
  methods: {
    // method to right Sidebar event
    toggleRightSidebar() {
      this.$store.dispatch('settings/toggleRightSidebar')
    },
    // method to screenFull event
    toggleScreenFull() {
      this.$store.dispatch('settings/toggleFullscreen', screenfull.isFullscreen)
      screenfull.toggle()
    },
    // method to collapsedSidebar event
    collapseSidebarHandler() {
      if (window.innerWidth < 1265) {
        document.querySelector('.app-container').classList.remove('collapsed-sidebar')
        document.querySelector('.sidebarOverlay').classList.add('active')
      } else {
        this.$store.dispatch('settings/collapsedSidebar')
      }
    }
  }
}
</script>

<style></style>
