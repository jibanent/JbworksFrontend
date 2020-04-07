<template>
  <div class="task-wrapper js-task">
    <div class="js-task li -doing -overdue active focusing">
      <task-item-name :task="task" />
      <task-item-check :task="task" />
      <task-item-assign :task="task" />
      <task-item-description :task="task" />
    </div>
  </div>
</template>

<script>
import TaskItemName from "../TaskItemName";
import TaskItemCheck from "../TaskItemCheck";
import TaskItemAssign from "../TaskItemAssign";
import TaskItemDescription from "../TaskItemDescription";
export default {
  name: "task-detail-left-side-item",
  props: {
    task: { type: Object, default: null }
  },
  components: {
    TaskItemName,
    TaskItemCheck,
    TaskItemAssign,
    TaskItemDescription
  },
};
</script>

<style>
</style>
