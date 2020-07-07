<template>
  <div class="box std" style="width: 40%;">
    <div class="inner">
      <div class="header">
        {{ $t('report.weekly reports') }}
        <div class="side"></div>
      </div>
      <div class="body -fit">
        <div class="graph -fit">
          <div style="height: 300px; overflow: hidden;">
            <div class="highcharts-container" style="height: 300px">
              <bar-chart :chart-data="chartData" :options="chartOptions" />
            </div>
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
  name: "report-chart-week",
  props: {
    getWeekLabel: { type: Array, default: [] },
    getTotalTaskByWeek: { type: Array, default: [] },
    getCompleteTaskByWeek: { type: Array, default: [] },
    getOverdueTaskByWeek: { type: Array, default: [] },
    getProcessingTaskByWeek: { type: Array, default: [] }
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
        labels: this.getWeekLabel,
        datasets: [
          {
            label: this.$t("report.total tasks"),
            backgroundColor: "#7CB5EC",
            data: this.getTotalTaskByWeek
          },
          {
            label: this.$t("report.total in progress"),
            backgroundColor: "#434348",
            data: this.getProcessingTaskByWeek
          },
          {
            label: this.$t("report.total done"),
            backgroundColor: "#90ED7D",
            data: this.getCompleteTaskByWeek
          },
          {
            label: this.$t("report.total overdue"),
            backgroundColor: "#F7A35C",
            data: this.getOverdueTaskByWeek
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
