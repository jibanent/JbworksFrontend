<template>
  <div id="project-side">
    <task-side-info :currentUser="currentUser" />
    <task-side-members :myMembers="myMembers" v-if="$auth.isAdmin() || $auth.isLeader()" />
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
    myMembers: { type: Object, default: {} },
    currentUser: { type: Object, default: null }
  }
};
</script>

<style>
</style>
