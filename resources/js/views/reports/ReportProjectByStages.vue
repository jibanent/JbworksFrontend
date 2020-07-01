<template>
  <div class="box std" style="width: 40%;" v-if="projectStats">
    <div class="inner">
      <div class="header">
        Báo cáo tổng hợp dự án
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
              <b class="js-count">{{ projectStats.total }}</b>
              projects
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
          `${this.projectStats.on_track} ĐÚNG TIẾN ĐỘ`,
          `${this.projectStats.off_track} CHẬM TIẾN ĐỘ`,
          `${this.projectStats.at_risk} CÓ RỦI RO CAO`
        ],
        datasets: [
          {
            backgroundColor: ["#14CC3F", "#F7E015", "#F54E3B"],
            data: [
              this.projectStats.on_track,
              this.projectStats.off_track,
              this.projectStats.at_risk,
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
