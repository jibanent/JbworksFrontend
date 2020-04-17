<template>
  <div class="db-grid" data-col="30">
    <report-detail-status-task />

    <report-detail-excellent-member :excellentMember="excellentMember" />

    <report-detail-overdue-task />
  </div>
</template>

<script>
import ReportDetailStatusTask from "./ReportDetailStatusTask";
import ReportDetailExcellentMember from "./ReportDetailExcellentMember";
import ReportDetailOverdueTask from "./ReportDetailOverdueTask";
export default {
  name: "report-detail",
  props: {
    taskStats: { type: Object, default: null },
    excellentMember: { type: Array, default: [] }
  },
  components: {
    ReportDetailStatusTask,
    ReportDetailExcellentMember,
    ReportDetailOverdueTask
  }
};
</script>

<style>
</style>
