<template>
  <div>
    <report-header />
    <div id="project-master" class="simple scroll-y forced-scroll -gray">
      <div class="canvas">
        <div id="db-canvas">
          <div id="db-wrapper">
            <report-filter />

            <report-overview
              :projectStats="projectStats"
              :departmentStats="departmentStats"
              :taskStats="taskStats"
              :userStats="userStats"
            />

            <div class="db-title">Report about tasks</div>

            <report-detail :excellentMember="excellentMember" :taskStats="taskStats" />

            <report-chart />

            <report-member
              :taskStatsByMember="taskStatsByMember"
              :mostTasksAhead="mostTasksAhead"
              :topDelayed="topDelayed"
            />

            <div class="db-title">Projects and departments</div>

            <report-project :taskStatsByProject="taskStatsByProject" />

            <report-department :taskStatsByDepartment="taskStatsByDepartment" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import ReportHeader from "./ReportHeader";
import ReportFilter from "./ReportFilter";
import ReportOverview from "./ReportOverview";
import ReportDetail from "./ReportDetail";
import ReportChart from "./ReportChart";
import ReportMember from "./ReportMember";
import ReportProject from "./ReportProject";
import ReportDepartment from "./ReportDepartment";
import { mapActions, mapState } from "vuex";
import moment from "moment";
export default {
  name: "reports",
  created() {
    const { start, end, by, department } = this.$route.query;
    const query = { start, end, by, department };
    this.getReports(query);
  },
  computed: {
    ...mapState({
      projectStats: state => state.reports.projectStats,
      departmentStats: state => state.reports.departmentStats,
      taskStats: state => state.reports.taskStats,
      userStats: state => state.reports.userStats,
      excellentMember: state => state.reports.excellentMember,
      taskStatsByMember: state => state.reports.taskStatsByMember,
      mostTasksAhead: state => state.reports.mostTasksAhead,
      topDelayed: state => state.reports.topDelayed,
      taskStatsByProject: state => state.reports.taskStatsByProject,
      taskStatsByDepartment: state => state.reports.taskStatsByDepartment
    })
  },
  methods: {
    ...mapActions(["getReports"])
  },
  components: {
    ReportHeader,
    ReportFilter,
    ReportOverview,
    ReportDetail,
    ReportChart,
    ReportMember,
    ReportProject,
    ReportDepartment
  }
};
</script>

<style>
</style>
