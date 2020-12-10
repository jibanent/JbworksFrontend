import { Bar } from 'vue-chartjs'
import ChartConfig from 'Constants/ChartConfig'

export default {
  extends: Bar,
  data: function() {
    return {
      options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            },
            gridLines: {
              display: true
            }
          }],
          xAxes: [{
            gridLines: {
              display: false
            },
            categoryPercentage: 0.5,
            barPercentage: 0.8
          }]
        }
      }
    }
  },
  mounted() {
    this.renderChart({
      labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [
        {
          label: 'Data One',
          backgroundColor: ChartConfig.color.warning,
          data: [40, 35, 60, 70, 20, 35, 40]
        }
      ]
    }, this.options)
  }
}
