<template>
  <div class="assign">
    <div class="avatar">
      <div class="image imagew">
        <img :src="avatar" />
      </div>
    </div>
    <div class="fname ap-xdot" :title="task.assigned_to.name">{{ task.assigned_to.name }}</div>
  </div>
</template>

<script>
import { getAvatar } from "../../helpers";
export default {
  name: "task-item-assign",
  props: {
    task: { type: Object, default: null }
  },
  computed: {
    avatar() {
      return getAvatar(this.task.assigned_to.avatar);
    },
    title() {
      const { created_by, created_at, id } = this.task;
      return `Tạo bởi ${created_by.name} lúc ${this.formatDate(
        created_at
      )} | Order: ${id}`;
    }
  }
};
</script>

<style>
</style>
