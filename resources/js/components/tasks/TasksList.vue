<template>
  <div>
    <task-week
      v-for="(tasks, index) in renderTasks"
      :key="index"
      :tasks="tasks"
    />
  </div>
</template>

<script>
import TaskWeek from "./TaskWeek";
export default {
  name: "tasks-list",
  props: {
    renderTasks: { type: Array, default: () => [] },
    meta: { type: Object, default: null }
  },
  components: {
    TaskWeek
  }
};
</script>

<style></style>
