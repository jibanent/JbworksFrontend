import { Line } from 'vue-chartjs'
import ChartConfig from 'Constants/ChartConfig'

export default {
  extends: Line,
  data: function() {
    return {
      options: {
        responsive: true,
        maintainAspectRatio: true,
        legend: {
          display: false
        },
        scales: {
          yAxes: [
            {
              display: false
            }
          ],
          xAxes: [
            {
              display: false
            }
          ]
        }
      }
    }
  },
  mounted() {
    const { white } = ChartConfig.color
    this.renderChart(
      {
        labels: ['地盤事業本部', '住宅DX推進部', '住宅DX推進部', '営業サポート部'],
        datasets: [
          {
            backgroundColor: '#bfff00',
            pointBackgroundColor: white,
            borderColor: white,
            fill: false,
            pointBorderWidth: 0,
            label: 'レポ－ト',
            data: [20, 10, 35, 20]
          }
        ]
      },
      this.options
    )
  }
}
