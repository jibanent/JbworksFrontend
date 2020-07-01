<template>
  <div
    class="li url notis js-notis-28955049"
    :class="{unread: notification.read_at === null}"
    @click="handleMarkAsRead"
  >
    <div class="avatar avatar-40 -circled">
      <div class="image">
        <img :src="avatar" />
      </div>
    </div>

    <notification-item-create-task
      :notification="notification"
      v-if="notification.type.includes('CreateTask')"
    />
    <notification-item-update-task
      :notification="notification"
      v-if="notification.type.includes('UpdateTask')"
    />
  </div>
</template>

<script>
import NotificationItemCreateTask from "./NotificationItemCreateTask";
import NotificationItemUpdateTask from "./NotificationItemUpdateTask";
import { getAvatar, removeVietnameseFromString } from "../../helpers";
import moment from "moment";
import { mapActions } from "vuex";
export default {
  name: "notification-item",
  props: {
    notification: { type: Object, default: null }
  },
  computed: {
    avatar() {
      let avatar;
      if (this.notification.data.task.created_by) {
        avatar = this.notification.data.task.created_by.avatar;
      }
      if (this.notification.data.task.updated_by) {
        avatar = this.notification.data.task.updated_by.avatar;
      }
      return getAvatar(avatar);
    },
    formatTaskName() {
      return removeVietnameseFromString(this.notification.data.task.name);
    }
  },
  methods: {
    ...mapActions(["markAsRead"]),
    handleMarkAsRead() {
      this.$store.commit("TOGGLE_NOTIFICATIONS");
      this.markAsRead(this.notification.id);
      if (this.notification.data.task) {
      }
      this.$router
        .push({
          name: "task-detail",
          params: {
            id: this.notification.data.task.id,
            task: this.formatTaskName
          }
        })
        .catch(e => {});
    }
  },
  components: {
    NotificationItemCreateTask,
    NotificationItemUpdateTask
  }
};
</script>

<style>
</style>
