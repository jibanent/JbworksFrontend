<template>
  <div class="db-grid">
    <report-project-detail :taskStatsByProject="taskStatsByProject" />

    <report-project-by-stages :projectStats="projectStats" />
  </div>
</template>

<script>
import ReportProjectDetail from "./ReportProjectDetail";
import ReportProjectByStages from "./ReportProjectByStages";
export default {
  name: "report-project",
  props: {
    taskStatsByProject: { type: Array, default: [] },
    projectStats: { type: Object, default: null }
  },
  components: {
    ReportProjectDetail,
    ReportProjectByStages
  }
};
</script>

<style>
</style>
