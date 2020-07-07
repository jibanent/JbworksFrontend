<template>
  <div class="box std" style="width: 25%;" v-if="projectStats">
    <div class="inner">
      <div class="header">
        {{ $t('projects.projects') }}
        <div class="side"></div>
      </div>
      <div class="body">
        <div class="bigcount">
          <div class="count">{{ projectStats.total }}</div>
          <div class="txt">{{ $t('projects.projects') }}</div>

          <div class="info ap-xdot">
            <span class="dot -bg-alt1"></span>
            <b>{{ $t('report.number internal projects', {number:projectStats.internal }) }}</b>
          </div>

          <div class="info ap-xdot">
            <span class="dot -bg-alt5-edge"></span>
             <b>{{ $t('report.number external projects', {number: projectStats.total - projectStats.internal }) }}</b>
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
