<template>
  <div>
    <project-header />

    <div id="project-master" class="simple scroll-y forced-scroll">
      <div class="canvas">
        <div id="collection">
          <project-control />

          <div class="table" id="list-project" v-if="projects">
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
                <project-item v-for="item in projects.data" :key="item.id" :project="item" />
              </tbody>
            </table>
          </div>
          <div class="footer" v-if="projects && projects.meta.last_page > 1">
            <div class="pag center">
              <div id="js-page" class="apppages">
                <div class="icons">
                  <div
                    class="prev"
                    :class="{disabled: page <= 1}"
                    @click="handlePagination('prev')"
                  >
                    <span class="-ap icon-arrow-left2"></span>
                  </div>
                  <div class="label">Page {{ page }}</div>
                  <div
                    class="next url"
                    :class="{disabled: page >= projects.meta.last_page}"
                    @click="handlePagination('next')"
                  >
                    <span class="-ap icon-arrow-right2"></span>
                  </div>
                </div>
              </div>
            </div>
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
// import EditProjectDialog from "./EditProjectDialog";
import EditProjectStatusDialog from "./EditProjectStatusDialog";
import { mapGetters, mapActions, mapState } from "vuex";
export default {
  name: "projects",
  data() {
    return {
      page: this.$route.query.page ? this.$route.query.page : 1
    };
  },
  created() {
    if (this.$route.name === "projects-admin") {
      this.getProjects(this.page);
    } else {
      this.getProjectsByManager(this.page);
    }
    if (this.$auth.isAdmin() || this.$auth.isLeader()) {
      this.getMyDepartments(this.currentUser.id);
      this.getMyMembers(this.currentUser.id);
    }
  },
  watch: {
    $route(to, from) {
      if (to.name !== from.name) this.page = 1;
      if (to.name === "projects-admin") {
        this.getProjects(this.page);
      } else {
        this.getProjectsByManager(this.page);
      }
    }
  },
  methods: {
    ...mapActions([
      "getProjects",
      "getProjectsByManager",
      "getMyDepartments",
      "getMyMembers"
    ]),
    handlePagination(val) {
      if (val === "prev" && this.page > 1) this.page--;
      if (val === "next" && this.page < this.projects.meta.last_page)
        this.page++;

      this.$router
        .replace({
          name: this.$route.name,
          query: { page: this.page }
        })
        .catch(error => {});
    }
  },
  computed: {
    ...mapGetters(["currentUser", "renderProjects"]),
    ...mapState({
      projects: state => state.projects.projects,
    })
  },
  components: {
    ProjectItem,
    ProjectHeader,
    ProjectControl,
  }
};
</script>

<style></style>
