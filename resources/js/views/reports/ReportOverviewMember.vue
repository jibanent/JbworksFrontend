<template>
  <div class="box std" style="width: 25%;" v-if="userStats">
    <div class="inner">
      <div class="header">
        Thành viên
        <div class="side"></div>
      </div>
      <div class="body">
        <div class="bigcount">
          <div class="count js-count">{{ userStats.total }}</div>
          <div class="txt">members</div>

          <div class="info ap-xdot">
            <span class="square -bg-success"></span> &nbsp;
            <b class="js-count">{{ userStats.active }}</b>
            active
          </div>

          <div class="info ap-xdot">
            <span class="square -bg-gray"></span> &nbsp;
            <b class="js-count">{{ userStats.total - userStats.active }}</b> inactive
          </div>
        </div>
      </div>
    </div>
    <div class="s" style="padding-bottom:66.66666666666667%"></div>
  </div>
</template>

<script>
export default {
  name: 'report-overview-member',
  props: {
    userStats: {type: Object, default: null}
  },
};
</script>

<style>
</style>
