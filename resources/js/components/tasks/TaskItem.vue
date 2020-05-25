<template>
  <!-- <div>
    <div class="task-wrapper js-task">
      <div class="js-task li -todo -review ">
        <task-item-name :task="task" />
        <task-item-check :task="task" />
        <task-item-star :task="task" />
        <task-item-action />
        <task-item-deadline :task="task" />
        <task-item-assign :task="task" />
        <task-item-description :task="task" />
      </div>
    </div>
    <edit-task-name :task="task" />
  </div>-->
  <div class="task-wrapper js-task">
    <div
      class="js-task li -doing -review"
      :data-id="task.id"
      :class="{'-doing': task.status.slug === 'doing', '-done': task.status.slug === 'done', 'editing': isEditing}"
    >
      <div class="r"></div>
      <div class="rsep"></div>
      <task-item-name :task="task" />
      <edit-task-name :task="task" :isEditing="isEditing" @closeEditing="closeEditing" />
      <task-item-check :task="task" />
      <task-item-star :task="task" />
      <task-item-action :task="task" @selectTaskToEdit="selectTaskToEdit" />
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
import EditTaskName from "./EditTaskName";
export default {
  name: "task-item",
  props: {
    task: { type: Object, default: null }
  },
  data() {
    return {
      isEditing: false,
      arrTasks: []
    };
  },
  methods: {
    selectTaskToEdit(taskSelected) {
      if (taskSelected.id === this.task.id) this.isEditing = true;
    },
    closeEditing(){
      this.isEditing = false;
    }
  },
  components: {
    TaskItemName,
    TaskItemCheck,
    TaskItemStar,
    TaskItemAction,
    TaskItemDeadline,
    TaskItemAssign,
    TaskItemDescription,
    EditTaskName
  }
};
</script>

<style></style>
