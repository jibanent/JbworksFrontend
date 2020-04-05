<template>
  <div class="tasklist">
    <div class="tasks js-list-tasks">
      <div class="list-sep">Tuần {{ formatDate(tasks.from) }} - {{ formatDate(tasks.to) }}</div>
      <task-item v-for="task in tasks.value" :key="task.id" :task="task" />
    </div>
  </div>
</template>

<script>
import TaskItem from "./TaskItem";
import moment from "moment";
export default {
  name: "task-week",
  props: {
    tasks: {
      type: Object,
      default: null
    }
  },
  methods: {
    formatDate(date) {
      return moment(date).format("DD/MM/YYYY");
    }
  },
  components: {
    TaskItem
  }
};
</script>

<style>
</style>
