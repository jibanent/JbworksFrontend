import { Line } from 'vue-chartjs'
import ChartConfig from 'Constants/ChartConfig'
import { hexToRgbA } from 'Helpers/index'

export default {
  extends: Line,
  data: function() {
    return {
      gradient: null,
      gradient2: null,
      options: {
        legend: {
          display: false
        },
        responsive: true,
        maintainAspectRatio: true,
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true,
              max: 600,
              padding: 20
            },
            gridLines: {
              display: false
            }
          }],
          xAxes: [{
            ticks: {
              padding: 10
            },
            barPercentage: 0.8,
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
    const { danger, white } = ChartConfig.color
    this.gradient = this.$refs.canvas.getContext('2d').createLinearGradient(0, 0, 0, 350)

    this.gradient.addColorStop(0.2, hexToRgbA(danger, 1))
    this.gradient.addColorStop(0.4, hexToRgbA(danger, 1))

    this.renderChart({
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
      datasets: [
        {
          label: 'Total Users',
          borderColor: danger,
          pointBackgroundColor: white,
          backgroundColor: this.gradient,
          borderWidth: 1,
          lineTension: 0,
          data: [440, 300, 200, 360, 380, 220, 440, 500, 410, 420, 380, 440]
        }
      ]
    }, this.options)
  }
}
