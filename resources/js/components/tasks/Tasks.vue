<template>
  <div id="project-master" class="scroll-y forced-scroll">
    <div class="relative">
      <div id="project-side-canvas">
        <task-side :myMembers="myMembers" :currentUser="currentUser" />
      </div>
      <div id="project-canvas">
        <task-header
          :currentUser="currentUser"
          @searchTasks="handleTasksFilter"
          :params="params"
        />
        <div id="mytasks">
          <div class="mytasks">
            <task-filter
              :currentUser="currentUser"
              @filterTasks="handleTasksFilter"
              :myProjects="myActiveProjects"
              :params="params"
              :myMembers="myMembers"
            />
            <div class="project">
              <div id="tasklists">
                <tasks-list :renderTasks="renderTasks" />
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
      </div>
    </div>
  </div>
</template>

<script>
import TaskHeader from "./TaskHeader";
import TaskSide from "./TaskSide";
import TasksList from "./TasksList";
import TaskFilter from "./TaskFilter";
import Pagination from "../Pagination";
import { mapActions, mapGetters, mapState } from "vuex";
export default {
  name: "tasks",
  data() {
    return {
      page: 1,
      params: {
        search: null,
        status: null,
        project: null,
        order: null,
        user: null
      }
    };
  },
  created() {
    const routeName =
      this.$route.name === "tasks" ? "tasks" : "tasks-department";

    const { page, params } = this;

    this.getTasks({
      currentUserId: this.currentUser.id,
      routeName,
      page,
      params
    });

    if (this.$auth.isAdmin() || this.$auth.isLeader()) {
      this.getMyMembers(this.currentUser.id);
    }
  },
  methods: {
    ...mapActions(["getTasks", "getMyMembers"]),
    handlePagination(val) {
      const lastPage = this.tasks.meta.last_page;
      const routeName =
        this.$route.name === "tasks" ? "tasks" : "tasks-department";
      if (val === "prev" && this.page > 1) this.page--;
      else if (val === "next" && this.page < lastPage) this.page++;
      else return false;

      const { params, page } = this;
      this.getTasks({
        currentUserId: this.currentUser.id,
        routeName,
        page,
        params
      });
    },

    handleTasksFilter(query) {
      console.log('query', query);

      this.page = 1;
      Object.keys(this.params).forEach(key => {
        this.params[key] = query[key];
      });
      const routeName =
        this.$route.name === "tasks" ? "tasks" : "tasks-department";
      const { page, params } = this;

      this.getTasks({
        currentUserId: this.currentUser.id,
        routeName,
        page,
        params
      });
    }
  },
  computed: {
    ...mapState({
      myMembers: state => state.users.myMembers,
      tasks: state => state.tasks.tasks,
      myActiveProjects: state => state.tasks.myActiveProjects
    }),
    ...mapGetters(["renderTasks", "currentUser"])
  },
  watch: {
    $route(to, from) {
      if (to.name !== from.name) this.page = 1;
      const routeName = to.name === "tasks" ? "tasks" : "tasks-department";
      const { page, params } = this;
      const currentUserId = this.currentUser.id;
      this.getTasks({ currentUserId, routeName, page, params });
    }
  },
  components: {
    TaskHeader,
    TaskSide,
    TaskFilter,
    TasksList,
    Pagination
  }
};
</script>

<style></style>
