<template>
  <div class="task-header">
    <div class="actions">
      <router-link tag="div" to="/tasks" class="action -close" title="Close task preview">
        <span class="-ap icon-close"></span>
      </router-link>
      <div class="action -star url" :title="$t('tasks.mark star')" @click="handleToggleMarkStar">
        <span
          :class="{'text-yellow': task && task.mark_star, 'ficon-star': task && task.mark_star, 'ficon-star-o': task && !task.mark_star}"
        ></span>
      </div>
      <div
        class="action url -important0"
        :title="$t('tasks.important')"
        @click="handleToggleImportant"
      >
        <span class="ficon-bookmark-o"></span>
      </div>
      <div class="action -urgent0 url" :title="$t('tasks.urgent')" @click="handleToggleUrgent">
        <span class="ficon-exclamation-circle"></span>
      </div>
      <div
        class="action -more"
        @click="$store.commit('TOGGLE_TASK_ACTION_OPTION_DIALOG')"
        v-if="$auth.can('create new task')"
      >
        <span class="-ap icon-dots-three-horizontal"></span>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions } from "vuex";
import { message } from "../../../helpers";
export default {
  name: "task-detail-header",
  props: {
    task: { type: Object, default: null }
  },
  methods: {
    ...mapActions(["toggleUrgent", "toggleImportant", "toggleMarkStar"]),
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
    handleToggleMarkStar() {
      const mark_star = !this.task.mark_star;
      const id = this.task.id;
      this.toggleMarkStar({ id, mark_star }).then(response => {
        if (!response.error) {
          this.$notify(
            message("success", this.$t("messages.updated successfully"))
          );
        }
      });
    }
  }
};
</script>

<style></style>
