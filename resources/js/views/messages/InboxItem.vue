<template>
  <div class="message -saved -leading __p -first" :title="sentOn">
    <div class="wrapper">
      <div class="image">
        <div class="avatar">
          <img :src="avatar" />
        </div>
      </div>
      <div class="content">
        <div class="header ap-xdot">
          <em class="url">{{ message.sender.name }}</em>
          <span class="time ap-f12">{{ sentAt }}</span>
        </div>
        <div class="body-wrapper">
          <div class="body">
            <span class="msg-body">{{ message.message }}</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { getAvatar } from "../../helpers";
import i18n from "../../lang";
import moment from "moment";
export default {
  name: "inbox-item",
  props: {
    message: { type: Object, default: null },
  },
  computed: {
    avatar() {
      return getAvatar(this.message.sender.avatar);
    },
    sentAt() {
      return moment(this.message.created_at).format("HH:mm");
    },
    sentOn() {
      if (this.message && this.message.created_at) {
        return (
          this.sentAt +
          " " +
          moment(this.message.created_at).locale(i18n.locale).format("L") +
          " - " +
          moment(this.message.created_at).fromNow()
        );
      }
    },
  },
};
</script>

<style scoped>
.image img {
  object-fit: cover;
  object-position: center;
}
</style>
