<template>
  <div id="app" class="screen-hd">
    <notifications group="notify" position="center" class="notify-center" />
    <sidebar :unreadNotificationsCount="unreadNotificationsCount" v-if="isRenderSidebar" />
    <div id="master">
      <router-view @openModal="openModal"></router-view>
    </div>
    <add-user-dialog
      :showAddUserDialog="showAddUserDialog"
      :departments="departments"
      :roles="roles"
      :isSubmitting="isSubmitting"
    />
    <edit-user-dialog
      :showEditUserDialog="showEditUserDialog"
      :departments="departments"
      :roles="roles"
      :isSubmitting="isSubmitting"
      :user="user"
    />
    <confirm-delete-user :showConfirmDeleteUser="showConfirmDeleteUser" />
    <loading v-bind:class="{ show: isLoading }" />
    <updating v-if="isUpdating" />
    <select-project-dialog :projects="projects" @projectSelected="projectSelected" />
    <select-duration-dialog />
    <task-assignment-dialog :users="users" :task="task" />
    <add-project-dialog
      :showProjectAdd="showProjectAdd"
      :departments="departments"
      :users="users"
      :currentUser="currentUser"
      :isSubmitting="isSubmitting"
    />
    <add-task-dialog
      :showAddTaskDialog="showAddTaskDialog"
      :users="users"
      :project="project"
      :currentUser="currentUser"
      :isSubmitting="isSubmitting"
    />
    <task-action-options-dialog
      :showTaskActionOptionsDialog="showTaskActionOptionsDialog"
      :task="task"
    />
    <edit-task-deadline
      :showEditTaskDeadline="showEditTaskDeadline"
      :coordinatesShowEditTaskDeadline="coordinatesShowEditTaskDeadline"
      :taskEditing="taskEditing"
    />
    <edit-task-start-time
      :showEditTaskStartTime="showEditTaskStartTime"
      :coordinatesShowEditTaskStartTime="coordinatesShowEditTaskStartTime"
      :taskEditing="taskEditing"
    />
    <confirm-delete-task
      :showConfirmDeleteTask="showConfirmDeleteTask"
      :taskSelected="taskEditing"
      :isSubmitting="isSubmitting"
    />
    <notification
      :notifications="renderMyNotifications"
      :showNotifications="showNotifications"
      :isLoadMoreNotification="isLoadMoreNotification"
    />
    <project-member-actions
      :showProjectMemberActions="showProjectMemberActions"
      :projectMemberSelected="projectMemberSelected"
      :coordinatesShowProjectMemberActions="coordinatesShowProjectMemberActions"
      :project="project"
    />
    <add-members-to-project-dialog
      :users="users"
      :showAddMembersToProjectDialog="showAddMembersToProjectDialog"
      :projectMemberSelected="projectMemberSelected"
      :isSubmitting="isSubmitting"
    />
    <edit-project-manager-dialog
      :users="users"
      :isSubmitting="isSubmitting"
      :showEditProjectManagerDialog="showEditProjectManagerDialog"
      :projectMemberSelected="projectMemberSelected"
    />

    <edit-project-dialog
      :departments="departments"
      :users="users"
      :showEditProjectDialog="showEditProjectDialog"
      :projectEditing="projectEditing"
      :isSubmitting="isSubmitting"
    />

    <edit-project-status-dialog
      :showEditProjectStatusDialog="showEditProjectStatusDialog"
      :projectEditing="projectEditing"
      :isSubmitting="isSubmitting"
    />

    <close-project-dialog
      :showCloseProjectDialog="showCloseProjectDialog"
      :projectEditing="projectEditing"
    />
    <confirm-delete-project
      :showConfirmDeleteProject="showConfirmDeleteProject"
      :projectSelected="projectEditing"
    />
    <edit-my-profile-dialog
      :currentUser="currentUser"
      :showEditMyProfileDialog="showEditMyProfileDialog"
      :isSubmitting="isSubmitting"
    />
    <change-password-dialog :showChangePassword="showChangePassword" :isSubmitting="isSubmitting" />
    <select-language :showSelectLanguage="showSelectLanguage" />
    <confirm-delete-department :showConfirmDeleteDepartment="showConfirmDeleteDepartment"/>
    <import-user-dialog />
  </div>
</template>

<script>
import Sidebar from "../layout/components/Sidebar";
import AddUserDialog from "../views/users/AddUserDialog";
import EditUserDialog from '../views/users/EditUserDialog'
import SelectProjectDialog from "../views/tasks/SelectProjectDialog";
import SelectDurationDialog from "../views/reports/SelectDurationDialog";
import TaskAssignmentDialog from "../views/tasks/taskdetail/TaskAssignmentDialog ";
import AddTaskDialog from "../views/tasks/AddTaskDialog";
import Loading from "./Loading";
import Updating from "./Updating";
import AddProjectDialog from "../views/projects/AddProjectDialog";
import TaskActionOptionsDialog from "../views/tasks/taskdetail/TaskActionOptionsDialog";
import EditTaskDialog from "../views/tasks/taskdetail/EditTaskDialog";
import EditTaskDeadline from "../views/tasks/EditTaskDeadline";
import EditTaskStartTime from "../views/tasks/EditTaskStartTime";
import ConfirmDeleteTask from "../views/tasks/ConfirmDeleteTask";
import Notification from "../views/notifications/Notification";
import ProjectMemberActions from "../views/projects/tasks/ProjectMemberActions";
import AddMembersToProjectDialog from "../views/projects/tasks/AddMembersToProjectDialog";
import EditProjectManagerDialog from "../views/projects/tasks/EditProjectManagerDialog";
import EditProjectDialog from "../views/projects/EditProjectDialog";
import EditProjectStatusDialog from "../views/projects/EditProjectStatusDialog";
import CloseProjectDialog from "../views/projects/CloseProjectDialog";
import ConfirmDeleteProject from "../views/projects/ConfirmDeleteProject";
import EditMyProfileDialog from "../views/account/EditMyProfileDialog";
import ChangePasswordDialog from "../views/account/ChangePasswordDialog";
import ConfirmDeleteUser from '../views/users/ConfirmDeleteUser'
import ConfirmDeleteDepartment from '../views/departments/ConfirmDeleteDepartment'
import SelectLanguage from "./SelectLanguage";
import ImportUserDialog from '../views/users/ImportUserDialog'
import { mapState, mapActions, mapGetters } from "vuex";
import VueCookie from "vue-cookie";
export default {
  name: "app",
  components: {
    AddUserDialog,
    EditUserDialog,
    SelectProjectDialog,
    SelectDurationDialog,
    TaskAssignmentDialog,
    Sidebar,
    Loading,
    Updating,
    AddProjectDialog,
    AddTaskDialog,
    TaskActionOptionsDialog,
    EditTaskDialog,
    EditTaskDeadline,
    EditTaskStartTime,
    ConfirmDeleteTask,
    Notification,
    ProjectMemberActions,
    AddMembersToProjectDialog,
    EditProjectManagerDialog,
    EditProjectDialog,
    EditProjectStatusDialog,
    CloseProjectDialog,
    ConfirmDeleteProject,
    EditMyProfileDialog,
    ChangePasswordDialog,
    SelectLanguage,
    ConfirmDeleteUser,
    ConfirmDeleteDepartment,
    ImportUserDialog
  },
  data() {
    return {
      project: null
    };
  },
  created() {
    this.getMyNotifications();
  },
  computed: {
    ...mapState({
      isLoading: state => state.isLoading,
      isUpdating: state => state.isUpdating,
      usersBelongToProject: state => state.users.usersBelongToProject,
      task: state => state.tasks.task,
      showProjectAdd: state => state.projects.showProjectAdd,
      departments: state => state.departments.departments,
      users: state => state.users.users,
      user: state => state.users.user,
      currentUser: state => state.auth.currentUser,
      showAddTaskDialog: state => state.tasks.showAddTaskDialog,
      showAddUserDialog: state => state.users.showAddUserDialog,
      showEditUserDialog: state => state.users.showEditUserDialog,
      showConfirmDeleteUser: state => state.users.showConfirmDeleteUser,
      roles: state => state.roles.roles,
      isSubmitting: state => state.isSubmitting,
      showTaskActionOptionsDialog: state =>
        state.tasks.showTaskActionOptionsDialog,
      showEditTaskDeadline: state => state.tasks.showEditTaskDeadline,
      coordinatesShowEditTaskDeadline: state =>
        state.tasks.coordinatesShowEditTaskDeadline,
      showEditTaskStartTime: state => state.tasks.showEditTaskStartTime,
      coordinatesShowEditTaskStartTime: state =>
        state.tasks.coordinatesShowEditTaskStartTime,
      taskEditing: state => state.tasks.taskEditing,
      showConfirmDeleteTask: state => state.tasks.showConfirmDeleteTask,
      showNotifications: state => state.notifications.showNotifications,
      isLoadMoreNotification: state =>
        state.notifications.isLoadMoreNotification,
      showProjectMemberActions: state =>
        state.projects.showProjectMemberActions,
      projectMemberSelected: state => state.projects.projectMemberSelected,
      coordinatesShowProjectMemberActions: state =>
        state.projects.coordinatesShowProjectMemberActions,
      showAddMembersToProjectDialog: state =>
        state.projects.showAddMembersToProjectDialog,
      showEditProjectManagerDialog: state =>
        state.projects.showEditProjectManagerDialog,
      showEditProjectDialog: state => state.projects.showEditProjectDialog,
      projectEditing: state => state.projects.projectEditing,
      showEditProjectStatusDialog: state =>
        state.projects.showEditProjectStatusDialog,
      showCloseProjectDialog: state => state.projects.showCloseProjectDialog,
      showConfirmDeleteProject: state =>
        state.projects.showConfirmDeleteProject,
      showEditMyProfileDialog: state => state.account.showEditMyProfileDialog,
      showChangePassword: state => state.account.showChangePassword,
      showSelectLanguage: state => state.showSelectLanguage,
      projects: state => state.projects.projects,
      showConfirmDeleteDepartment: state => state.departments.showConfirmDeleteDepartment,
    }),
    ...mapGetters(["renderMyNotifications", "unreadNotificationsCount"]),
    isRenderSidebar() {
      const arrRoutes = ["login", "not-found", "unauthorized"];
      if (arrRoutes.indexOf(this.$route.name) !== -1) return false;
      return true;
    }
  },
  methods: {
    ...mapActions(["getMyNotifications"]),
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

<style lang="scss">
.-avatar img {
  object-fit: cover;
  object-position: center;
}
.notify-center .notification-content {
  padding: 10px 5px;
  font-size: 12px;
}
.validate-error {
  margin-top: 5px;
  color: red;
}
#apdialogs {
  display: block;
  .__dialogwrapper {
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }
}
</style>
