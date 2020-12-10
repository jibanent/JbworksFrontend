import { Doughnut } from 'vue-chartjs'
import ChartConfig from 'Constants/ChartConfig'

export default {
  extends: Doughnut,
  data() {
    return {
      options: {
        legend: {
          display: false
        },
        cutoutPercentage: 0,
        padding: 20
      }
    }
  },
  mounted() {
    const { color } = ChartConfig
    this.renderChart({
      labels: ['Total', 'Month'],
      datasets: [{
        data: [50000, 39000],
        backgroundColor: [
          color.white

        ],
        borderWidth: [1, 0, 0],
        hoverBackgroundColor: [
          color.white
        ]
      }]
    }, this.options)
  }
}
