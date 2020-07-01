<template>
  <div class="timebox" v-if="task.due_on">
    <div class="tx duration">
      <em class="url" :class="{red: task.is_overdue}">{{ formatDate }}</em>
    </div>
  </div>
</template>

<script>
import moment from "moment";
export default {
  name: "task-item-deadline",
  props: {
    task: { type: Object, default: null }
  },
  computed: {
    formatDate() {
      return moment(this.task.due_on).format("DD/MM/YYYY");
    }
  }
};
</script>

<style>
</style>
