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
  </div>
</template>

<script>
import ProjectHeader from "./ProjectHeader";
import ProjectItem from "./ProjectItem";
import ProjectControl from "./ProjectControl";
import { mapGetters, mapActions } from "vuex";
export default {
  name: "projects",
  created() {
    if (this.$route.name === "projects-admin") {
      this.getProjects();
    } else {
      this.getProjects(this.currentUser.id);
    }
    this.getDepartments();
    this.getUsers();
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
    ...mapActions(["getProjects", "getDepartments", "getUsers"])
  },
  computed: {
    ...mapGetters(["currentUser", "renderProjects"]),
  },
  components: {
    ProjectItem,
    ProjectHeader,
    ProjectControl
  }
};
</script>

<style></style>
