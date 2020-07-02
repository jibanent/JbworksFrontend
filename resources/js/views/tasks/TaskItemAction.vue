<template>
  <div class="actions">
    <span
      class="icon url -infow"
      @click="selectTaskToEdit(task)"
      v-if="$auth.can('edit task name')"
    >
      <span class="ficon-pencil-square"></span>
      <span class="-infobox -up -w200">
        <span class="-box block normal">{{ $t('common.edit') }}</span>
      </span>
    </span>
    <span
      class="icon url -infow"
      @click="showEditTaskDeadline"
      v-if="$auth.can('edit start date and deadline')"
    >
      <span class="ficon-calendar"></span>
      <span class="-infobox -up -w200">
        <span class="-box block normal">{{ $t('tasks.deadline') }}</span>
      </span>
    </span>
    <span
      class="icon url -infow"
      @click="showEditTaskStartTime"
      v-if="$auth.can('edit start date and deadline')"
    >
      <span class="ficon-play-circle"></span>
      <span class="-infobox -up -w200">
        <span class="-box block normal">{{ $t('tasks.start date') }}</span>
      </span>
    </span>
    <span class="icon url -infow" @click="handleToggleUrgent">
      <span class="ficon-exclamation-circle"></span>
      <span class="-infobox -up -w200">
        <span class="-box block normal">{{ $t('tasks.urgent') }}</span>
      </span>
    </span>
    <span class="icon url -infow" @click="handleToggleImportant">
      <span class="ficon-bookmark"></span>
      <span class="-infobox -up -w200">
        <span class="-box block normal">{{ $t('tasks.important') }}</span>
      </span>
    </span>
    <span class="icon url -infow" @click="showConfirmDeleteTask" v-if="$auth.can('delete task')">
      <span class="ficon-trash-o"></span>
      <span class="-infobox -up -w200">
        <span class="-box block normal">{{ $t('tasks.delete task') }}</span>
      </span>
    </span>
  </div>
</template>

<script>
import { mapActions } from "vuex";
import { message } from "../../helpers";
export default {
  name: "task-item-action",
  props: {
    task: { type: Object, default: null }
  },
  methods: {
    ...mapActions(["toggleUrgent", "toggleImportant"]),
    selectTaskToEdit(task) {
      this.$emit("selectTaskToEdit", task);
    },
    showEditTaskDeadline(e) {
      const x = e.clientX;
      const y = e.clientY;
      this.$store.commit("TOGGLE_EDIT_TASK_DEADLINE");
      this.$store.commit("SET_COORDINATES_SHOW_EDIT_TASK_DEADLINE", { x, y });
      this.$store.commit("SET_TASK_EDITING", this.task);
    },
    showEditTaskStartTime(e) {
      const x = e.clientX;
      const y = e.clientY;
      this.$store.commit("TOGGLE_EDIT_TASK_START_TIME");
      this.$store.commit("SET_COORDINATES_SHOW_EDIT_TASK_START_TIME", { x, y });
      this.$store.commit("SET_TASK_EDITING", this.task);
    },
    handleToggleUrgent() {
      const is_urgent = !this.task.is_urgent;
      const id = this.task.id;
      this.toggleUrgent({ id, is_urgent }).then(response => {
        if (!response.error) {
          this.$notify(
            message("success", this.$t("messages.updated successfully"))
          );
        }
      });
    },
    handleToggleImportant() {
      const is_important = !this.task.is_important;
      const id = this.task.id;
      this.toggleImportant({ id, is_important }).then(response => {
        if (!response.error) {
          this.$notify(
            message("success", this.$t("messages.updated successfully"))
          );
        }
      });
    },
    showConfirmDeleteTask() {
      this.$store.commit("TOGGLE_CONFIRM_DELETE_TASK");
      this.$store.commit("SET_TASK_EDITING", this.task);
    }
  }
};
</script>

<style></style>
