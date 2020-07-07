<template>
  <div class="box std" style="width: 25%;" v-if="departmentStats">
    <div class="inner">
      <div class="header">
        {{ $t('departments.departments') }}
        <div class="side"></div>
      </div>
      <div class="body">
        <div class="bigcount">
          <div class="count js-count">{{ departmentStats.total }}</div>
          <div class="txt">{{ $t('departments.departments') }}</div>

          <div class="info ap-xdot">
            <span class="dot -bg-alt1"></span>
            <b class="js-count">{{ $t('report.number active departments', {number: departmentStats.active }) }}</b>
          </div>

          <div class="info ap-xdot">
            <span class="dot -bg-alt5-edge"></span>
             <b class="js-count">{{ $t('report.number inactive departments', {number: departmentStats.total - departmentStats.active }) }}</b>
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
