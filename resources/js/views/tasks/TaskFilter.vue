<template>
  <div id="js-myform">
    <div id="subheader">
      <div class="task-user-add -compact" v-if="$route.name !== 'tasks-department'">
        <div class="avatar" v-if="$auth.can('create new task')"></div>
        <div class="txt">
          <span
            class="action"
            v-on:click="openDialogSelectProject"
            v-if="$auth.can('create new task')"
          >{{ $t('tasks.create a new task') }}</span>
        </div>
      </div>
      <div class="task-user-add -compact" v-if="$route.name === 'tasks-department'">
        <div class="sicon">
          <span class="ficon-th-large"></span>
        </div>
        <div class="txt">
          <span class="stitle url">{{ $t('tasks.my members') }}</span>
        </div>
      </div>
      <div class="side">
        <users-filter
          :users="users.data"
          :userId="params.user"
          @filterTasksByUser="handleFilterByUser"
          v-if="$route.name === 'tasks-department'"
        />
        <tasks-status-filter :status="params.status" @filterTasksByStatus="handleFilterByStatus" />
        <projects-filter
          :projects="myProjects"
          :projectId="params.project"
          @filterTasksByProject="handleFilterByProject"
          v-if="$route.name === 'tasks'"
        />
        <tasks-sort :order="params.order" @sortTasks="handleSortTasks" />
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions } from "vuex";
import TasksStatusFilter from "../../components/TasksStatusFilter";
import ProjectsFilter from "../../components/ProjectsFilter";
import TasksSort from "../../components/TasksSort";
import UsersFilter from "../../components/UsersFilter";
export default {
  name: "task-filter",
  props: {
    currentUser: { type: Object, default: null },
    myProjects: { type: Array, default: [] },
    params: { type: Object, default: null },
    users: { type: Object, default: {} }
  },
  methods: {
    openDialogSelectProject() {
      this.$store.commit("TOGGLE_DIALOG_SELECT_PROJECT");
    },
    handleFilterByStatus(status = null) {
      const { search, project, order, user } = this.params;
      this.$emit("filterTasks", { status, search, project, order, user });
    },
    handleFilterByProject(project = null) {
      const { search, status, order } = this.params;
      this.$emit("filterTasks", { project, search, status, order });
    },
    handleSortTasks(order = null) {
      const { search, status, project, user } = this.params;
      this.$emit("filterTasks", { order, search, status, project, user });
    },
    handleFilterByUser(user = null) {
      console.log("userid", user);

      const { search, status, order } = this.params;
      this.$emit("filterTasks", { user, search, status, order });
    }
  },
  components: {
    TasksStatusFilter,
    ProjectsFilter,
    TasksSort,
    UsersFilter
  }
};
</script>

<style></style>
