<template>
  <div class="sicons">
    <div class="icon star url" :class="{'-star': task.mark_star}" title="Đánh dấu ưu tiên">
      <span class="-ap icon-uniF186" :class="{'icon-star-full': task.mark_star}"></span>
    </div>
  </div>
</template>

<script>
export default {
  name: "task-item-star",
  props: {
    task: { type: Object, default: null }
  },
  computed: {

  }
};
</script>

<style>
</style>
