<template>
  <div id="project-master" class="scroll-y forced-scroll">
    <div class="relative">
      <div id="project-side-canvas">
        <task-side :myMembers="myMembers" :currentUser="currentUser" />
      </div>
      <div id="project-canvas">
        <task-header :currentUser="currentUser" />
        <div id="mytasks">
          <div class="mytasks">
            <task-filter />
            <div class="project">
              <div id="tasklists">
                <task-week v-for="(tasks, index) in renderTasks" :key="index" :tasks="tasks" />
                <div
                  class="center apppages"
                  v-if="tasks && tasks.meta.last_page > 1"
                >
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
                      :class="{disabled: page >= tasks.meta.last_page}"
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
  </div>
</template>

<script>
import TaskHeader from "./TaskHeader";
import TaskSide from "./TaskSide";
import TaskWeek from "./TaskWeek";
import TaskFilter from "./TaskFilter";
import { mapActions, mapGetters, mapState } from "vuex";
export default {
  name: "tasks",
  data() {
    return {
      page: this.$route.query.page ? this.$route.query.page : 1
    };
  },
  created() {
    let routeName = this.$route.name;
    if (routeName === "tasks") {
      this.getTasks({
        currentUserId: this.currentUser.id,
        routeName: "tasks",
        page: this.page
      });
    }

    if (routeName === "tasks-department") {
      this.getTasks({
        currentUserId: this.currentUser.id,
        routeName: "tasks-department",
        page: this.page
      });
    }
    if (this.$auth.isAdmin() || this.$auth.isLeader()) {
      this.getMyMembers(this.currentUser.id);
    }
  },
  methods: {
    ...mapActions(["getTasks", "getMyMembers"]),
    handlePagination(val) {
      if (val === "prev" && this.page > 1) this.page--;
      if (val === "next" && this.page < this.tasks.meta.last_page) this.page++;

      this.$router
        .replace({
          name: this.$route.name,
          query: { page: this.page }
        })
        .catch(error => {});
    }
  },
  computed: {
    ...mapState({
      myMembers: state => state.users.myMembers,
      tasks: state => state.tasks.tasks
    }),
    ...mapGetters(["renderTasks", "currentUser"])
  },
  watch: {
    $route(to, from) {
      if (to.name !== from.name) this.page = 1;
      if (to.name === "tasks-department") {
        this.getTasks({
          currentUserId: this.currentUser.id,
          routeName: "tasks-department",
          page: this.page
        });
      }
      if (to.name === "tasks") {
        this.getTasks({
          currentUserId: this.currentUser.id,
          routeName: "tasks",
          page: this.page
        });
      }
    }
  },
  components: {
    TaskHeader,
    TaskSide,
    TaskWeek,
    TaskFilter
  }
};
</script>

<style>
</style>
