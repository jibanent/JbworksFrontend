<template>
  <div class="box std" style="width: 40%;">
    <div class="inner">
      <div class="header">
        {{ $t('report.task chart of the department') }}
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
import BarChart from "../../components/Chart/BarChart";
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
            label: this.$t('report.total tasks'),
            backgroundColor: "#7CB5EC",
            data: this.getTotalTaskByDepartment
          },
          {
            label:  this.$t('report.in progress'),
            backgroundColor: "#434348",
            data: this.getProcessingTaskByDepartment
          },
          {
            label:  this.$t('report.total done'),
            backgroundColor: "#90ED7D",
            data: this.getCompleteTaskByDepartment
          },
          {
            label:  this.$t('report.overdue'),
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
