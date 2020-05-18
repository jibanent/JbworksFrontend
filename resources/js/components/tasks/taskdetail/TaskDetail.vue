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
                  <task-detail-header />
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

    <task-detail-left-side :currentUser="currentUser" :myTasks="renderTasks" />
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
      strSearch: ""
    };
  },
  created() {
    this.getTasks({
      currentUserId: this.currentUser.id,
      routeName: "tasks-department"
    });

    const taskId = this.$route.params.id;
    this.getTaskDetail({ taskId });
    this.getMyMembers(this.currentUser.id);
  },
  methods: {
    ...mapActions(["getTasks", "getTaskDetail", "getMyMembers"]),
    handleSearchMyUser(data) {
      this.strSearch = data;
      console.log("handleSearchMyUser Taskdetail", data);
    }
  },
  computed: {
    ...mapGetters(["currentUser", "renderTasks", "renderTask"]),
    ...mapState({
      showEditTaskDialog: state => state.tasks.showEditTaskDialog,
      task: state => state.tasks.task,
      isSubmitting: state => state.isSubmitting,
      myMembers: state => state.users.myMembers,
      showMyMembersDialog: state => state.tasks.showMyMembersDialog
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
