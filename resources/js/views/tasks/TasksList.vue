<template>
  <div class="project">
    <div id="tasklists">
      <div class="tasklist" v-for="obj in tasks" :key="obj.id">
        <div class="tasks js-list-tasks">
          <div
            class="list-sep"
          >{{ $t('tasks.week', { week: formatDate(obj.from) + ' - ' + formatDate(obj.to)}) }}</div>
          <task-item v-for="task in obj.value" :key="task.id" :task="task" :project="project" />
        </div>
      </div>
      <pagination :page="page" :lastPage="lastPage" @pagination="handlePagination" />
    </div>
  </div>
</template>

<script>
import TaskItem from "./TaskItem";
import Pagination from "../../components/Pagination";
import moment from "moment";
import i18n from "../../lang";
export default {
  name: "tasks-list",
  props: {
    tasks: { type: Array, default: () => [] },
    lastPage: { type: Number, default: 1 },
    page: { type: Number, default: 1 },
    project: { type: Object, default: null }
  },
  methods: {
    formatDate(date) {
      return moment(date)
        .locale(i18n.locale)
        .format("L");
    },
    handlePagination(val) {
      this.$emit("pagination", val);
    }
  },
  components: {
    TaskItem,
    Pagination
  }
};
</script>

<style></style>
