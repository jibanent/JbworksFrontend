<template>
  <div>
    <tasks-by-project-header :project="project" />

    <div id="project-master" class="simple scroll-y forced-scroll">
      <div class="canvas relative">
        <settings-menu :project="project" />

        <router-view />
      </div>
    </div>
    <edit-project-duration-dialog
      :project="project"
      v-if="showProjectDurationDialog"
      :isSubmitting="isSubmitting"
    />
  </div>
</template>

<script>
import { mapActions, mapState } from "vuex";
import TasksByProjectHeader from "../tasks/TasksByProjectHeader";
import SettingsMenu from "./SettingsMenu";
import EditProjectDurationDialog from "./EditProjectDurationDialog";
export default {
  name: "project-settings",
  created() {
    const projectId = this.$route.params.id;
    this.getProjectById(projectId);
    this.getMyDepartments(this.currentUser.id);
  },
  methods: {
    ...mapActions(["getProjectById", "getMyDepartments"])
  },
  computed: {
    ...mapState({
      project: state => state.projects.project,
      currentUser: state => state.auth.currentUser,
      departments: state => state.departments.departments,
      showProjectDurationDialog: state =>
        state.projects.showProjectDurationDialog,
      isSubmitting: state => state.isSubmitting
    })
  },
  components: {
    TasksByProjectHeader,
    SettingsMenu,
    EditProjectDurationDialog
  }
};
</script>

<style>
</style>
