<template>
  <div id="project-master" class="forced-scroll showing-task">
    <div id="project-canvas">
      <task-detail-left-side-header :currentUser="currentUser" />

      <div id="mytasks">
        <div id="js-project-me" class="mytasks">
          <div id="js-mytasks">
            <div class="project">
              <div id="tasklists" class="scroll-y">
                <task-detail-left-side-week
                  v-for="tasks in myTasks"
                  :key="tasks.id"
                  :tasks="tasks"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import TaskDetailLeftSideHeader from "./TaskDetailLeftSideHeader";
import TaskDetailLeftSideWeek from "./TaskDetailLeftSideWeek";
export default {
  name: "task-detail-left-side",
  props: {
    currentUser: { type: Object, default: null },
    myTasks: { type: Array, default: () => [] }
  },
  components: {
    TaskDetailLeftSideHeader,
    TaskDetailLeftSideWeek
  }
};
</script>

<style >
/* #project-master {
    width: 100% !important
  }
  #project-task-canvas {
    display: none !important
  } */
</style>
