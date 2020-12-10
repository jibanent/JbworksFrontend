import { Line } from 'vue-chartjs'
import ChartConfig from 'Constants/ChartConfig'

const chartData = [35, 30, 25, 30, 23, 27, 21, 29, 24, 18, 30, 35, 20]

export default {
  extends: Line,
  data: function() {
    return {
      timeOut: null,
      test: 0,
      chartData: chartData,
      options: {
        responsive: true,
        maintainAspectRatio: true,
        legend: {
          display: false
        },
        scales: {
          yAxes: [{
            ticks: {
              display: false,
              beginAtZero: true,
              max: 70
            },
            gridLines: {
              display: true,
              drawBorder: false,
              paddingLeft: 0
            },
            scaleLabel: {
              display: false
            }
          }],
          xAxes: [{
            display: false
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
      labels: ['2000', '2001', '2002', '2003', '2004', '2005', '2006', '2007', '2008', '2009', '2010', '2011', '2012'],
      datasets: [
        {
          label: 'Total Users',
          borderColor: ChartConfig.color.warning,
          pointBackgroundColor: ChartConfig.color.primary,
          backgroundColor: ChartConfig.color.info,
          borderWidth: 2,
          lineTension: 0,
          data: this.chartData
        }
      ]
    }, this.options)
    this.addRandomValue()
  },
  methods: {
    addRandomValue() {
      var randomData = this.chartData.slice(1)
      randomData.push(Math.round(Math.random() * 30) + 1)
      this.timeOut = setTimeout(() => this.addRandomValue(), 3000)
    }
  },
  destroyed() {
    clearTimeout(this.timeOut)
  }
}
