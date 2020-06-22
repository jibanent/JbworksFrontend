<template>
  <div class="side">
    <search-tasks @searchTasks="handleSearchTasks" />

    <tasks-by-project-header-side-actions :project="project" />
  </div>
</template>

<script>
import TasksByProjectHeaderSideActions from "./TasksByProjectHeaderSideActions";
import SearchTasks from "../../SearchTasks";
export default {
  name: "tasks-by-project-header-side",
  props: {
    project: { type: Object, default: null }
  },
  components: {
    TasksByProjectHeaderSideActions,
    SearchTasks
  },
  methods: {
    handleSearchTasks(search) {
      this.$emit("searchTasks", search);
    }
  }
};
</script>

<style></style>
