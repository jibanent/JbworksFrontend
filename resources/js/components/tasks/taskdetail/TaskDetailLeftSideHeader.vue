<template>
  <div id="header" v-if="currentUser">
    <div class="nav">
      <span class="icon"></span>
    </div>

    <div class="title">
      <div class="icon -avatar"><img :src="avatar" /></div>

      <div class="name">
        <span class="url">{{ currentUser.name }}</span>
      </div>
    </div>
    <div class="side">
      <div class="search">
        <div class="input">
          <input placeholder="Tìm kiếm công việc" class="__ap_enter_binded" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { getAvatar } from "../../../helpers";
export default {
  name: "task-detail-left-side-header",
  props: {
    currentUser: { type: Object, default: null }
  },
  computed: {
    avatar() {
      return getAvatar(this.currentUser.avatar);
    }
  }
};
</script>

<style>
</style>
