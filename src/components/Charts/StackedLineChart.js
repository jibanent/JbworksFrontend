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
              display: true,
              drawBorder: false
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
    const { danger, primary, white } = ChartConfig.color
    this.gradient = this.$refs.canvas.getContext('2d').createLinearGradient(0, 0, 0, 450)
    this.gradient2 = this.$refs.canvas.getContext('2d').createLinearGradient(0, 0, 0, 450)

    this.gradient.addColorStop(0, hexToRgbA(danger, 0.5))
    this.gradient.addColorStop(0.5, hexToRgbA(danger, 0.25))
    this.gradient.addColorStop(1, hexToRgbA(danger, 0))

    this.gradient2.addColorStop(0, hexToRgbA(primary, 0.9))
    this.gradient2.addColorStop(0.5, hexToRgbA(primary, 0.25))
    this.gradient2.addColorStop(1, hexToRgbA(primary, 0))

    this.renderChart({
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
      datasets: [
        {
          label: 'Total Users',
          borderColor: danger,
          pointBackgroundColor: white,
          backgroundColor: this.gradient,
          borderWidth: 2,
          lineTension: 0,
          data: [440, 300, 200, 360, 380, 220, 440, 500, 410, 420, 380, 440]
        },
        {
          label: 'Active Users',
          borderColor: primary,
          pointBackgroundColor: white,
          borderWidth: 2,
          backgroundColor: this.gradient2,
          lineTension: 0,
          data: [220, 150, 100, 180, 190, 110, 220, 350, 205, 210, 190, 220]
        }
      ]
    }, this.options)
  }
}
