<template>
  <div class="db-grid">
    <report-project-detail :taskStatsByProject="taskStatsByProject" />

    <report-project-by-stages />
  </div>
</template>

<script>
import ReportProjectDetail from "./ReportProjectDetail";
import ReportProjectByStages from "./ReportProjectByStages";
export default {
  name: "report-project",
  props: {
    taskStatsByProject: {type: Array, default: []}
  },
  components: {
    ReportProjectDetail,
    ReportProjectByStages
  }
};
</script>

<style>
</style>
