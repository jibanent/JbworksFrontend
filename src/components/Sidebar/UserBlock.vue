<template>
  <div class="user-section d-flex flex-column align-items-center">
    <div class="pos-relative d-inline-block">
      <img src="/static/img/user-1.jpg" width="60" height="60" alt="user" class="img-fluid rounded-circle mb-10">
      <span class="badge badge-success badge-label-sm badge-thumb-top-right badge-pill fa-notify">&nbsp;</span>
    </div>
    <b-dropdown variant="link" size="md" text="Jan Doe" class="admin-section py-0 ">
      <b-dropdown-header class="gradient-primary">
        <span>Jan Doe</span>
      </b-dropdown-header>
      <template v-for="(menu,index) in userMenu">
        <b-dropdown-item v-if="index !== 3" :key="index" :to="menu.path">
          <i class="mx-10" :class="[menu.icon, menu.color]" />
          {{ $t(menu.text) }}
        </b-dropdown-item>
        <b-dropdown-item v-else :key="index" @click="logoutUser">
          <i class="mx-10" :class="[menu.icon, menu.color]" />
          {{ $t(menu.text) }}
        </b-dropdown-item>
      </template>
    </b-dropdown>
  </div>
</template>
<script>
export default {
  data() {
    return {
      userMenu: [
        {
          icon: 'ti-user',
          text: 'message.myProfile',
          color: 'text-warning',
          path: '/users/user-profile'
        },
        {
          icon: 'ti-bell',
          text: 'message.usersList',
          color: 'text-success',
          path: '/users/users-list'
        },
        {
          icon: 'ti-image',
          text: 'message.gallery',
          color: 'text-primary',
          path: '/pages/gallery'
        },
        {
          icon: 'ti-power-off',
          text: 'message.logOut',
          color: 'text-danger',
          path: ''
        }
      ]
    }
  },
  methods: {
    logoutUser() {
      this.$store.dispatch('logoutUserFromFirebase')
    }
  }
}
</script>
