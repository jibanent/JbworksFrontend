<template>
  <div id="subheader">
    <div id="js-project-header">
      <div class="task-user-add">
        <div class="avatar" v-if="$auth.can('create new task')">
          <img :src="avatar" />
        </div>
        <div class="icon" v-if="$auth.can('create new task')">
          <span class="-ap icon-plus2"></span>
        </div>
        <div class="mask url"></div>
        <div class="txt" v-if="$auth.can('create new task')">
          <span class="action" @click="openAddTaskDialog">Tạo công việc</span>
        </div>
      </div>
    </div>

    <div class="menu"></div>

    <div class="side">
      <div id="project-filters">
        <multi-date-range-picker
          @range="handleFilterByCreatedAt"
          :date="{ start: params.start, end: params.end }"
        />

        <tasks-status-filter
          @filterTasksByStatus="handleFilterByStatus"
          :status="params.status"
        />

        <tasks-sort :order="params.order" @sortTasks="handleSortTasks" />
      </div>
    </div>
  </div>
</template>

<script>
import { getAvatar } from "../../../helpers";
import TasksStatusFilter from "../../TasksStatusFilter";
import TasksSort from "../../TasksSort";
import MultiDateRangePicker from "../../MultiDateRangePicker";
export default {
  name: "task-by-project-filter",
  props: {
    currentUser: { type: Object, default: null },
    params: { type: Object, default: null }
  },
  computed: {
    avatar() {
      return getAvatar(this.currentUser.avatar);
    }
  },
  methods: {
    openAddTaskDialog() {
      this.$store.commit("TOGGLE_ADD_TASK_DIALOG");
    },
    handleFilterByStatus(status = null) {
      const { search, order, start, end } = this.params;
      this.$emit("filterTasks", { status, search, order, start, end });
    },
    handleSortTasks(order = null) {
      const { search, status } = this.params;
      this.$emit("filterTasks", { order, search, status });
    },
    handleFilterByCreatedAt(date = null) {
      const { search, status, order } = this.params;
      this.$emit("filterTasks", { ...date, search, status, order });
    }
  },
  components: { TasksStatusFilter, TasksSort, MultiDateRangePicker }
};
</script>

<style></style>
