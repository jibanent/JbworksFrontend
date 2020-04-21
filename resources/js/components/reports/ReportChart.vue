<template>
  <div class="db-grid" data-col="10">
    <report-chart-date
      :getDateLabel="getDateLabel"
      :getTotalTaskByDate="getTotalTaskByDate"
      :getCompleteTaskByDate="getCompleteTaskByDate"
      :getOverdueTaskByDate="getOverdueTaskByDate"
      :getProcessingTaskByDate="getProcessingTaskByDate"
    />

    <report-chart-week
      :getWeekLabel="getWeekLabel"
      :getTotalTaskByWeek="getTotalTaskByWeek"
      :getCompleteTaskByWeek="getCompleteTaskByWeek"
      :getOverdueTaskByWeek="getOverdueTaskByWeek"
      :getProcessingTaskByWeek="getProcessingTaskByWeek"
    />
  </div>
</template>

<script>
import ReportChartDate from "./ReportChartDate";
import ReportChartWeek from "./ReportChartWeek";

export default {
  name: "report-chart",
  props: {
    getDateLabel: { type: Array, default: [] },
    getTotalTaskByDate: { type: Array, default: [] },
    getCompleteTaskByDate: { type: Array, default: [] },
    getOverdueTaskByDate: { type: Array, default: [] },
    getProcessingTaskByDate: { type: Array, default: [] },
    getWeekLabel: { type: Array, default: [] },
    getTotalTaskByWeek: { type: Array, default: [] },
    getCompleteTaskByWeek: { type: Array, default: [] },
    getOverdueTaskByWeek: { type: Array, default: [] },
    getProcessingTaskByWeek: { type: Array, default: [] }
  },
  components: {
    ReportChartDate,
    ReportChartWeek
  }
};
</script>

<style>
</style>
