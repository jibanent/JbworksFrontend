<template>
  <div id="project-master" class="scroll-y forced-scroll">
    <div class="relative">
      <div id="project-side-canvas">
        <task-side />
      </div>
      <div id="project-canvas">
        <task-header :currentUser="currentUser" />

        <div id="mytasks">
          <div id="js-project-me" class="mytasks">
            <div id="js-myform"></div>
            <div id="js-mytasks">
              <div class="project">
                <div id="tasklists">
                  <task-week v-for="(tasks, index) in renderTasks" :key="index" :tasks="tasks" />
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
import TaskHeader from "./TaskHeader";
import TaskSide from "./TaskSide";
import TaskWeek from "./TaskWeek";
import { mapActions, mapGetters } from "vuex";
export default {
  name: "tasks",
  created() {
    let routeName = this.$route.name;
    if (routeName === "tasks") {
      this.getTasks({
        currentUserId: this.currentUser.id,
        routeName: "tasks"
      });
    }

    if(routeName === 'tasks-department') {
      this.getTasks({
        currentUserId: this.currentUser.id,
        routeName: "tasks-department"
      });
    }
  },
  methods: {
    ...mapActions(["getTasks"])
  },
  computed: {
    ...mapGetters(["renderTasks", "currentUser"])
  },
  watch: {
    $route(to, from) {
      if (to.name === "tasks-department") {
        this.getTasks({
          currentUserId: this.currentUser.id,
          routeName: "tasks-department"
        });
      }
      if (to.name === "tasks") {
        this.getTasks({
          currentUserId: this.currentUser.id,
          routeName: "tasks"
        });
      }
    }
  },
  components: {
    TaskHeader,
    TaskSide,
    TaskWeek
  }
};
</script>

<style>
</style>
