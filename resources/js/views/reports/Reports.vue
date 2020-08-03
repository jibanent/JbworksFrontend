<template>
  <div>
    <report-header />
    <div id="project-master" class="simple scroll-y forced-scroll -gray">
      <div class="canvas">
        <div id="db-canvas">
          <div id="db-wrapper">
            <report-filter :departments="departments" :department="department" />

            <report-overview
              :projectStats="projectStats"
              :departmentStats="departmentStats"
              :taskStats="taskStats"
              :userStats="userStats"
            />

            <div class="db-title">Report about tasks</div>

            <report-detail :excellentMember="excellentMember" :taskStats="taskStats" />

            <report-chart
              :getDateLabel="getDateLabel"
              :getTotalTaskByDate="getTotalTaskByDate"
              :getCompleteTaskByDate="getCompleteTaskByDate"
              :getOverdueTaskByDate="getOverdueTaskByDate"
              :getProcessingTaskByDate="getProcessingTaskByDate"
              :getWeekLabel="getWeekLabel"
              :getTotalTaskByWeek="getTotalTaskByWeek"
              :getCompleteTaskByWeek="getCompleteTaskByWeek"
              :getOverdueTaskByWeek="getOverdueTaskByWeek"
              :getProcessingTaskByWeek="getProcessingTaskByWeek"
            />

            <report-member
              :taskStatsByMember="taskStatsByMember"
              :mostTasksAhead="mostTasksAhead"
              :topDelayed="topDelayed"
            />

            <div class="db-title">Projects and departments</div>

            <report-project :taskStatsByProject="taskStatsByProject" :projectStats="projectStats" />

            <report-department
              :taskStatsByDepartment="taskStatsByDepartment"
              :getDepartmentLabel="getDepartmentLabel"
              :getTotalTaskByDepartment="getTotalTaskByDepartment"
              :getCompleteTaskByDepartment="getCompleteTaskByDepartment"
              :getOverdueTaskByDepartment="getOverdueTaskByDepartment"
              :getProcessingTaskByDepartment="getProcessingTaskByDepartment"
            />
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
import { mapActions, mapState, mapGetters } from "vuex";
import moment from "moment";
export default {
  name: "reports",
  created() {
    if (this.$auth.can("view project report")) {
      this.handleGetReports();
    } else {
      this.$router.push("/unauthorized");
    }
    if (this.$auth.isAdmin()) {
      this.getDepartments();
    }
    if (this.$auth.isLeader() || this.$auth.isManager()) {
      this.getMyDepartments(this.currentUser.id);
    }
    if (this.$auth.isMember()) {
      this.getDepartment(this.currentUser.department_id);
    }
  },
  watch: {
    $route() {
      this.handleGetReports();
    }
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
      taskStatsByDepartment: state => state.reports.taskStatsByDepartment,
      departments: state => state.departments.departments,
      currentUser: state => state.auth.currentUser,
      department: state => state.departments.department
    }),
    ...mapGetters([
      "getDateLabel",
      "getTotalTaskByDate",
      "getCompleteTaskByDate",
      "getOverdueTaskByDate",
      "getProcessingTaskByDate",
      "getWeekLabel",
      "getTotalTaskByWeek",
      "getCompleteTaskByWeek",
      "getOverdueTaskByWeek",
      "getProcessingTaskByWeek",
      "getDepartmentLabel",
      "getTotalTaskByDepartment",
      "getCompleteTaskByDepartment",
      "getOverdueTaskByDepartment",
      "getProcessingTaskByDepartment"
    ]),
    showDepartment() {
      return this.department;
    }
  },
  methods: {
    ...mapActions([
      "getReports",
      "getDepartments",
      "getMyDepartments",
      "getDepartment"
    ]),
    handleGetReports() {
      let { start, end, by, department} = this.$route.query;
      let currentDate = moment().format("YYYY-MM-DD");
      let subtractOneMonth = moment()
        .subtract(1, "months")
        .format("YYYY-MM-DD");
      if (!start) start = subtractOneMonth;
      if (!end) end = currentDate;

      if (this.$auth.isMember()) {
        department = this.currentUser.department_id;
      }

      const query = { start, end, by, department };
      this.getReports(query);
    }
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

<style></style>
