<template>
  <div class="li url notis js-notis-28955049" :class="{unread: notification.read_at === null}" @click="handleMarkAsRead">
    <div class="avatar avatar-40 -circled">
      <div class="image">
        <img :src="avatar" />
      </div>
    </div>
    <div class="text" v-if="notification.type.includes('CreateTask')">
      <div class="-title">
        [
        <em>{{ notification.data.new_task.project.name }}</em>]
        <em>{{ notification.data.new_task.create_by.name }}</em> tạo mới một công việc
        <em>{{ notification.data.new_task.name }}</em> cho bạn
      </div>
      <div class="info">{{ formatTime }} {{ formatDate }}</div>
    </div>
  </div>
</template>

<script>
import { getAvatar } from "../../helpers";
import moment from "moment";
import { mapActions } from 'vuex';
export default {
  name: "notification-item",
  props: {
    notification: { type: Object, default: null }
  },
  computed: {
    avatar() {
      return getAvatar(this.notification.data.new_task.create_by.avatar);
    },
    formatTime() {
      return moment(this.notification.data.new_task.created_at).format("HH:mm");
    },
    formatDate() {
      return moment(this.notification.data.new_task.created_at).format(
        "DD/MM/YYYY"
      );
    }
  },
  methods: {
    ...mapActions(['markAsRead']),
    handleMarkAsRead() {
      this.markAsRead(this.notification.id);
    }
  },
};
</script>

<style>
</style>
