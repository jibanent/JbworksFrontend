<template>
  <div class="main">
    <div class="tabs auto-active-url">
      <router-link
        :to="{ name: 'tasks', params: { currentUserId: currentUser.id } }"
        exactActiveClass="active"
        class="tab url"
        >Công việc</router-link
      >

      <router-link
        tag="div"
        :to="{
          name: 'tasks-department',
          params: { currentUserId: currentUser.id }
        }"
        exactActiveClass="active"
        class="tab url"
        v-if="$auth.isAdmin() || $auth.isLeader()"
      >
        Nhân viên của tôi
      </router-link>
    </div>
  </div>
</template>

<script>
export default {
  name: "task-tabs",
  props: {
    currentUser: { type: Object, default: null }
  }
};
</script>

<style></style>
