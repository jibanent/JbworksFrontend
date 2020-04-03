<template>
  <div class="avatar avatar-24 -circled url">
    <div class="image">
      <img :src="avatar" />
    </div>
  </div>
</template>

<script>
import { getAvatar } from "../../helpers";
export default {
  name: "project-participants",
  props: {
    userJoined: { type: Object, default: null }
  },
  computed: {
    avatar() {
      return getAvatar(this.userJoined.avatar);
    }
  }
};
</script>

<style>
</style>
