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
    const { white, danger } = ChartConfig.color
    this.renderChart(
      {
        labels: ['地盤事業本部', '住宅DX推進部', '住宅DX推進部', '営業サポート部'],
        datasets: [
          {
            backgroundColor: '#ff8000',
            pointBackgroundColor: white,
            borderColor: white,
            lineTension: 0,
            fill: false,
            pointBorderWidth: 0,
            label: 'Data One',
            data: [10, 20, 30, 40]
          }
        ]
      },
      this.options
    )
  }
}
