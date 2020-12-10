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
              padding: 20
              // max: 800
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
      labels: ['2020年6月度', '2020年7月度', '2020年8月度', '2020年9月度', '2020年10月度', '2020年11月度', '2020年12月度'],
      datasets: [
        {
          type: 'line',
          label: this.$t('message.achievement'),
          borderColor: danger,
          pointBackgroundColor: white,
          spanGaps: false,
          lineTension: 0,
          fill: false,
          cubicInterpolationMode: 'monotone',
          pointBorderWidth: 5,
          pointBorderColor: white,
          data: [1500, 1500, 4000, 1500, 1000, 3900, 1000]
        },
        {
          type: 'bar',
          label: this.$t('message.target'),
          backgroundColor: primary,
          data: [2000, 3000, 5000, 1500, 2000, 4000, 1000]
        }
      ]
    }, this.options)
  }
}
