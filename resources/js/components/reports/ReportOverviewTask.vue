<template>
  <div class="box std" style="width: 25%;" v-if="taskStats">
    <div class="inner">
      <div class="header">
        Công việc
        <div class="side"></div>
      </div>
      <div class="body">
        <div class="bigcount">
          <div class="count js-count" style="font-size:30px">{{ taskStats.total }}</div>
          <div class="txt">tasks</div>

          <div class="info ap-xdot">
            <span class="square -bg-alt1-edge"></span> &nbsp;
            <b class="js-count">{{ taskStats.total - taskStats.completed  }}</b>
            active
          </div>
          <div class="info ap-xdot">
            <span class="square -bg-success"></span> &nbsp;
            <b class="js-count">{{ taskStats.completed }}</b> done
          </div>
        </div>
      </div>
    </div>
    <div class="s" style="padding-bottom:66.66666666666667%"></div>
  </div>
</template>

<script>
export default {
  name: "report-overview-task",
  props: {
    taskStats: {type: Object, default: null}
  },
};
</script>

<style>
</style>
