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
            barPercentage: 1.5
          }]
        }
      }
    }
  },
  mounted() {
    this.gradient = this.$refs.canvas.getContext('2d').createLinearGradient(0, 0, 0, 450)
    this.gradient.addColorStop(0, 'rgba(37, 117, 252, 1)')
    this.gradient.addColorStop(0.5, 'rgba(106, 17, 203, 1)')
    this.gradient.addColorStop(1, 'rgba(106, 17, 203, 1)')

    this.renderChart({
      labels: ['Project 1', 'Project 2', 'Project 3', 'Project 4'],
      datasets: [
        {
          label: 'Data One',
          backgroundColor: this.gradient,
          data: [400, 700, 1400, 900]
        }
      ]
    }, this.options)
  }
}
