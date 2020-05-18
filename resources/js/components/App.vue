<template>
  <div id="app" class="screen-hd">
    <notifications group="notify" />
    <notifications group="center" position="center" classes="notify-center" />
    <sidebar v-if="isRenderSidebar" />
    <div id="master">
      <router-view @openModal="openModal"></router-view>
    </div>
    <add-user-dialog
      :showAddUserDialog="showAddUserDialog"
      :departments="departments"
      :roles="roles"
      :isSubmitting="isSubmitting"
    />
    <loading v-bind:class="{ show: isLoading }" />
    <updating v-if="isUpdating" />
    <select-project-dialog @projectSelected="projectSelected" />
    <select-duration-dialog />
    <task-assignment-dialog :usersBelongToProject="usersBelongToProject" :task="task" />
    <add-project-dialog
      :showProjectAdd="showProjectAdd"
      :departments="departments"
      :users="users"
      :currentUser="currentUser"
      :isSubmitting="isSubmitting"
    />
    <add-task-dialog
      :showAddTaskDialog="showAddTaskDialog"
      :myMembers="myMembers"
      :project="project"
      :currentUser="currentUser"
    />
    <task-action-options-dialog :showTaskActionOptionsDialog="showTaskActionOptionsDialog" />
    <!-- <edit-task-dialog :showEditTaskDialog="showEditTaskDialog" :task="task" /> -->
  </div>
</template>

<script>
import Sidebar from "./common/Sidebar";
import AddUserDialog from "./users/AddUserDialog";
import SelectProjectDialog from "./tasks/SelectProjectDialog";
import SelectDurationDialog from "./reports/SelectDurationDialog";
import TaskAssignmentDialog from "./tasks/taskdetail/TaskAssignmentDialog ";
import AddTaskDialog from "./tasks/AddTaskDialog";
import Loading from "./common/Loading";
import Updating from "./common/Updating";
import AddProjectDialog from "./projects/AddProjectDialog";
import TaskActionOptionsDialog from './tasks/taskdetail/TaskActionOptionsDialog'
import EditTaskDialog from './tasks/taskdetail/EditTaskDialog'
import { mapState } from "vuex";
export default {
  name: "app",
  components: {
    AddUserDialog,
    SelectProjectDialog,
    SelectDurationDialog,
    TaskAssignmentDialog,
    Sidebar,
    Loading,
    Updating,
    AddProjectDialog,
    AddTaskDialog,
    TaskActionOptionsDialog,
    EditTaskDialog
  },
  data() {
    return {
      project: null
    };
  },
  computed: {
    // ...mapState(["isLoading", "currentUser", "usersBelongToProject"]),
    ...mapState({
      isLoading: state => state.isLoading,
      isUpdating: state => state.isUpdating,
      usersBelongToProject: state => state.users.usersBelongToProject,
      task: state => state.tasks.task,
      showProjectAdd: state => state.projects.showProjectAdd,
      departments: state => state.departments.departments,
      users: state => state.users.users,
      currentUser: state => state.auth.currentUser,
      showAddTaskDialog: state => state.tasks.showAddTaskDialog,
      myMembers: state => state.users.myMembers,
      showAddUserDialog: state => state.users.showAddUserDialog,
      roles: state => state.roles.roles,
      isSubmitting: state => state.isSubmitting,
      showTaskActionOptionsDialog: state => state.tasks.showTaskActionOptionsDialog,
    }),
    isRenderSidebar() {
      const arrRoutes = ["login", "not-found"];
      if (arrRoutes.indexOf(this.$route.name) !== -1) return false;
      return true;
    }
  },
  methods: {
    openModal() {
      this.showModal = true;
    },
    closeModal() {
      this.showModal = false;
    },
    projectSelected(project) {
      this.project = project;
    }
  }
};
</script>

<style>
.-avatar img {
  object-fit: cover;
  object-position: center;
}
.notify-center .notification-content {
  padding: 10px 5px;
  margin: 0 5px 5px;
  font-size: 12px;
  color: #ffffff;
  background: #68cd86;
  text-align: center;
}
.validate-error {
  margin-top: 5px;
  color: red;
}
</style>
