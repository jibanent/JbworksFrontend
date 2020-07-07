<template>
  <div class="box std" style="width: 60%;">
    <div class="inner">
      <div class="header">
        {{ $t('report.daily progressions') }}
        <div class="side">
          <div class="ilegends">
            <div class="legend">
              <span class="dot" style="background-color:#48856c"></span>
              {{ $t('report.total tasks') }}
            </div>
            <div class="legend">
              <span class="dot" style="background-color:#389dd9"></span>
              {{ $t('report.total in progress') }}
            </div>
            <div class="legend">
              <span class="dot" style="background-color:#14cc3f"></span>
              {{ $t('report.total done') }}
            </div>
            <div class="legend">
              <span class="dot" style="background-color:#f54e3b"></span>
              {{ $t('report.total overdue') }}
            </div>
          </div>
        </div>
      </div>
      <div class="body -fit">
        <div class="graph -fit">
          <div style="overflow: hidden;">
            <div class="highcharts-container">
              <bar-chart :chart-data="chartData" :options="chartOptions" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="s" style="padding-bottom:50%"></div>
  </div>
</template>

<script>
import BarChart from "../../components/Chart/BarChart";
export default {
  name: "report-chart-date",
  props: {
    getDateLabel: { type: Array, default: [] },
    getTotalTaskByDate: { type: Array, default: [] },
    getCompleteTaskByDate: { type: Array, default: [] },
    getOverdueTaskByDate: { type: Array, default: [] },
    getProcessingTaskByDate: { type: Array, default: [] }
  },
  data() {
    return {
      chartData: null
    };
  },
  mounted() {
    setInterval(this.generateData, 1500);
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
              stacked: true
            }
          ],
          xAxes: [
            {
              stacked: true,
              categoryPercentage: 0.5,
              barPercentage: 1
            }
          ]
        },
        legend: {
          display: false
        },
        responsive: true,
        maintainAspectRatio: false
      };
    }
  },
  methods: {
    generateData() {
      this.chartData = {
        labels: this.getDateLabel,
        datasets: [
          {
            type: "line",
            label: "Total created",
            backgroundColor: "#48856C",
            fill: false,
            data: this.getTotalTaskByDate
          },
          {
            type: "bar",
            label: "Total done",
            backgroundColor: "#14CC3F",
            data: this.getCompleteTaskByDate
          },
          {
            type: "bar",
            label: "Total overdue",
            backgroundColor: "#F54E3B",
            data: this.getOverdueTaskByDate
          },
          {
            type: "bar",
            label: "Total in progress",
            backgroundColor: "#389DD9",
            data: this.getProcessingTaskByDate
          }
        ]
      };
    },
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
