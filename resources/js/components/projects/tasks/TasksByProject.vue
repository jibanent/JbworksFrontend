<template>
  <div id="project-master" class="scroll-y forced-scroll">
    <div class="relative">
      <tasks-by-project-side :project="project" :projectParticipants="projectParticipants" />

      <div id="project-canvas">
        <tasks-by-project-header
          :project="project"
          :params="params"
          @searchTasks="handleTasksFilter"
        />

        <div class="project-app">
          <div class="project project-board" id="board">
            <task-by-project-filter
              :currentUser="currentUser"
              @filterTasks="handleTasksFilter"
              :params="params"
            />
            <tasks-list
              :project="project"
              :tasks="renderTasks"
              :page="page"
              :lastPage="meta.last_page"
              @pagination="handlePagination"
              v-if="meta"
            />
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
import TasksList from "../../tasks/TasksList";
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
      const lastPage = this.meta.last_page;
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
      meta: state => state.tasks.tasks.meta
    })
  },
  components: {
    TasksByProjectSide,
    TasksByProjectHeader,
    TaskByProjectFilter,
    TasksList,
    Pagination
  }
};
</script>

<style></style>
