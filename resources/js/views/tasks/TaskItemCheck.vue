<template>
  <div class="check">
    <div class="task-status" :class="{'-done': task.status.slug == 'done'}"></div>
  </div>
</template>

<script>
export default {
  name: "task-item-check",
  props: {
    task: { type: Object, default: null }
  }
};
</script>

<style>
</style>
