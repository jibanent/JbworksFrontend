import { Pie } from 'vue-chartjs'
import ChartConfig from 'Constants/ChartConfig'

export default {
  extends: Pie,
  data() {
    return {
      options: {
        legend: {
          position: 'bottom'
        }
      }
    }
  },
  mounted() {
    this.renderChart({
      labels: ['Project 1', 'Project 2', 'Project 3', 'Project 4'],
      datasets: [{
        data: [535, 510, 634, 735],
        backgroundColor: [
          ChartConfig.color.primary,
          ChartConfig.color.danger,
          ChartConfig.color.info,
          ChartConfig.color.success
        ],
        borderWidth: [0, 0, 0, 0]
      }]
    }, this.options)
  }
}
