<template>
  <div class="main">
    <div class="tabs auto-active-url">
      <router-link
        :to="{ name: 'tasks', params: { currentUserId: currentUser.id } }"
        exactActiveClass="active"
        class="tab url"
        >{{ $t('tasks.tasks') }}</router-link
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
        {{ $t('tasks.my members') }}
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
