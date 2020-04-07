<template>
  <div class="task-wrapper js-task">
    <div class="js-task li -todo -review">
      <task-item-name :task="task" />
      <task-item-check :task="task" />
      <task-item-star />
      <task-item-action />
      <task-item-deadline :task="task" />
      <task-item-assign :task="task" />
      <task-item-description :task="task" />
    </div>
  </div>
</template>

<script>
import { getAvatar, removeVietnameseFromString } from "../../helpers";
import TaskItemName from "./TaskItemName";
import TaskItemCheck from "./TaskItemCheck";
import TaskItemStar from "./TaskItemStar";
import TaskItemAction from "./TaskItemAction";
import TaskItemDeadline from "./TaskItemDeadline";
import TaskItemAssign from "./TaskItemAssign";
import TaskItemDescription from "./TaskItemDescription";
export default {
  name: "task-item",
  props: {
    task: {
      type: Object,
      default: null
    }
  },
  components: {
    TaskItemName,
    TaskItemCheck,
    TaskItemStar,
    TaskItemAction,
    TaskItemDeadline,
    TaskItemAssign,
    TaskItemDescription
  }
};
</script>

<style></style>
