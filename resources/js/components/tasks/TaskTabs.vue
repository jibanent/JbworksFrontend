<template>
  <div class="main">
    <div class="tabs auto-active-url">
      <router-link
        :to="{name: 'tasks', params: {currentUserId: currentUser.id}}"
        exactActiveClass="active"
        class="tab url"
      >Công việc</router-link>

      <div class="tab -dd -cmenuw">
        Nhân viên của tôi
        <div class="full-mask url"></div>
        <div class="-cmenu -padding -no-icon">
          <router-link
            tag="div"
            :to="{name: 'tasks-department', params: {currentUserId: currentUser.id}}"
            exactActiveClass="active"
            class="-item url"
          >DS công việc</router-link>
          <div class="-item url">Tổng quan</div>
        </div>
      </div>

      <div class="tab url" data-url="tasks/following">Đang theo dõi</div>
      <div class="tab url" data-url="tasks/calendar">Lịch biểu</div>
      <div class="tab url" data-url="tasks/repeated">CV lặp lại</div>
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

<style>
</style>
