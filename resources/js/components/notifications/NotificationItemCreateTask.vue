<template>
  <div class="text">
    <div class="-title">
      [
      <em>{{ notification.data.task.project.name }}</em>]
      <em>{{ notification.data.task.created_by.name }}</em> tạo mới một công việc
      <em>{{ notification.data.task.name }}</em> cho bạn
    </div>
    <div class="info">{{ formatTime }} {{ formatDate }}</div>
  </div>
</template>

<script>
import moment from "moment";
export default {
  name: "notification-item-create-task",
  props: {
    notification: { type: Object, default: null }
  },
  computed: {
    formatTime() {
      return moment(this.notification.created_at).format("HH:mm");
    },
    formatDate() {
      return moment(this.notification.created_at).format("DD/MM/YYYY");
    }
  }
};
</script>

<style>
</style>
