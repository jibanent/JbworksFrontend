<template>
  <div class="section js-project-stats" v-if="project">
    <div id="js-side-stats">
      <div class="box">
        <div class="box-title">{{ $t('tasks.general overview') }}</div>
        <div class="graph-canvas">
          <pie-chart :data="chartData" :options="chartOptions" class="graph" />
          <div class="stats">
            <div class="stat">
              <span class="s" style="background-color:#14CC3F"></span>
              <em>{{ $t('tasks.number of tasks done on time', {number: project.stats.completed_ontime}) }}</em>
            </div>
            <div class="stat">
              <span class="s" style="background-color:#F7E015"></span>
              <em>{{ $t('tasks.number of tasks done late', {number: project.stats.completed_late}) }}</em>
            </div>
            <div class="stat">
              <span class="s" style="background-color:#F54E3B"></span>
              <em>{{ $t('tasks.number of tasks overdue', {number: project.stats.overdue}) }}</em>
            </div>
            <div class="stat">
              <span class="s" style="background-color:#389DD9"></span>
              <em>{{ $t('tasks.number of tasks doing', {number: project.stats.processing}) }}</em>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import PieChart from "../../../components/Chart/PieChart";
export default {
  name: "tasks-by-project-side-stats",
  props: {
    project: { type: Object, default: null }
  },
  computed: {
    chartOptions() {
      return {
        hoverBorderWidth: 10,
        responsive: true,
        legend: {
          display: false
        },
        layout: {
          padding: 20
        }
      };
    },
    chartData() {
      return {
        hoverBackgroundColor: "red",
        hoverBorderWidth: 10,
        labels: ["HT đúng hạn", "HT muộn", "quá hạn", "đang thực hiện"],
        datasets: [
          {
            backgroundColor: ["#14CC3F", "#F7E015", "#F54E3B", "#389DD9"],
            data: [
              this.project.stats.completed_ontime,
              this.project.stats.completed_late,
              this.project.stats.overdue,
              this.project.stats.processing
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

<style></style>
