<template>
  <div class="db-grid">
    <report-overview-project :projectStats="projectStats" />

    <report-overview-department :departmentStats="departmentStats" />

    <report-overview-task :taskStats="taskStats" />

    <report-overview-member :userStats="userStats" />
  </div>
</template>

<script>
import ReportOverviewProject from "./ReportOverviewProject";
import ReportOverviewDepartment from "./ReportOverviewDepartment";
import ReportOverviewTask from "./ReportOverviewTask";
import ReportOverviewMember from "./ReportOverviewMember";
export default {
  name: "report-overview",
  props: {
    projectStats: { type: Object, default: null },
    departmentStats: { type: Object, default: null },
    taskStats: { type: Object, default: null },
    userStats: {type: Object, default: null}
  },
  components: {
    ReportOverviewProject,
    ReportOverviewDepartment,
    ReportOverviewTask,
    ReportOverviewMember
  }
};
</script>

<style>
</style>
