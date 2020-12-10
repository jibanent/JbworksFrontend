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
      labels: ['Men', 'Women', 'Kids'],
      datasets: [{
        data: [250, 100, 70],
        backgroundColor: [
          ChartConfig.color.primary,
          ChartConfig.color.danger,
          ChartConfig.color.success
        ],
        borderWidth: [0, 0, 0],
        hoverBackgroundColor: [
          ChartConfig.color.warning,
          ChartConfig.color.black,
          ChartConfig.color.info
        ]
      }]
    }, this.options)
  }
}
