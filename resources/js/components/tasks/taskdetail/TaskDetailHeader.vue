<template>
  <div class="task-header">
    <div class="actions">
      <router-link tag="div" to="/tasks" class="action -close" title="Close task preview">
        <span class="-ap icon-close"></span>
      </router-link>
      <div class="action -star url">
        <span class="ficon-star-o"></span>
      </div>
      <div class="action -calendar url">
        <span class="ficon-calendar-plus-o"></span>
      </div>
      <div class="action url -important0">
        <span class="ficon-bookmark-o"></span>
      </div>
      <div class="action -urgent0 url">
        <span class="ficon-exclamation-circle"></span>
      </div>
      <div class="action -more" @click="$store.commit('TOGGLE_TASK_ACTION_OPTION_DIALOG')">
        <span class="-ap icon-dots-three-horizontal"></span>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "task-detail-header",
};
</script>

<style>
</style>
