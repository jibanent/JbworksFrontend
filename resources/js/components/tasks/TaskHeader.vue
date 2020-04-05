<template>
  <div id="header">
    <div class="nav">
      <span class="icon"></span>
    </div>
    <div class="title">
      <div class="icon -avatar">
        <img :src="avatar" />
      </div>
      <div class="name">
        <span class="url">{{ currentUser.name }}</span>
      </div>
    </div>

    <task-search />

    <task-tabs :currentUser="currentUser" />
  </div>
</template>

<script>
import { getAvatar } from "../../helpers";
import TaskTabs from "./TaskTabs";
import TaskSearch from "./TaskSearch";
export default {
  name: "task-header",
  props: {
    currentUser: { type: Object, default: null }
  },
  computed: {
    avatar() {
      return getAvatar(this.currentUser.avatar);
    }
  },
  components: {
    TaskTabs,
    TaskSearch
  }
};
</script>

<style scoped>
.-avatar img {
  object-fit: cover;
  object-position: center;
}
</style>
