<template>
  <div id="header" v-if="currentUser">
    <navbar />
    <div class="title">
      <div class="icon -avatar">
        <img :src="avatar" />
      </div>

      <div class="name">
        <span class="url">{{ currentUser.name }}</span>
      </div>
    </div>
    <div class="side">
      <search @search="handleSearchTasks" :placeholder="$t('tasks.search task')" />
    </div>
  </div>
</template>

<script>
import { getAvatar } from "../../../helpers";
import Search from "../../../components/Search";
import Navbar from "../../../layout/components/Navbar";
export default {
  name: "task-detail-left-side-header",
  props: {
    currentUser: { type: Object, default: null }
  },
  computed: {
    avatar() {
      return getAvatar(this.currentUser.avatar);
    }
  },
  methods: {
    handleSearchTasks(search) {
      this.$emit("filterTasks", { search });
    }
  },
  components: {
    Search,
    Navbar
  }
};
</script>

<style>
</style>
