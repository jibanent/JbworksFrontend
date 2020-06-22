<template>
  <div id="project-master" class="scroll-y forced-scroll">
    <div class="relative">
      <tasks-by-project-side
        :project="project"
        :projectParticipants="projectParticipants"
      />

      <div id="project-canvas">
        <tasks-by-project-header
          :project="project"
          :params="params"
          @searchTasks="handleTasksFilter"
        />

        <div class="project-app">
          <div class="project project-board" id="board">
            <task-by-project-filter :currentUser="currentUser" @filterTasks="handleTasksFilter" :params="params" />
            <div id="tasklists" class="filter-all">
              <div class="tasklist js-group -sf ui-droppable">
                <div class="js-tasklist-tasks">
                  <div class="js-list-section -done list tasks ui-sortable">
                    <task-week
                      v-for="(tasks, index) in renderTasks"
                      :key="index"
                      :tasks="tasks"
                    />
                    <pagination
                      :page="page"
                      :lastPage="tasks.meta.last_page"
                      v-if="tasks && tasks.meta"
                      @pagination="handlePagination"
                    />
                  </div>
                </div>
              </div>
            </div>
            &nbsp;
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
// import TaskItem from "../../tasks/TaskItem";
import TaskWeek from "../../tasks/TaskWeek";
import Pagination from "../../Pagination";
export default {
  name: "tasks-by-project",
  data() {
    return {
      page: 1,
      params: {
        search: null,
        status: null,
        start: null,
        end: null,
        order: null
      }
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
    const { page, params } = this;
    this.getTasksByProject({ projectId, page, params });

    if (this.$auth.isAdmin() || this.$auth.isLeader()) {
      this.getMyDepartments(this.currentUser.id);
      this.getMyMembers(this.currentUser.id);
    }
  },
  methods: {
    ...mapActions(["getTasksByProject", "getMyMembers", "getMyDepartments"]),
    handlePagination(val) {
      const lastPage = this.tasks.meta.last_page;
      if (val === "prev" && this.page > 1) this.page--;
      else if (val === "next" && this.page < lastPage) this.page++;
      else return false;

      const projectId = this.$route.params.id;
      const { params, page } = this;

      this.getTasksByProject({ projectId, page, params });
    },
    handleTasksFilter(query) {
      console.log("query", query);
      this.page = 1;
      Object.keys(this.params).forEach(key => {
        this.params[key] = query[key];
      });

      const projectId = this.$route.params.id;
      const { page, params } = this;
      this.getTasksByProject({ projectId, page, params });
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
    // TaskItem,
    TasksByProjectHeader,
    TaskByProjectFilter,
    TaskWeek,
    Pagination
  }
};
</script>

<style></style>
