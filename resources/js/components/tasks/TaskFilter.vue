<template>
  <div id="js-myform">
    <div id="subheader">
      <div class="task-user-add -compact">
        <div class="avatar" v-if="$auth.can('create new task')"></div>
        <div class="txt">
          <span
            class="action"
            v-on:click="openDialogSelectProject"
            v-if="$auth.can('create new task')"
            >Tạo công việc mới</span
          >
        </div>
      </div>
      <div class="side">
        <div class="dd -cmenuw" data-param="status">
          <em>{{ textStatus }}</em>
          <div class="-cmenu -padding -no-icon">
            <div
              class="-item url js-review-mark"
              :class="{ active: !params.status }"
              @click="handleFilterByStatus()"
            >
              Tất cả trạng thái
            </div>
            <div
              class="-item url"
              :class="{ active: key === params.status }"
              @click="handleFilterByStatus(key)"
              v-for="(item, key) in taskStatus"
              :key="key"
            >
              {{ item }}
            </div>
          </div>
        </div>
        <div class="dd -cmenuw">
          <em>{{ textProject }}</em>
          <div class="-cmenu -padding -no-icon js-projects xo">
            <div class="-item-filter">
              <input type="text" placeholder="Lọc nhanh" />
            </div>
            <div class="js-all-projects-filter scroll-y">
              <div
                class="-item url"
                :class="{ active: !params.project }"
                @click="handleFilterByProject()"
              >
                Tất cả dự án
              </div>
              <div
                class="-item ap-xdot url"
                :class="{ active: params.project === project.id }"
                v-for="project in myProjects"
                :key="project.id"
                @click="handleFilterByProject(project.id)"
              >
                {{ project.name }}
              </div>
            </div>
          </div>
        </div>
        <div class="dd -cmenuw">
          <em>{{ textOrder }}</em>
          <div class="-cmenu -padding -no-icon">
            <div
              class="-item url"
              :class="{
                active: key !== 'updated' ? params.order === key : !params.order
              }"
              @click="handleFilterByOrder(key !== 'updated' ? key : null)"
              v-for="(item, key) in tasksOrder"
              :key="key"
            >
              {{ item }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions } from "vuex";
import { taskStatus, tasksOrder } from "../../config/status";
export default {
  name: "task-filter",
  props: {
    currentUser: { type: Object, default: null },
    myProjects: { type: Array, default: [] },
    params: { type: Object, default: null }
  },
  data() {
    return {
      taskStatus,
      tasksOrder
    };
  },
  computed: {
    textStatus() {
      return taskStatus[this.params.status] || "Tất cả trạng thái";
    },
    textProject() {
      const project = this.myProjects.filter(
        project => project.id === this.params.project
      );
      if (project[0]) return project[0].name;
      return "Tất cả dự án";
    },
    textOrder() {
      return tasksOrder[this.params.order] || "Thời gian cập nhật";
    }
  },
  methods: {
    openDialogSelectProject() {
      this.$store.commit("TOGGLE_DIALOG_SELECT_PROJECT");
    },
    handleFilterByStatus(status = null) {
      const { search, project, order } = this.params;
      this.$emit("handleTasksFilterEvent", { status, search, project, order });
    },
    handleFilterByProject(project = null) {
      const { search, status, order } = this.params;
      this.$emit("handleTasksFilterEvent", { project, search, status, order });
    },
    handleFilterByOrder(order = null) {
      const { search, status, project } = this.params;
      this.$emit("handleTasksFilterEvent", { order, search, status, project });
    }
  }
};
</script>

<style></style>
