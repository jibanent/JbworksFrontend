<template>
  <div class="box std" style="width: 60%;">
    <div class="inner">
      <div class="header">
        {{ $t('report.task assignments by members') }}
        <div class="side"></div>
      </div>
      <div class="body -fit">
        <div class="scrollbox scroll-y -smaller">
          <div class="thead">
            <div class="tmain">{{ $t('users.member') }}</div>
            <div class="tside">
              <div class="col" style="width:100px"></div>
              <div class="col ap-xdot" style="width:60px">{{ $t('report.done on time') }}</div>
              <div class="col ap-xdot" style="width:60px">{{ $t('report.done late') }}</div>
              <div class="col ap-xdot" style="width:60px">{{ $t('report.overdue') }}</div>
              <div class="col ap-xdot" style="width:60px">{{ $t('report.in progress') }}</div>
            </div>
          </div>
          <!--thanh vien-->
          <div class="list" id="js-members-report">
            <report-member-detail-item
              v-for="item in taskStatsByMember"
              :key="item.id"
              :stats="item"
            />
          </div>
        </div>
      </div>
    </div>
    <div class="s" style="padding-bottom:83.33333333333333%"></div>
  </div>
</template>

<script>
import ReportMemberDetailItem from "./ReportMemberDetailItem";
export default {
  name: "report-member-detail",
  props: {
    taskStatsByMember: { type: Array, default: [] }
  },
  components: {
    ReportMemberDetailItem
  }
};
</script>

<style>
</style>
