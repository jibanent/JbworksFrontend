<template>
  <div>
    <project-header />

    <div id="project-master" class="simple scroll-y forced-scroll">
      <div class="canvas">
        <div id="collection">
          <project-control @filterProject="handleFilterProjects" :params="params" />

          <div class="table" id="list-project" v-if="projects">
            <table>
              <thead>
                <tr class="theader">
                  <th style="width:30px; min-width:30px;">&nbsp;</th>
                  <th>
                    <div class="lead" style="margin-left:-20px">{{ $t('projects.projects') }}</div>
                  </th>
                  <th style="width:130px">{{ $t('departments.departments') }}</th>
                  <th style="width:120px">{{ $t('users.member') }}</th>
                  <th style="width:150px">{{ $t('projects.stats') }}</th>
                  <th style="width:80px">{{ $t('projects.status') }}</th>
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
import ProjectItem from "./ProjectItem";
import ProjectControl from "./ProjectControl";
import EditProjectStatusDialog from "./EditProjectStatusDialog";
import Pagination from "../../components/Pagination";
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
        close_status: null
      }
    };
  },
  created() {
    this.handleGetProjects();

    if (this.$auth.isAdmin() || this.$auth.isLeader()) {
      this.getMyDepartments(this.currentUser.id);
      this.getMyMembers();
    }
  },
  watch: {
    $route(to, from) {
      if (to.name !== from.name) this.page = 1;
      this.handleGetProjects();
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
      Object.keys(this.params).forEach(key => {
        this.params[key] = query[key];
      });
      this.handleGetProjects();
    }
  },
  computed: {
    ...mapGetters(["currentUser", "renderProjects"]),
    ...mapState({
      projects: state => state.projects.projects
    })
  },
  components: {
    ProjectItem,
    ProjectHeader,
    ProjectControl,
    Pagination
  }
};
</script>

<style></style>
