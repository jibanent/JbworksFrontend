import { Line } from 'vue-chartjs'
import ChartConfig from 'Constants/ChartConfig'

export default {
  extends: Line,
  data: function() {
    return {
      gradient: null,
      gradient2: null,
      options: {
        responsive: true,
        maintainAspectRatio: true,
        legend: {
          position: 'top',
          labels: {
            fontSize: 12,
            usePointStyle: true
          }
        },
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true,
              max: 2000,
              padding: 20
            },
            gridLines: {
              display: true,
              drawBorder: false
            }
          }],
          xAxes: [{
            ticks: {
              padding: 10
            },
            barPercentage: 0.9,
            gridLines: {
              display: false
            }
          }]
        },
        elements: {
          point: {
            radius: 0
          }
        }
      }
    }
  },
  mounted() {
    this.renderChart({
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
      datasets: [
        {
          label: 'Total Users',
          borderColor: ChartConfig.color.warning,
          pointBackgroundColor: ChartConfig.color.white,
          backgroundColor: 'rgba(254, 162, 0, 0.4)',
          borderWidth: 2,
          data: [1350, 1400, 1550, 1550, 1000, 600, 500, 700, 900, 1500, 1600, 1440]
        },
        {
          label: 'Active Users',
          borderColor: ChartConfig.color.danger,
          pointBackgroundColor: ChartConfig.color.white,
          borderWidth: 2,
          backgroundColor: 'rgba(246, 74, 50, 0.6)',
          data: [500, 700, 1000, 1100, 900, 400, 300, 400, 700, 1000, 1100, 600]
        }
      ]
    }, this.options)
  }
}
