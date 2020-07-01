<template>
  <div class="side">
    <search @search="handleSearchTasks" placeholder="Tìm kiếm công việc" />

    <tasks-by-project-header-side-actions :project="project" />
  </div>
</template>

<script>
import TasksByProjectHeaderSideActions from "./TasksByProjectHeaderSideActions";
import Search from "../../../components/Search";
export default {
  name: "tasks-by-project-header-side",
  props: {
    project: { type: Object, default: null }
  },
  components: {
    TasksByProjectHeaderSideActions,
    Search
  },
  methods: {
    handleSearchTasks(search) {
      this.$emit("searchTasks", search);
    }
  }
};
</script>

<style></style>
