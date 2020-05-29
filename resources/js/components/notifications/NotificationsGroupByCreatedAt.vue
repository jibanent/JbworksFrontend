<template>
  <div id="base-notis-items">
    <div class="datesep js-sep-25052020">
      <span class="d">{{ formatDate }}</span>
      <span class="diff">{{ formatFromNow }}</span>
    </div>
    <notification-item
      v-for="notification in notifications.value"
      :key="notification.id"
      :notification="notification"
    />
  </div>
</template>

<script>
import NotificationItem from "./NotificationItem";
import moment from "moment";
export default {
  name: "notifications-group-by-created-at",
  props: {
    notifications: { type: Object, default: null }
  },
  computed: {
    formatDate() {
      return moment(this.notifications.created_at).format("DD/MM/YYYY");
    },
    formatFromNow() {
      return moment(this.notifications.created_at).fromNow();
    }
  },
  components: {
    NotificationItem
  }
};
</script>

<style>
</style>
