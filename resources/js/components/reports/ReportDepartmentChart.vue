<template>
  <div class="box std" data-col="4,3" style="width: 40%;">
    <div class="inner">
      <div class="header">
        Phân bổ công việc theo phòng ban
        <div class="side"></div>
      </div>
      <div class="body">
        <div class="body -fit" style="overflow: hidden;">
          <div class="highcharts-container">
            <bar-chart :chart-data="chartData" :options="chartOptions" />
          </div>
        </div>
      </div>
    </div>
    <div class="s" style="padding-bottom:75%"></div>
  </div>
</template>

<script>
import BarChart from "../common/BarChart";
export default {
  name: "report-department-chart",
  props: {
    // taskStatsByDepartment: { type: Array, default: [] },
    getDepartmentLabel: { type: Array, default: [] },
    getTotalTaskByDepartment: { type: Array, default: [] },
    getCompleteTaskByDepartment: { type: Array, default: [] },
    getOverdueTaskByDepartment: { type: Array, default: [] },
    getProcessingTaskByDepartment: { type: Array, default: [] }
  },
  data() {
    return {
      chartData: null
    };
  },
  mounted() {
    setInterval(this.generateData, 1500);
  },
  methods: {
    generateData() {
      this.chartData = {
        labels: this.getDepartmentLabel,
        datasets: [
          {
            label: "Task",
            backgroundColor: "#7CB5EC",
            data: this.getTotalTaskByDepartment
          },
          {
            label: "In progress",
            backgroundColor: "#434348",
            data: this.getProcessingTaskByDepartment
          },
          {
            label: "Done",
            backgroundColor: "#90ED7D",
            data: this.getCompleteTaskByDepartment
          },
          {
            label: "Overdue",
            backgroundColor: "#F7A35C",
            data: this.getOverdueTaskByDepartment
          }
        ]
      };
    }
  },
  computed: {
    chartOptions() {
      return {
        title: {
          display: false
        },
        scales: {
          yAxes: [
            {
              stacked: false,
              ticks: {
                beginAtZero: true
              }
            }
          ],
          xAxes: [
            {
              stacked: false
            }
          ]
        },
        legend: {
          display: true,
          position: "bottom",
          align: "start",
          labels: {
            padding: 20,
            usePointStyle: true,
            boxWidth: 8,
            fontColor: "#999999"
          }
        },
        responsive: true,
        maintainAspectRatio: false
      };
    }
  },
  components: {
    BarChart
  }
};
</script>

<style scoped>
.highcharts-container > div {
  height: 285px;
}
</style>
