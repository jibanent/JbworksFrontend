<template>
  <div class="name">
    <div class="ap-xdot">
      <div class="mn">
        <router-link
          tag="span"
          :to="to"
          class="url"
          :title="title"
        >{{ task.name }} {{ formatDate(task.start_date) }}</router-link>
      </div>
    </div>
  </div>
</template>

<script>
import moment from "moment";
import { removeVietnameseFromString } from "../../helpers";
export default {
  name: "task-item-name",
  props: {
    task: { type: Object, default: null },
    project: { type: Object, default: null }
  },
  computed: {
    title() {
      const { created_by, created_at, id } = this.task;
      return `Tạo bởi ${created_by.name} lúc ${this.formatDate(
        created_at
      )} | Order: ${id}`;
    },
    to() {
      const routeName = this.$route.name;
      let name;
      if (routeName === "tasks") name = "task-detail";
      if (routeName === "tasks-department") name = "task-detail-department";
      if (routeName === "tasks-by-project") name = "task-detail-project";
      return {
        name: name,
        params: {
          project: this.project ? this.formatName(this.project.name) : "",
          projectId: this.project ? this.project.id : null,
          id: this.task.id,
          task: this.formatName(this.task.name)
        }
      };
    }
  },
  methods: {
    formatName(name) {
      return removeVietnameseFromString(name);
    },
    formatDate(date) {
      if (date) return `(${moment(date).format("DD/MM/YYYY")})`;
    }
  }
};
</script>

<style>
</style>
