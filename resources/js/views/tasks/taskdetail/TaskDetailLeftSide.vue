<template>
  <div id="project-master" class="forced-scroll showing-task">
    <div id="project-canvas">
      <task-detail-left-side-header :currentUser="currentUser" @filterTasks="handleTasksFilter" />

      <div id="mytasks">
        <div id="js-project-me" class="mytasks">
          <div id="js-mytasks">
            <tasks-list
              :tasks="tasks"
              :page="page"
              :lastPage="meta.last_page"
              @pagination="handlePagination"
              @filterTasks="handleTasksFilter"
              v-if="meta"
            />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import TaskDetailLeftSideHeader from "./TaskDetailLeftSideHeader";
import TasksList from ".././TasksList";
export default {
  name: "task-detail-left-side",
  props: {
    currentUser: { type: Object, default: null },
    tasks: { type: Array, default: () => [] },
    meta: { type: Object, default: null },
    page: { type: Number, default: 1 }
  },
  methods: {
    handlePagination(val) {
      this.$emit("pagination", val);
    },
    handleTasksFilter(search) {
      this.$emit("filterTasks", search);
    }
  },
  components: {
    TaskDetailLeftSideHeader,
    TasksList
  }
};
</script>

<style >
</style>
