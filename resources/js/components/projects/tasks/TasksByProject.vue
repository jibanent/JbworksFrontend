<template>
  <div id="project-master" class="scroll-y forced-scroll">
    <div class="relative">
      <tasks-by-project-side :project="project" />

      <div id="project-canvas">
        <tasks-by-project-header :project="project" />

        <div class="project-app">
          <div class="project project-board" id="board">
            <task-by-project-filter :currentUser="currentUser" />
            <div id="tasklists" class="filter-all">
              <div class="tasklist js-group -sf ui-droppable">
                <div class="js-tasklist-tasks">
                  <div class="js-list-section -done list tasks ui-sortable">
                    <task-item v-for="task in tasksByProject" :key="task.index" :task="task" />
                  </div>
                </div>
              </div>
            </div>&nbsp;
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions, mapState } from "vuex";
import TasksByProjectSide from "./TasksByProjectSide";
import TasksByProjectHeader from './TasksByProjectHeader'
import TaskByProjectFilter from './TaskByProjectFilter'
import TaskItem from "../../tasks/TaskItem";
export default {
  name: "tasks-by-project",
  created() {
    const projectId = this.$route.params.id;
    this.getTasksByProject(projectId);
    this.getMyMembers(this.currentUser.id);
  },
  methods: {
    ...mapActions(["getTasksByProject", "getMyMembers"])
  },
  computed: {
    ...mapState({
      tasksByProject: state => state.tasks.tasksByProject,
      project: state => state.projects.project,
      currentUser: state => state.auth.currentUser
    })
  },
  components: {
    TasksByProjectSide,
    TaskItem,
    TasksByProjectHeader,
    TaskByProjectFilter
  }
};
</script>

<style>
</style>
