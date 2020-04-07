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

                <task-result />

                <task-comment />
              </div>  
            </div>
          </div>
        </div>
      </div>
    </div>

    <task-detail-left-side :currentUser="currentUser" :myTasks="renderTasks" />
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
import { mapGetters, mapActions } from "vuex";
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
    TaskDetailDescription
  },
  created() {
    this.getTasks({
      currentUserId: this.currentUser.id,
      routeName: "tasks"
    });

    const taskId = this.$route.params.id;
    this.getTaskDetail({ taskId });
  },
  methods: {
    ...mapActions(["getTasks", "getTaskDetail"])
  },
  computed: {
    ...mapGetters(["currentUser", "renderTasks", "renderTask"])
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
