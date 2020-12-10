import { Doughnut } from 'vue-chartjs'
import ChartConfig from 'Constants/ChartConfig'

export default {
  extends: Doughnut,
  data() {
    return {
      options: {
        responsive: true,
        maintainAspectRatio: true,
        legend: {
          position: 'bottom',
          labels: {
            fontSize: 12,
            usePointStyle: true
          }
        },
        cutoutPercentage: 65,
        padding: 20
      }
    }
  },
  mounted() {
    const { color } = ChartConfig
    this.renderChart({
      labels: ['地盤事業本部', '住宅DX推進部', 'JIBANGOO推進部', '営業サポート部'],
      datasets: [{
        data: [100, 70, 50, 30],
        backgroundColor: [
          color.primary,
          color.danger,
          color.second,
          color.warning
        ],
        borderWidth: [3, 3, 3, 3],
        hoverBackgroundColor: [
          color.primary,
          color.danger,
          color.second,
          color.warning
        ]
      }]
    }, this.options)
  }
}
