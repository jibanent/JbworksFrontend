<template>
  <div class="db-grid" data-col="10">
    <report-department-detail :taskStatsByDepartment="taskStatsByDepartment" />

    <report-department-chart />
  </div>
</template>

<script>
import ReportDepartmentDetail from "./ReportDepartmentDetail";
import ReportDepartmentChart from "./ReportDepartmentChart";
export default {
  name: "report-department",
  props: {
    taskStatsByDepartment: { type: Array, default: [] }
  },
  components: {
    ReportDepartmentDetail,
    ReportDepartmentChart
  }
};
</script>

<style>
</style>
