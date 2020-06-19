<template>
  <div id="navigator" v-if="true">
    <div class="header">
      <div class="logo">
        <img src="/images/header.png" />
      </div>
      <div class="search">
        <div class="input">
          <input type="text" placeholder="Tìm dự án" />
        </div>
      </div>

      <div class="icon" title="Notifications" @click="openNotifications">
        <div
          class="count"
          id="base-notis-badge"
          style="display: block; font-size: 11px; opacity: 1;"
          v-if="unreadNotificationsCount !== 0"
        >{{ unreadNotificationsCount }}</div>
        <span class="-ap icon-notifications"></span>
      </div>
    </div>

    <div class="user" v-if="isLoggedIn">
      <div class="avatar avatar-30">
        <div class="image">
          <img v-bind:src="avatar" />
        </div>
      </div>
      <div class="name ap-xdot">{{ currentUser.name }}</div>
      <div class="info ap-xdot">{{ currentUser.position }}</div>
    </div>

    <div
      class="canvas scrollable __set __apscrollbar_parent __autohide"
      data-autoscroll="1"
      data-autohide="1"
    >
      <div
        class="scrollin absolute __apscrollbar_target __scrolled"
        id="_uuid1679_19128_1584519723"
        style="right: -17px; top: 0px; left: 0px; bottom: 0px;"
      >
        <div class="__apscrollbar_wrap __autohide">
          <div class="boxes">
            <div class="box -home">
              <div class="title">
                <div class="label">Tổng hợp</div>
              </div>
              <div class="boards">
                 <router-link
                  class="li __ap_processed"
                  to="/profile"
                  exactActiveClass="active"
                  activeClass="active"
                >
                  <span class="icon">
                    <img src="/assets/images/icons/user.png" />
                  </span>
                  <span class="name">Tài khoản</span>
                </router-link>

                <router-link
                  class="li __ap_processed"
                  to="/tasks"
                  exactActiveClass="active"
                  activeClass="active"
                >
                  <span class="icon">
                    <img src="/assets/images/icons/home.png" />
                  </span>
                  <span class="name">Công việc</span>
                </router-link>

                <router-link
                  class="li __ap_processed"
                  to="/projects"
                  exactActiveClass="active"
                  activeClass="active"
                  v-if="$auth.isAdmin() || $auth.isLeader()"
                >
                  <span class="icon">
                    <img src="/assets/images/icons/projects.png" />
                  </span>
                  <span class="name">Dự án</span>
                </router-link>

                <router-link
                  class="li __ap_processed"
                  to="/departments"
                  exactActiveClass="active"
                  v-if="$auth.isAdmin()"
                >
                  <span class="icon">
                    <img src="/assets/images/icons/star.png" />
                  </span>
                  <span class="name">Departments</span>
                </router-link>

                <router-link
                  class="li __ap_processed"
                  to="/users"
                  exactActiveClass="active"
                  v-if="$auth.isAdmin() || $auth.isLeader()"
                >
                  <span class="icon">
                    <img src="/assets/images/icons/users.png" />
                  </span>
                  <span class="name">Thành viên</span>
                </router-link>

                <router-link
                  class="li url"
                  to="/reports"
                  exactActiveClass="active"
                  v-if="$auth.can('view project report')"
                >
                  <span class="icon">
                    <img src="/assets/images/icons/report.png" />
                  </span>
                  <span class="name">Báo cáo</span>
                </router-link>
              </div>
              <div class="boards" v-on:click="handleLogout">
                <div class="li url">
                  <div class="icon">
                    <img src="/assets/images/icons/create.png" />
                  </div>
                  <div class="name">Logout</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions, mapState } from "vuex";
import { getAvatar } from "../../helpers";
export default {
  name: "sidebar",
  props: {
    unreadNotificationsCount: { type: Number, default: 0 }
  },
  computed: {
    ...mapGetters(["isLoggedIn"]),
    ...mapState({
      currentUser: state => state.auth.currentUser
    }),
    avatar() {
      return getAvatar(this.currentUser.avatar);
    }
  },
  methods: {
    ...mapActions(["logout", "getMyNotifications"]),
    handleLogout() {
      this.logout().then(response => {
        if (!response.error) this.$router.push("/");
      });
    },
    openNotifications() {
      this.$store.commit("TOGGLE_NOTIFICATIONS");
    }
  }
};
</script>

<style>
</style>
