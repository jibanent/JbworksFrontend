<template>
  <div class="box std" style="width: 33.33%;">
    <div class="inner">
      <div class="header">
        Công việc không đúng hạn
        <div class="side"></div>
      </div>
      <div class="body -fit" v-if="taskStats">
        <div class="scrollbox scroll-y -smaller" id="js-task-late-report">
          <div class="istats">
            <div class="istat">
              <div class="percent">
                <pie-chart :data="overdueChartData" :options="chartOptions" />
              </div>
              <div class="stat">
                <div class="number">
                  <em style="color:#c34343">{{ taskStats.overdue }}</em>
                </div>
                <div class="sub">overdue tasks</div>
                <div class="sub ap-xdot">
                  over
                  <em>{{ taskStats.total }}</em> active tasks
                </div>
              </div>
            </div>

            <div class="istat">
              <div class="percent">
                <pie-chart :data="latedueChartData" :options="chartOptions" />
              </div>
              <div class="stat">
                <div class="number">
                  <em style="color:#F7E015">{{ taskStats.completed_late }}</em>
                </div>
                <div class="sub">late completed tasks</div>
                <div class="sub ap-xdot">
                  over
                  <em>{{ taskStats.total }}</em> active tasks
                </div>
              </div>
            </div>
            <div class="istat">
              <div class="plain">
                <span class="icon ficon-exclamation-circle"></span>
                <b class="js-count" data-key="tasks_no_deadline">{{ taskStats.task_without_deadline }}</b>
                tasks are created without deadline
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="s" style="padding-bottom:112.5%"></div>
  </div>
</template>

<script>
import PieChart from "../../components/Chart/PieChart";
export default {
  name: "report-detail-overdue-task",
  props: {
    taskStats: { type: Object, default: null }
  },
  computed: {
    chartOptions() {
      return {
        // hoverBorderWidth: 10,
        cutoutPercentage: 70,
        legend: {
          display: false
        },
        tooltips: {
          enabled: false
        }
      };
    },
    overdueChartData() {
      return {
        hoverBackgroundColor: "red",
        hoverBorderWidth: 10,
        datasets: [
          {
            backgroundColor: ["#C34343", "#E5E5E5"],
            data: [
              this.taskStats.overdue,
              this.taskStats.total - this.taskStats.overdue
            ],
            borderWidth: 1
          }
        ]
      };
    },
    latedueChartData() {
      return {
        hoverBackgroundColor: "red",
        hoverBorderWidth: 10,
        datasets: [
          {
            backgroundColor: ["#F7E015", "#E5E5E5"],
            data: [
              this.taskStats.completed_late,
              this.taskStats.total - this.taskStats.completed_late
            ],
            borderWidth: 1
          }
        ]
      };
    }
  },
  components: {
    PieChart
  }
};
</script>

<style>
</style>
