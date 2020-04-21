import { Doughnut, mixins } from "vue-chartjs";
import Chart from "chart.js";

export default {
  extends: Doughnut,
  props: ["data", "options"],
  mounted() {
    this.renderChart(this.data, this.options);
  },
};
