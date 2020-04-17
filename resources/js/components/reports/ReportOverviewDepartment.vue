<template>
  <div class="box std" style="width: 25%;" v-if="departmentStats">
    <div class="inner">
      <div class="header">
        Teams
        <div class="side"></div>
      </div>
      <div class="body">
        <div class="bigcount">
          <div class="count js-count">{{ departmentStats.total }}</div>
          <div class="txt">teams</div>

          <div class="info ap-xdot">
            <span class="dot -bg-alt1"></span>
            <b class="js-count">{{ departmentStats.active }}</b>
            active teams
          </div>

          <div class="info ap-xdot">
            <span class="dot -bg-alt5-edge"></span>
            <b class="js-count">{{ departmentStats.total - departmentStats.active }}</b>
            inactive teams
          </div>
        </div>
      </div>
    </div>
    <div class="s" style="padding-bottom:66.66666666666667%"></div>
  </div>
</template>

<script>
export default {
  name: "report-overview-department",
  props: {
    departmentStats: {type: Object, default: null}
  },
};
</script>

<style>
</style>
