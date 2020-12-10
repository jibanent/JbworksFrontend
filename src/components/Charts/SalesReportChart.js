import { Bar } from 'vue-chartjs'
import ChartConfig from 'Constants/ChartConfig'

export default {
  extends: Bar,
  data: function() {
    return {
      options: {
        responsive: true,
        maintainAspectRatio: true,
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true,
              padding: 20,
              max: 800
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
            barPercentage: 1,
            gridLines: {
              display: false,
              drawBorder: false
            }
          }]
        }
      }
    }
  },
  mounted() {
    const { danger, white, primary } = ChartConfig.color
    this.renderChart({
      labels: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
      datasets: [
        {
          type: 'line',
          label: 'Orders',
          borderColor: danger,
          pointBackgroundColor: white,
          spanGaps: false,
          lineTension: 0,
          fill: false,
          cubicInterpolationMode: 'monotone',
          pointBorderWidth: 5,
          pointBorderColor: white,
          data: [270, 470, 670, 570, 380, 700, 570]
        },
        {
          type: 'bar',
          label: 'Sales',
          backgroundColor: primary,
          data: [300, 500, 700, 600, 420, 750, 600]
        }
      ]
    }, this.options)
  }
}
