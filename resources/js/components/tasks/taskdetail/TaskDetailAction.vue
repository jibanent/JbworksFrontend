<template>
  <div class="task-cta" v-if="task">
    <div
      class="cta url"
      :class="{'-done': task.status.slug==='done'}"
      :style="`background-color: ${task.status.color}`"
    >
      <div class="box url"></div>
      <div class="label url with-review">
        <div class="lb" style="color: #fff">{{ task.status.name }}</div>
      </div>
    </div>
    <div class="assign url">
      <div class="avatar avatar-32 -circled">
        <div class="image">
          <img :src="avatar" />
        </div>
      </div>
      <div class="name">{{ task.assigned_to.name }}</div>
      <div class="info">{{ task.assigned_to.position }}</div>
    </div>
  </div>
</template>

<script>
import { getAvatar } from "../../../helpers";
export default {
  name: "task-detail-action",
  props: {
    task: { type: Object, default: null }
  },
  computed: {
    avatar() {
      return getAvatar(this.task.assigned_to.avatar);
    }
  }
};
</script>

<style>
</style>
