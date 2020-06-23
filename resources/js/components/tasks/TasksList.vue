<template>
  <div class="project">
    <div id="tasklists">
      <div class="tasklist" v-for="obj in tasks" :key="obj.id">
        <div class="tasks js-list-tasks">
          <div class="list-sep">Tuần {{ formatDate(obj.from) }} - {{ formatDate(obj.to) }}</div>
          <task-item v-for="task in obj.value" :key="task.id" :task="task" :project="project" />
        </div>
      </div>
      <pagination
        :page="page"
        :lastPage="lastPage"
        @pagination="handlePagination"
      />
    </div>
  </div>
</template>

<script>
import TaskItem from "./TaskItem";
import Pagination from '../Pagination'
import moment from "moment";
export default {
  name: "tasks-list",
  props: {
    tasks: { type: Array, default: () => [] },
    lastPage: { type: Number, default: 1 },
    page: { type: Number, default: 1},
    project: {type: Object, default: null}
  },
  methods: {
    formatDate(date) {
      return moment(date).format("DD/MM/YYYY");
    },
    handlePagination(val) {
      this.$emit('pagination', val);
    }
  },
  components: {
    TaskItem,
    Pagination
  }
};
</script>

<style></style>
