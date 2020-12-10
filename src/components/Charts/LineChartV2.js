// News Letter Campaign Widget
import { Line } from 'vue-chartjs'
import ChartConfig from 'Constants/ChartConfig'

const lineTension = lineTension
const borderWidth = 3
const pointRadius = 7
const pointBorderWidth = 2

export default {
  extends: Line,
  props: {
    dataSet: {
      type: Array,
      default: () => [30, 5, 26, 10, 30]
    },
    label: {
      type: String,
      default: () => 'Data'
    },
    labelX: {
      type: String,
      default: () => 'X-Axis'
    },
    labelY: {
      type: String,
      default: () => 'Y-Axis'
    },
    labels: {
      type: Array,
      default: () => ['A', 'B', 'C', 'D', 'E', 'F']
    },
    gridLines: {
      type: Boolean,
      default: () => false
    },
    borderColor: {
      type: String
    }
  },
  data() {
    return {
      options: {
        scales: {
          yAxes: [{
						 scaleLabel: {
              display: true,
              labelString: this.labelY
            },
            gridLines: {
              display: true,
              drawBorder: this.gridLines
            },
            ticks: {
              stepSize: 50,
              display: true
            }
          }],
          xAxes: [{
            scaleLabel: {
              display: true,
              labelString: this.labelX
            },
            gridLines: {
              display: false,
              drawBorder: false
            },
            ticks: {
              display: true
            }
          }]
        },
        legend: {
          display: false
        },
        responsive: true,
        maintainAspectRatio: false
      }
    }
  },
  mounted() {
    this.renderChart({
      labels: this.labels,
      datasets: [
        {
          label: this.label,
          lineTension,
          borderColor: this.borderColor,
          pointBorderColor: this.borderColor,
          pointBorderWidth,
          pointRadius,
          fill: false,
          pointBackgroundColor: ChartConfig.color.white,
          borderWidth,
          data: this.dataSet
        }
      ]
    }, this.options)
  }
}
