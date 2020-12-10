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
              max: 500,
              padding: 60,
              min: 0
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
    this.renderChart({
      labels: ['2007', '2008', '2009', '2010', '2011', '2012', '2013', '2014', '2015', '2016', '2017'],
      datasets: [
        {
          label: 'Admin Themes',
          borderColor: ChartConfig.color.warning,
          pointBackgroundColor: ChartConfig.color.warning,
          fill: false,
          borderWidth: 4,
          lineTension: 0.1,
          data: [380, 320, 240, 360, 260, 320, 310, 340, 300, 360, 310, 330]
        },
        {
          label: 'Wordpress Themes',
          borderColor: ChartConfig.color.info,
          pointBackgroundColor: ChartConfig.color.danger,
          borderWidth: 4,
          fill: false,
          lineTension: 0,
          data: [330, 100, 60, 110, 130, 90, 210, 290, 250, 310, 320, 290]
        }
      ]
    }, this.options)
  }
}
