import { Doughnut, mixins } from "vue-chartjs";
import Chart from "chart.js";

export default {
  mixins: [mixins],
  extends: Doughnut,
  props: ["data", "options"],
  mounted() {
    this.renderPieChart();
  },
  computed: {
    chartData() {
      return this.data;
    }
  },
  methods: {
    renderPieChart() {
      this.renderChart(this.chartData, this.options);
    }
  },
  watch: {
    data() {
      this.renderPieChart();
    }
  }
};
