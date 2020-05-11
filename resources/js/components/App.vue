<template>
  <div id="app" class="screen-hd">
    <notifications group="notify" />
    <notifications group="center" position="center" classes="notify-center" />
    <sidebar v-if="isRenderSidebar" />
    <div id="master">
      <router-view @openModal="openModal"></router-view>
    </div>
    <user-form-modal v-if="showModal" @closeModal="closeModal" />
    <loading v-bind:class="{ show: isLoading }" />
    <updating v-if="isUpdating" />
    <dialog-select-project />
    <select-duration-dialog />
    <task-assignment-dialog :usersBelongToProject="usersBelongToProject" :task="task" />
    <project-add :showProjectAdd="showProjectAdd" :departments="departments" :users="users" :currentUser="currentUser" />
  </div>
</template>

<script>
import Sidebar from "./common/Sidebar";
import UserFormModal from "./users/UserFormModal";
import DialogSelectProject from "./tasks/DialogSelectProject";
import SelectDurationDialog from "./reports/SelectDurationDialog";
import TaskAssignmentDialog from "./tasks/taskdetail/TaskAssignmentDialog ";
import Loading from "./common/Loading";
import Updating from "./common/Updating";
import ProjectAdd from "./projects/ProjectAdd";
import { mapState } from "vuex";
export default {
  name: "app",
  components: {
    UserFormModal,
    DialogSelectProject,
    SelectDurationDialog,
    TaskAssignmentDialog,
    Sidebar,
    Loading,
    Updating,
    ProjectAdd
  },
  data() {
    return {
      showModal: false
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
      currentUser: state => state.auth.currentUser
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
