<template>
  <div class="xedit">
    <textarea
      :placeholder="$t('tasks.edit task')"
      class="__ap_enter_binded"
      v-model="name"
      @keyup.enter="handleUpdateTaskName"
    ></textarea>
    <span class="cancel url" @click="cancelEditing">{{ $t('common.cancel') }}</span>
  </div>
</template>

<script>
import { mapActions } from "vuex";
import { message } from "../../helpers";
export default {
  name: "edit-task-name",
  props: {
    task: { type: Object, default: null },
    taskSelected: { type: Object, default: null },
    isEditing: { type: Boolean, default: false }
  },
  data() {
    return {
      id: this.task.id,
      name: this.task.name
    };
  },
  methods: {
    ...mapActions(["updateTaskName"]),
    cancelEditing() {
      this.$emit("closeEditing");
    },
    handleUpdateTaskName() {
      const { name, id } = this;
      this.updateTaskName({ name, id }).then(response => {
        if (!response.error) {
          this.cancelEditing();
          this.$notify(message('success', this.$t('messages.updated successfully')));
        }
      });
    }
  }
};
</script>

<style>
</style>
