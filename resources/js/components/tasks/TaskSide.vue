<template>
  <div id="project-side">
    <task-side-info :currentUser="currentUser" />
    <task-side-members :myMembers="myMembers" />
  </div>
</template>

<script>
import TaskSideInfo from "./TaskSideInfo";
import TaskSideMembers from "./TaskSideMembers";
export default {
  name: "task-side",
  components: {
    TaskSideInfo,
    TaskSideMembers
  },
  props: {
    myMembers: { type: Array, default: [] },
    currentUser: { type: Object, default: null }
  }
};
</script>

<style>
</style>
