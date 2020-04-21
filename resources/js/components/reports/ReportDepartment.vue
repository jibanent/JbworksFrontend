<template>
  <div class="db-grid" data-col="10">
    <report-department-detail :taskStatsByDepartment="taskStatsByDepartment" />

    <report-department-chart
      :getDepartmentLabel="getDepartmentLabel"
      :getTotalTaskByDepartment="getTotalTaskByDepartment"
      :getCompleteTaskByDepartment="getCompleteTaskByDepartment"
      :getOverdueTaskByDepartment="getOverdueTaskByDepartment"
      :getProcessingTaskByDepartment="getProcessingTaskByDepartment"
    />
  </div>
</template>

<script>
import ReportDepartmentDetail from "./ReportDepartmentDetail";
import ReportDepartmentChart from "./ReportDepartmentChart";
export default {
  name: "report-department",
  props: {
    taskStatsByDepartment: { type: Array, default: [] },
    getDepartmentLabel: { type: Array, default: [] },
    getTotalTaskByDepartment: { type: Array, default: [] },
    getCompleteTaskByDepartment: { type: Array, default: [] },
    getOverdueTaskByDepartment: { type: Array, default: [] },
    getProcessingTaskByDepartment: { type: Array, default: [] }
  },
  components: {
    ReportDepartmentDetail,
    ReportDepartmentChart
  }
};
</script>

<style>
</style>
