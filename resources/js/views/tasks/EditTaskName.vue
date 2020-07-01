<template>
  <div class="xedit">
    <textarea
      placeholder="Sửa công việc"
      class="__ap_enter_binded"
      v-model="name"
      @keyup.enter="handleUpdateTaskName"
    ></textarea>
    <span class="cancel url" @click="cancelEditing">Hủy</span>
  </div>
</template>

<script>
import { mapActions } from "vuex";
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
      const {name, id} = this
      this.updateTaskName({name, id}).then(response => {
        if(!response.error) {
          this.cancelEditing();
          this.$notify({
            group: "center",
            type: "success",
            text: "Cập nhật thành công!",
            position: "top center"
          });
        }
      });
    }
  }
};
</script>

<style>
</style>
