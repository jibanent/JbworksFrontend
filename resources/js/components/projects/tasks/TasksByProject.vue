<template>
  <div id="project-master" class="scroll-y forced-scroll">
    <div class="relative">
      <tasks-by-project-side :project="project" :projectParticipants="projectParticipants" />

      <div id="project-canvas">
        <tasks-by-project-header :project="project" />

        <div class="project-app">
          <div class="project project-board" id="board">
            <task-by-project-filter :currentUser="currentUser" />
            <div id="tasklists" class="filter-all">
              <div class="tasklist js-group -sf ui-droppable">
                <div class="js-tasklist-tasks">
                  <div class="js-list-section -done list tasks ui-sortable">
                    <task-week v-for="(tasks, index) in renderTasks" :key="index" :tasks="tasks" />
                    <div
                      class="center apppages"
                      v-if="tasks && tasks.meta && tasks.meta.last_page > 1"
                    >
                      <div class="icons">
                        <div
                          class="prev"
                          :class="{disabled: page <= 1}"
                          @click="handlePagination('prev')"
                        >
                          <span class="-ap icon-arrow-left2"></span>
                        </div>
                        <div class="label">Page {{ page }}</div>
                        <div
                          class="next url"
                          :class="{disabled: page >= tasks.meta.last_page}"
                          @click="handlePagination('next')"
                        >
                          <span class="-ap icon-arrow-right2"></span>
                        </div>
                      </div>
                    </div>
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
import { mapActions, mapState, mapGetters } from "vuex";
import TasksByProjectSide from "./TasksByProjectSide";
import TasksByProjectHeader from "./TasksByProjectHeader";
import TaskByProjectFilter from "./TaskByProjectFilter";
import TaskItem from "../../tasks/TaskItem";
import TaskWeek from "../../tasks/TaskWeek";
export default {
  name: "tasks-by-project",
  data() {
    return {
      page: this.$route.query.page ? this.$route.query.page : 1
    };
  },
  watch: {
    $route(to, from) {
      if (to.name !== from.name) this.page = 1;
      const projectId = this.$route.params.id;
      this.getTasksByProject({ projectId, page: this.page });
    }
  },
  created() {
    const projectId = this.$route.params.id;
    this.getTasksByProject({ projectId, page: this.page });
    if (this.$auth.isAdmin() || this.$auth.isLeader()) {
      this.getMyDepartments(this.currentUser.id);
      this.getMyMembers(this.currentUser.id);
    }
  },
  methods: {
    ...mapActions(["getTasksByProject", "getMyMembers", "getMyDepartments"]),
    handlePagination(val) {
      if (val === "prev" && this.page > 1) this.page--;
      if (val === "next" && this.page < this.tasks.meta.last_page) this.page++;

      this.$router
        .replace({
          name: this.$route.name,
          query: { page: this.page }
        })
        .catch(error => {});
    }
  },
  computed: {
    ...mapGetters(["renderTasks"]),
    ...mapState({
      project: state => state.projects.project,
      currentUser: state => state.auth.currentUser,
      projectParticipants: state => state.projects.projectParticipants,
      tasks: state => state.tasks.tasks
    })
  },
  components: {
    TasksByProjectSide,
    TaskItem,
    TasksByProjectHeader,
    TaskByProjectFilter,
    TaskWeek
  }
};
</script>

<style>
</style>
