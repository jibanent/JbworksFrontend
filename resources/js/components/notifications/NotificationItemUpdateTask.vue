<template>
  <div class="text">
    <div class="-title" v-if="notification.data.task.type !== 'update_assigned_to'">
      [
      <em>{{ notification.data.task.project.name }}</em>]
      <em>{{ notification.data.task.updated_by.name }}</em>
      {{ textUpdateTask }}
      <em>{{ notification.data.task.name }}</em>
    </div>
    <div class="-title" v-if="notification.data.task.type === 'update_assigned_to'">
      [
      <em>{{ notification.data.task.project.name }}</em>]
      <em>{{ notification.data.task.updated_by.name }}</em> đã giao công việc
      <em>{{ notification.data.task.name }}</em> cho
      <em>{{ notification.data.task.assigned_to.name }}</em>
    </div>
    <div class="info">{{ formatTime }} {{ formatDate }}</div>
  </div>
</template>

<script>
import moment from 'moment'
export default {
  name: "notification-item-update-task",
  props: {
    notification: { type: Object, default: null }
  },
  computed: {
    formatTime() {
      return moment(this.notification.created_at).format("HH:mm");
    },
    formatDate() {
      return moment(this.notification.created_at).format("DD/MM/YYYY");
    },
    textUpdateTask() {
      const { type } = this.notification.data.task;
      if (type === "update_all") return "chỉnh sử công việc";
      if (type === "update_description") return "cập nhật mô tả công việc";
      if (type === "mark_star") return "đánh dấu ưu tiên công việc";
      if (type === "un_mark_star") return "hủy ưu tiên công việc";
      if (type === "important") return "đánh dấu quan trọng công việc";
      if (type === "unimportant") return "bỏ nhãn quan trọng công việc";
      if (type === "urgent") return "đánh dấu khẩn cấp công việc";
      if (type === "un_urgent") return "bỏ nhãn khẩn cấp công việc";
      if (type === "update_start_time") return "cập nhật thời gian bắt đầu công việc";
      if (type === "update_deadline") return "cập nhật thời gian deadline công việc";
      if (type === "update_name") return "cập nhật tên công việc";
      if (type === "update_result") return "cập nhật kết quả công việc";
      if (type === "done") return "đánh dấu hoàn thành công việc";
      if (type === "doing") return "bỏ đánh dấu hoàn thành công việc";
    }
  }
};
</script>

<style>
</style>
