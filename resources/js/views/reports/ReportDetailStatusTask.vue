<template>
  <div class="box std" style="width: 33.33%;">
    <div class="inner">
      <div class="header">
        {{ $t('report.task breakdown by statuses') }}
        <div class="side"></div>
      </div>
      <div class="body" v-if="taskStats">
        <div class="graph">
          <pie-chart :data="chartData" :options="chartOptions" />
        </div>
      </div>
    </div>
    <div class="s" style="padding-bottom:112.5%"></div>
  </div>
</template>

<script>
import PieChart from "../../components/Chart/PieChart";
export default {
  name: "report-detail-status-task",
  props: {
    taskStats: { type: Object, default: null }
  },
  computed: {
    chartOptions() {
      return {
        hoverBorderWidth: 10,
        cutoutPercentage: 80,
        responsive: true,
        legend: {
          position: "bottom",
          align: "start",
          fullWidth: false,
          labels: {
            padding: 10,
            usePointStyle: true,
            boxWidth: 8,
            fontSize: 13,
            fontColor: "#999999"
          }
        },
        layout: {
          padding: 40
        }
      };
    },
    chartData() {
      return {
        hoverBackgroundColor: "red",
        hoverBorderWidth: 10,
        labels: [
          this.$t("tasks.number of tasks done on time", {
            number: this.taskStats.completed_ontime
          }),
          this.$t("tasks.number of tasks done late", {
            number: this.taskStats.completed_late
          }),
          this.$t("tasks.number of tasks overdue", {
            number: this.taskStats.overdue
          }),
          this.$t("tasks.number of tasks doing", {
            number: this.taskStats.processing
          })
        ],
        datasets: [
          {
            backgroundColor: ["#14CC3F", "#F7E015", "#F54E3B", "#389DD9"],
            data: [
              this.taskStats.completed_ontime,
              this.taskStats.completed_late,
              this.taskStats.overdue,
              this.taskStats.processing
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
