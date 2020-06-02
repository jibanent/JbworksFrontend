<template>
  <div>
    <project-header />

    <div id="project-master" class="simple scroll-y forced-scroll">
      <div class="canvas">
        <div id="collection">
          <project-control />

          <div class="table" id="list-project">
            <table>
              <thead>
                <tr class="theader">
                  <th style="width:30px; min-width:30px;">&nbsp;</th>
                  <th>
                    <div class="lead" style="margin-left:-20px">Dự án</div>
                  </th>
                  <th style="width:130px">Department</th>
                  <th style="width:120px">Thành viên</th>
                  <th style="width:150px">Thống kê</th>
                  <th style="width:80px">Trạng thái</th>
                  <th style="width:120px">&nbsp;</th>
                  <th style="width:80px; min-width:80px">&nbsp;</th>
                </tr>
              </thead>
              <tbody class="ui-sortable">
                <project-item v-for="item in renderProjects" :key="item.id" :project="item" />
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <edit-project-dialog
      :departments="departments"
      :users="myMembers"
      :showEditProjectDialog="showEditProjectDialog"
      :projectEditing="projectEditing"
      :isSubmitting="isSubmitting"
    />
    <edit-project-status-dialog
      :showEditProjectStatusDialog="showEditProjectStatusDialog"
      :projectEditing="projectEditing"
    />
  </div>
</template>

<script>
import ProjectHeader from "./ProjectHeader";
import ProjectItem from "./ProjectItem";
import ProjectControl from "./ProjectControl";
import EditProjectDialog from "./EditProjectDialog";
import EditProjectStatusDialog from "./EditProjectStatusDialog";
import { mapGetters, mapActions, mapState } from "vuex";
export default {
  name: "projects",
  created() {
    if (this.$route.name === "projects-admin") {
      this.getProjects();
    } else {
      this.getProjects(this.currentUser.id);
    }
    if (this.$auth.isAdmin() || this.$auth.isLeader()) {
      this.getMyDepartments(this.currentUser.id);
      this.getMyMembers(this.currentUser.id);
    }
  },
  watch: {
    $route(to, from) {
      if (to.name === "projects") {
        this.getProjects(this.currentUser.id);
      } else {
        this.getProjects(to.params.currentUserId);
      }
    }
  },
  methods: {
    ...mapActions(["getProjects", "getMyDepartments", "getMyMembers"])
  },
  computed: {
    ...mapGetters(["currentUser", "renderProjects"]),
    ...mapState({
      departments: state => state.departments.departments,
      myMembers: state => state.users.myMembers,
      showEditProjectDialog: state => state.projects.showEditProjectDialog,
      projectEditing: state => state.projects.projectEditing,
      isSubmitting: state => state.isSubmitting,
      showEditProjectStatusDialog: state =>
        state.projects.showEditProjectStatusDialog
    })
  },
  components: {
    ProjectItem,
    ProjectHeader,
    ProjectControl,
    EditProjectDialog,
    EditProjectStatusDialog
  }
};
</script>

<style></style>
