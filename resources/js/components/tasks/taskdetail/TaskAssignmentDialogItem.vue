<template>
  <div class="api-user" @click="handleAssignTask(user.id)">
    <div class="avatar avatar-24 -circled">
      <div class="image">
        <img :src="avatar" />
      </div>
    </div>
    <div class="api-context">
      <div class="api-name">{{ user.name }}</div>
      <div class="api-info ap-xdot">{{ user.position }}</div>
    </div>
  </div>
</template>

<script>
import { getAvatar } from "../../../helpers";
import { mapActions } from "vuex";
export default {
  name: "task-assignment-dialog-item",
  props: {
    user: { type: Object, default: null },
    task: { type: Object, default: null }
  },
  computed: {
    avatar() {
      return getAvatar(this.user.avatar);
    }
  },
  methods: {
    ...mapActions(["updateAssignedTo"]),
    handleAssignTask(assignedTo) {
      this.updateAssignedTo({
        taskId: this.task.id,
        assignedTo
      }).then(response => {
        this.$store.commit("TOGGLE_TASK_ASSIGNMENT_DIALOG");
        if (!response.error) {
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
