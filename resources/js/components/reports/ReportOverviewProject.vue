<template>
  <div class="box std" style="width: 25%;" v-if="projectStats">
    <div class="inner">
      <div class="header">
        Dự án
        <div class="side"></div>
      </div>
      <div class="body">
        <div class="bigcount">
          <div class="count">{{ projectStats.total }}</div>
          <div class="txt">dự án</div>

          <div class="info ap-xdot">
            <span class="dot -bg-alt1"></span>
            <b>{{ projectStats.internal }}</b>
            internal projects
          </div>

          <div class="info ap-xdot">
            <span class="dot -bg-alt5-edge"></span>
            <b>{{ projectStats.total - projectStats.internal }}</b>
            external projects
          </div>
        </div>
      </div>
    </div>
    <div class="s" style="padding-bottom:66.66666666666667%"></div>
  </div>
</template>

<script>
export default {
  name: "report-overview-project",
  props: {
    projectStats: { type: Object, default: null }
  }
};
</script>

<style>
</style>
