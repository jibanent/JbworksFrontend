<template>
  <div class="side">
    <div class="search">
      <div class="input">
        <input type="text" placeholder="Tìm nhanh công việc" class="__autoc __autoresized" />
      </div>
      <div class="close">
        <span class="-ap icon-uniF108"></span>
      </div>
    </div>

    <tasks-by-project-header-side-actions :project="project" />
  </div>
</template>

<script>
import TasksByProjectHeaderSideActions from "./TasksByProjectHeaderSideActions";
export default {
  name: "tasks-by-project-header-side",
  props: {
    project: { type: Object, default: null }
  },
  components: {
    TasksByProjectHeaderSideActions
  }
};
</script>

<style>
</style>
