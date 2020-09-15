<template>
  <div>
    <project-header />

    <div id="project-master" class="simple scroll-y forced-scroll">
      <div class="canvas">
        <div id="collection">
          <project-control
            @filterProject="handleFilterProjects"
            :params="params"
            :view="view"
          />

          <list-view :projects="projects" v-if="view === 'list'" />
          <grid-view :projects="projects" v-if="view === 'grid'" />

          <div class="footer" v-if="projects && projects.meta.last_page > 1">
            <pagination
              :page="page"
              :lastPage="projects.meta.last_page"
              @pagination="handlePagination"
            />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import ProjectHeader from "./ProjectHeader";
import ProjectControl from "./ProjectControl";
import EditProjectStatusDialog from "./EditProjectStatusDialog";
import Pagination from "../../components/Pagination";
import GridView from "./grid-view";
import ListView from "./list-view";
import { mapGetters, mapActions, mapState } from "vuex";
export default {
  name: "projects",
  data() {
    return {
      page: 1,
      params: {
        search: null,
        active: 1,
        open_status: null,
        close_status: null,
      },
    };
  },
  created() {
    this.handleGetProjects();

    if (this.$auth.isAdmin()) {
      this.getDepartments();
      this.getUsers();
    } else {
      this.getMyDepartments(this.currentUser.id);
      this.getMyMembers();
    }
  },
  watch: {
    $route(to, from) {
      if (to.name !== from.name) this.page = 1;
      this.handleGetProjects();
    },
  },
  methods: {
    ...mapActions([
      "getProjects",
      "getProjectsByManager",
      "getMyDepartments",
      "getMyMembers",
      "getUsers",
      "getDepartments",
    ]),
    handlePagination(val) {
      const lastPage = this.projects.meta.last_page;
      if (val === "prev" && this.page > 1) this.page--;
      else if (val === "next" && this.page < lastPage) this.page++;
      else return false;

      this.handleGetProjects();
    },
    handleGetProjects() {
      const { page, params } = this;
      const data = { page, ...params };
      if (this.$route.name === "projects-admin") this.getProjects(data);
      if (this.$route.name === "projects") this.getProjectsByManager(data);
    },
    handleFilterProjects(query) {
      this.page = 1;
      Object.keys(this.params).forEach((key) => {
        this.params[key] = query[key];
      });
      this.handleGetProjects();
    },
  },
  computed: {
    ...mapGetters(["currentUser", "renderProjects"]),
    ...mapState({
      projects: (state) => state.projects.projects,
      view: state => state.projects.view
    }),
  },
  components: {
    ProjectHeader,
    ProjectControl,
    Pagination,
    GridView,
    ListView,
  },
};
</script>

<style></style>
