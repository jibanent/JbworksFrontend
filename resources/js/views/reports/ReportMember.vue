<template>
  <div class="db-grid" data-col="10">
    <report-member-detail :taskStatsByMember="taskStatsByMember" />

    <report-member-most-tasks-ahead :mostTasksAhead="mostTasksAhead" />

    <report-member-top-delayed :topDelayed="topDelayed" />
  </div>
</template>

<script>
import ReportMemberDetail from "./ReportMemberDetail";
import ReportMemberMostTasksAhead from "./ReportMemberMostTasksAhead";
import ReportMemberTopDelayed from './ReportMemberTopDelayed'
export default {
  name: "report-member",
  props: {
    taskStatsByMember: { type: Array, default: [] },
    mostTasksAhead: { type: Array, default: [] },
    topDelayed: { type: Array, default: [] }
  },
  components: {
    ReportMemberDetail,
    ReportMemberMostTasksAhead,
    ReportMemberTopDelayed
  }
};
</script>

<style>
</style>
