<template>
  <div class="actions">
    <span
      class="icon url -infow"
      @click="selectTaskToEdit(task)"
      v-if="$auth.can('edit task name')"
    >
      <span class="ficon-pencil-square"></span>
      <span class="-infobox -up -w200">
        <span class="-box block normal">Chỉnh sửa</span>
      </span>
    </span>
    <span
      class="icon url -infow"
      @click="showEditTaskDeadline"
      v-if="$auth.can('edit start date and deadline')"
    >
      <span class="ficon-calendar"></span>
      <span class="-infobox -up -w200">
        <span class="-box block normal">Deadline hoàn thành</span>
      </span>
    </span>
    <span
      class="icon url -infow"
      v-if="$auth.can('edit start date and deadline')"
    >
      <span class="ficon-play-circle"></span>
      <span class="-infobox -up -w200">
        <span class="-box block normal">Ngày bắt đầu</span>
      </span>
    </span>
    <span class="icon url -infow">
      <span class="ficon-exclamation-circle"></span>
      <span class="-infobox -up -w200">
        <span class="-box block normal">Độ khẩn cấp</span>
      </span>
    </span>
    <span class="icon url -infow">
      <span class="ficon-bookmark"></span>
      <span class="-infobox -up -w200">
        <span class="-box block normal">Quan trọng</span>
      </span>
    </span>
    <span class="icon url -infow">
      <span class="ficon-bell"></span>
      <span class="-infobox -up -w200">
        <span class="-box block normal">Milestone</span>
      </span>
    </span>
    <span class="icon url -infow" v-if="$auth.can('delete task')">
      <span class="ficon-trash-o"></span>
      <span class="-infobox -up -w200">
        <span class="-box block normal">Xóa công việc</span>
      </span>
    </span>
  </div>
</template>

<script>
export default {
  name: "task-item-action",
  props: {
    task: { type: Object, default: null }
  },
  methods: {
    selectTaskToEdit(task) {
      this.$emit("selectTaskToEdit", task);
    },
    showEditTaskDeadline(e) {
      const x = e.clientX;
      const y = e.clientY;
      this.$store.commit("TOGGLE_EDIT_TASK_DEADLINE");
      this.$store.commit("SET_COORDINATES_SHOW_EDIT_TASK_DEADLINE", { x, y });
      this.$store.commit("SET_TASK_EDITING", this.task);
    }
  }
};
</script>

<style></style>
