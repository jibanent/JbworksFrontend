<template>
  <div class="box std" style="width: 25%;" v-if="userStats">
    <div class="inner">
      <div class="header">
        {{ $t('users.member') }}
        <div class="side"></div>
      </div>
      <div class="body">
        <div class="bigcount">
          <div class="count js-count">{{ userStats.total }}</div>
          <div class="txt">{{ $t('users.member') }}</div>

          <div class="info ap-xdot">
            <span class="square -bg-success"></span> &nbsp;
            <b
              class="js-count"
            >{{ $t('report.number active members', {number: userStats.active})}}</b>
          </div>

          <div class="info ap-xdot">
            <span class="square -bg-gray"></span> &nbsp;
            <b
              class="js-count"
            >{{ $t('report.number inactive members', {number: userStats.total - userStats.active})}}</b>
          </div>
        </div>
      </div>
    </div>
    <div class="s" style="padding-bottom:66.66666666666667%"></div>
  </div>
</template>

<script>
export default {
  name: "report-overview-member",
  props: {
    userStats: { type: Object, default: null }
  }
};
</script>

<style>
</style>
