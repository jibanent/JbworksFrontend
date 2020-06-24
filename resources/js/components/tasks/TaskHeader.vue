<template>
  <div id="header" v-if="currentUser">
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
    <div class="side">
      <search @search="handleSearchTasks" placeholder="Tìm kiếm công việc" />
    </div>
    <task-tabs :currentUser="currentUser" />
  </div>
</template>

<script>
import { getAvatar } from "../../helpers";
import TaskTabs from "./TaskTabs";
import Search from "../Search";
export default {
  name: "task-header",
  props: {
    currentUser: { type: Object, default: null },
    params: { type: Object, default: null }
  },
  computed: {
    avatar() {
      return getAvatar(this.currentUser.avatar);
    }
  },
  methods: {
    handleSearchTasks(search) {
      const { status, project, order } = this.params;
      this.$emit("searchTasks", { search, status, project, order });
    }
  },
  components: {
    TaskTabs,
    Search
  }
};
</script>

<style scoped>
.-avatar img {
  object-fit: cover;
  object-position: center;
}
</style>
