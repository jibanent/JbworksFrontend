<template>
  <div id="project-master" class="scroll-y forced-scroll">
    <div class="relative">
      <div id="project-side-canvas">
        <task-side :users="users" :currentUser="currentUser" />
      </div>
      <div id="project-canvas">
        <task-header :currentUser="currentUser" @searchTasks="handleTasksFilter" :params="params" />
        <div id="mytasks">
          <div class="mytasks">
            <task-filter
              :currentUser="currentUser"
              @filterTasks="handleTasksFilter"
              :myProjects="myActiveProjects"
              :params="params"
              :users="users"
              v-if="componentKey"
            />
            <tasks-list
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
import TaskHeader from "./TaskHeader";
import TaskSide from "./TaskSide";
import TasksList from "./TasksList";
import TaskFilter from "./TaskFilter";
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
    this.getTasks();
    if (this.$auth.isAdmin()) {
      this.getUsers();
      this.getProjects();
    } else {
      this.getMyMembers(this.currentUser.id);
      this.getProjectsByManager();
    }
  },
  methods: {
    ...mapState({
      componentKey: state => state.componentKey
    }),
    ...mapActions([
      "getMyTasks",
      "getTasksOfMyDepartment",
      "getMyMembers",
      "getUsers",
      "getProjects",
      "getProjectsByManager"
    ]),
    handlePagination(val) {
      const lastPage = this.meta.last_page;
      if (val === "prev" && this.page > 1) this.page--;
      else if (val === "next" && this.page < lastPage) this.page++;
      else return false;
      this.getTasks();
    },

    handleTasksFilter(query) {
      this.page = 1;
      Object.keys(this.params).forEach(key => {
        this.params[key] = query[key];
      });
      this.getTasks();
    },
    getTasks() {
      const routeName = this.$route.name;
      const data = {
        currentUserId: this.currentUser.id,
        page: this.page,
        params: this.params
      };
      if (routeName === "tasks") this.getMyTasks(data);
      if (routeName === "tasks-department") this.getTasksOfMyDepartment(data);
    }
  },
  computed: {
    ...mapState({
      users: state => state.users.users,
      meta: state => state.tasks.tasks.meta,
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
    TasksList
  }
};
</script>

<style></style>
