<template>
  <div class="box std" style="width: 40%;" v-if="projectStats">
    <div class="inner">
      <div class="header">
        {{ $t('report.project summary report') }}
        <div class="side"></div>
      </div>
      <div class="body -fit">
        <div class="split-view">
          <div class="graph">
            <div class="highcharts-container">
              <pie-chart :data="chartData" :options="chartOptions" />
            </div>
          </div>
          <div class="main">
            <div class="title">
              <b class="js-count">{{ $t('report.number projects', {number: projectStats.total})}}</b>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="s" style="padding-bottom:50%"></div>
  </div>
</template>

<script>
import PieChart from "../../components/Chart/PieChart";
export default {
  name: "report-project-by-stages",
  props: {
    projectStats: { type: Object, default: null }
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
          labels: {
            padding: 10,
            usePointStyle: true,
            boxWidth: 8,
            fontSize: 13,
            fontColor: "#999999"
          }
        },
        layout: {
          // padding: 40
        }
      };
    },
    chartData() {
      return {
        hoverBackgroundColor: "red",
        hoverBorderWidth: 10,
        labels: [
          this.$t("report.number on track", {
            number: this.projectStats.on_track
          }),
          this.$t("report.number off track", {
            number: this.projectStats.off_track
          }),
          this.$t("report.number at risk", {
            number: this.projectStats.at_risk
          })
        ],
        datasets: [
          {
            backgroundColor: ["#14CC3F", "#F7E015", "#F54E3B"],
            data: [
              this.projectStats.on_track,
              this.projectStats.off_track,
              this.projectStats.at_risk
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
