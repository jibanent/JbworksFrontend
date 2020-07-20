<template>
  <div class="side">
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
};
</script>

<style></style>
