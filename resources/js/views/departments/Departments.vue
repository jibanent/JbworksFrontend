<template>
  <div>
    <department-header @search="handleSearch" />

    <div id="project-master" class="simple scroll-y forced-scroll">
      <div class="canvas">
        <div id="collection" class="compact">
          <div class="projects" id="js-depts" style="min-height:1300px; display:block; border:none">
            <department-item
              v-for="(item, index) in renderDepartments"
              v-bind:key="index"
              v-bind:department="item"
            />
          </div>
        </div>
      </div>
    </div>
    <add-department-dialog
      :users="users"
      :currentUser="currentUser"
      :showAddDepartmentDialog="showAddDepartmentDialog"
      :isSubmitting="isSubmitting"
    />
  </div>
</template>

<script>
import { mapGetters, mapActions, mapState } from "vuex";
import DepartmentItem from "./DepartmentItem";
import AddDepartmentDialog from "./AddDepartmentDialog";
import DepartmentHeader from "./DepartmentHeader";
export default {
  name: "departments",
  data() {
    return {
      params: {
        search: null
      }
    };
  },
  created() {
    this.handleGetDepartments();
    this.getUsers();
  },
  methods: {
    ...mapActions(["getDepartments", "getUsers"]),
    handleSearch(query) {
      Object.keys(query).forEach(key => {
        this.params[key] = query[key];
      });
      this.handleGetDepartments()
    },
    handleGetDepartments() {
      const { params } = this;
      const data = { ...params };
      this.getDepartments(data);
    }
  },
  computed: {
    ...mapGetters(["renderDepartments"]),
    ...mapState({
      users: state => state.users.users,
      currentUser: state => state.auth.currentUser,
      showAddDepartmentDialog: state =>
        state.departments.showAddDepartmentDialog,
      isSubmitting: state => state.isSubmitting
    })
  },
  components: {
    DepartmentItem,
    AddDepartmentDialog,
    DepartmentHeader
  }
};
</script>

<style>
</style>
