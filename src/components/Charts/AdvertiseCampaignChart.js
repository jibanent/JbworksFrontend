import { Doughnut } from 'vue-chartjs'
import ChartConfig from 'Constants/ChartConfig'

export default {
  extends: Doughnut,
  data() {
    return {
      options: {
        legend: {
          display: false,
          position: 'right'
        },
        cutoutPercentage: 60
      }
    }
  },
  mounted() {
    this.renderChart({
      labels: ['Google Ads', 'Facebook Ads', 'Print Media'],
      datasets: [{
        data: [6500, 3500, 1500],
        backgroundColor: [
          ChartConfig.color.danger,
          ChartConfig.color.primary,
          ChartConfig.color.warning
        ],
        borderWidth: [3, 3, 3],
        hoverBackgroundColor: [
          ChartConfig.color.danger,
          ChartConfig.color.primary,
          ChartConfig.color.warning
        ]
      }]
    }, this.options)
  }
}
