<template>
  <div>
    <div id="project-task-canvas" style="display: block;">
      <div id="project-task-scrollable" class="scroll-y forced-scroll">
        <div id="task-canvas-wrapper">
          <div id="js-project-task">
            <div class="task-display js-task">
              <task-detail-right-side :task="renderTask" />

              <div class="main-body">
                <div class="section js-task-main">
                  <task-detail-header :task="renderTask" />
                  <task-detail-main :task="renderTask" />
                  <task-detail-action :task="renderTask" />
                  <task-detail-description :task="renderTask" />
                </div>

                <task-result :task="renderTask" />

                <task-comment />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <task-detail-left-side
      :currentUser="currentUser"
      :tasks="renderTasks"
      :page="page"
      :meta="meta"
      @pagination="handlePagination"
      @filterTasks="handleTasksFilter"
    />
    <edit-task-dialog
      :showEditTaskDialog="showEditTaskDialog"
      :task="task"
      :isSubmitting="isSubmitting"
      :currentUser="currentUser"
    />
    <my-member-dialog
      :showMyMembersDialog="showMyMembersDialog"
      :myMembers="searchMyMembers"
      :strSearch="strSearch"
      :task="task"
      @handleSearchMyUser="handleSearchMyUser"
    />
  </div>
</template>

<script>
import TaskDetailLeftSide from "./TaskDetailLeftSide";
import TaskDetailRightSide from "./TaskDetailRightSide";
import TaskDetailHeader from "./TaskDetailHeader";
import TaskDetailMain from "./TaskDetailMain";
import TaskDetailAction from "./TaskDetailAction";
import TaskDetailDescription from "./TaskDetailDescription";
import TaskComment from "./TaskComment";
import TaskResult from "./TaskResult";
import EditTaskDialog from "./EditTaskDialog";
import MyMemberDialog from "./MyMemberDialog";
import { mapGetters, mapActions, mapState } from "vuex";
export default {
  name: "task-detail",
  components: {
    TaskDetailLeftSide,
    TaskDetailRightSide,
    TaskComment,
    TaskResult,
    TaskDetailHeader,
    TaskDetailMain,
    TaskDetailAction,
    TaskDetailDescription,
    EditTaskDialog,
    MyMemberDialog
  },
  data() {
    return {
      strSearch: "",
      page: 1,
      params: {
        search: ''
      }
    };
  },
  created() {
    const routeName = this.$route.name;
    this.getTasks();

    const taskId = this.$route.params.id;
    this.getTaskDetail({ taskId }).then(response => {
      if (response.error && response.status === 404) {
        this.$router.push("/tasks");
      }
    });
    if (this.$auth.isAdmin() || this.$auth.isLeader()) {
      this.getMyMembers(this.currentUser.id);
    }
  },
  methods: {
    ...mapActions([
      "getMyTasks",
      "getTasksOfMyDepartment",
      "getTasksByProject",
      "getTaskDetail",
      "getMyMembers"
    ]),
    handleSearchMyUser(data) {
      this.strSearch = data;
    },
    handlePagination(val) {
      const lastPage = this.meta.last_page;
      if (val === "prev" && this.page > 1) this.page--;
      else if (val === "next" && this.page < lastPage) this.page++;
      else return false;
      this.getTasks();
    },
     handleTasksFilter(query) {
      this.page = 1;
      Object.keys(this.params).forEach(key => {
        this.params[key] = query[key];
      });
      this.getTasks();
    },
    getTasks() {
      const data = {
        projectId: this.$route.params.projectId,
        currentUserId: this.currentUser.id,
        page: this.page,
        params: this.params
      };
      const routeName = this.$route.name;
      if (routeName === "task-detail") this.getMyTasks(data);
      if (routeName === "task-detail-department")
        this.getTasksOfMyDepartment(data);
      if (routeName === "task-detail-project")
        this.getTasksByProject(data);
    }
  },
  computed: {
    ...mapGetters(["currentUser", "renderTasks", "renderTask"]),
    ...mapState({
      showEditTaskDialog: state => state.tasks.showEditTaskDialog,
      task: state => state.tasks.task,
      isSubmitting: state => state.isSubmitting,
      myMembers: state => state.users.myMembers,
      showMyMembersDialog: state => state.tasks.showMyMembersDialog,
      meta: state => state.tasks.tasks.meta
    }),
    searchMyMembers() {
      const { strSearch } = this;
      let newItems = [];
      this.myMembers.filter(item => {
        if (
          item.name.toLowerCase().includes(strSearch.toLowerCase()) ||
          item.username.includes(strSearch.toLowerCase())
        ) {
          newItems.push(item);
        }
      });
      return newItems;
    }
  },
  watch: {
    $route(to, from) {
      const taskId = to.params.id;
      this.getTaskDetail({ taskId });
    }
  }
};
</script>

<style>
</style>
