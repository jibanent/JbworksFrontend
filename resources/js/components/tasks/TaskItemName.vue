<template>
  <div class="name">
    <div class="ap-xdot">
      <div class="mn">
        <router-link
          tag="span"
          :to="{
                name: 'task-detail',
                params: {
                  id: task.id,
                  task: formatTaskName,
                },
              }"
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
    task: { type: Object, default: null }
  },
  computed: {
    formatTaskName() {
      return removeVietnameseFromString(this.task.name);
    },
    title() {
      const { created_by, created_at, id } = this.task;
      return `Tạo bởi ${created_by.name} lúc ${this.formatDate(
        created_at
      )} | Order: ${id}`;
    }
  },
  methods: {
    formatDate(date) {
      if (date) return `(${moment(date).format("DD/MM/YYYY")})`;
    }
  }
};
</script>

<style>
</style>
