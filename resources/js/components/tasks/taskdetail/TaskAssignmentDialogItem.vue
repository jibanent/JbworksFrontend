<template>
  <div class="api-user">
    <div class="avatar avatar-24 -circled">
      <div class="image">
        <img :src="avatar" />
      </div>
    </div>
    <div class="api-context">
      <div class="api-name">{{ user.name }}</div>
      <div class="api-info ap-xdot">{{ user.position }}</div>
    </div>
  </div>
</template>

<script>
import { getAvatar } from "../../../helpers";
export default {
  name: "task-assignment-dialog-item",
  props: {
    user: { type: Object, default: null }
  },
  computed: {
    avatar() {
      return getAvatar(this.user.avatar);
    }
  }
};
</script>

<style>
</style>
