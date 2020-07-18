<template>
  <div>
    <department-header @search="handleSearch" />
    <div id="project-master" class="simple scroll-y forced-scroll">
      <div class="canvas">
        <el-tree
          :data="departments.data"
          :props="defaultProps"
          @node-click="handleNodeClick"
          default-expand-all
        >
          <span class="custom-tree-node" slot-scope="{ node, data }">
            <span>{{ node.label }}</span>
            <span>
              <span
                style="margin-right: 10px"
              >{{ $t('departments.created by someone at sometime', {name: node.data.created_by.name , date: formatCreatedAt(node.data.created_at) }) }}</span>
              <el-button type="danger" icon="el-icon-delete" circle></el-button>
            </span>
          </span>
        </el-tree>
      </div>
    </div>

    <add-department-dialog
      :users="users"
      :currentUser="currentUser"
      :showAddDepartmentDialog="showAddDepartmentDialog"
      :isSubmitting="isSubmitting"
      :departments="departments"
    />
  </div>
</template>

<script>
import { mapGetters, mapActions, mapState } from "vuex";
import DepartmentHeader from "./DepartmentHeader";
import AddDepartmentDialog from "./AddDepartmentDialog";
import moment from "moment";
import i18n from "../../lang";
export default {
  data() {
    return {
      defaultProps: {
        children: "children",
        label: "name"
      },
      params: {
        search: null
      }
    };
  },
  created() {
    this.handleGetDepartments();
    this.getUsers();
  },
  computed: {
    ...mapState({
      users: state => state.users.users,
      departments: state => state.departments.departments,
      currentUser: state => state.auth.currentUser,
      showAddDepartmentDialog: state =>
        state.departments.showAddDepartmentDialog,
      isSubmitting: state => state.isSubmitting
    })
  },
  methods: {
    ...mapActions(["getDepartments", "getMyDepartments", "getUsers"]),
    handleNodeClick(data) {
      console.log("handleNodeClick", data);
    },
    handleSearch(query) {
      Object.keys(query).forEach(key => {
        this.params[key] = query[key];
      });
      this.handleGetDepartments();
    },
    handleGetDepartments() {
      const { params } = this;
      const data = { ...params };
      if (this.$auth.isAdmin()) this.getDepartments(data);
      if (this.$auth.isLeader()) this.getMyDepartments(data);
    },
    formatCreatedAt(createdAt) {
      return moment(createdAt)
        .locale(i18n.locale)
        .format("L");
    }
  },
  components: {
    DepartmentHeader,
    AddDepartmentDialog
  }
};
</script>

<style>
.el-tree-node__content {
  padding: 10px 0;
}
.custom-tree-node {
  flex: 1;
  display: flex;
  align-items: center;
  justify-content: space-between;
  font-size: 14px;
  padding-right: 20px;
}
</style>
