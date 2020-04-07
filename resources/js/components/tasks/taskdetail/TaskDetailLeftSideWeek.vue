<template>
  <div class="tasklist">
    <div class="tasks js-list-tasks">
      <div class="list-sep">Tuần {{ formatDate(tasks.from) }} - {{ formatDate(tasks.to) }}</div>
      <task-detail-left-side-item v-for="(task, index) in tasks.value" :key="index" :task="task" />
    </div>
  </div>
</template>

<script>
import moment from "moment";
import TaskDetailLeftSideItem from "./TaskDetailLeftSideItem";
export default {
  name: "task-detail-left-side-week",
  props: {
    tasks: { type: Object, default: null }
  },
  components: {
    TaskDetailLeftSideItem
  },
  methods: {
    formatDate(date) {
      return moment(date).format("DD/MM/YYYY");
    }
  }
};
</script>

<style>
</style>
