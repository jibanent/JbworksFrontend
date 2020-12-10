// Line Chart Shadow
import { Line } from 'vue-chartjs'
import ChartConfig from 'Constants/ChartConfig'

export default {
  extends: Line,
  props: {
    enableShadow: {
      type: Boolean,
      default: true
    },
    shadowColor: {
      type: String,
      default: () => ChartConfig.color.white
    },
    dataSet: {
      type: Array,
      default: () => [10, 30, 39, 65, 85, 10, 10]
    },
    lineTension: {
      type: Number,
      default: () => 0.4
    },
    dataLabels: {
      type: Array,
      default: () => ['A', 'B', 'C', 'D', 'E', 'F']
    },
    borderWidth: {
      type: Number,
      default: () => 3
    },
    enableGradient: {
      type: Boolean,
      default: () => true
    },
    borderColor: {
      type: String,
      default: () => ChartConfig.color.white
    }
  },
  data() {
    return {
      gradient1: null,
      options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true,
              display: false
            },
            gridLines: {
              display: false,
              drawBorder: false,
              drawTicks: false
            }
          }],
          xAxes: [{
            ticks: {
              display: false
            },
            barPercentage: 0.8,
            gridLines: {
              display: false,
              drawBorder: false
            }
          }]
        },
        legend: {
          display: false
        },
        tooltip: {
          enabled: true
        }
      }
    }
  },
  mounted() {
    const self = this
    if (this.enableShadow !== false) {
      const ctx = this.$refs.canvas.getContext('2d')
      const _stroke = ctx.stroke
      ctx.stroke = function() {
        ctx.save()
        ctx.shadowColor = self.shadowColor
        ctx.shadowBlur = 10
        ctx.shadowOffsetX = 0
        ctx.shadowOffsetY = 8
        _stroke.apply(this, arguments)
        ctx.restore()
      }
    }

    let gradientColor = ''
    if (this.enableGradient) {
      this.gradient1 = this.$refs.canvas.getContext('2d').createLinearGradient(0, 0, 140, 0)
      this.gradient1.addColorStop(0, this.gradientColor1)
      this.gradient1.addColorStop(1, this.gradientColor2)
      gradientColor = this.gradient1
    } else {
      gradientColor = this.borderColor
    }

    this.renderChart({
      labels: this.dataLabels,
      datasets: [{
        label: 'My First dataset',
        data: this.dataSet,
        lineTension: this.lineTension,
        borderColor: gradientColor,
        pointBorderWidth: 0,
        pointHoverRadius: 0,
        pointRadius: 0,
        pointHoverBorderWidth: 0,
        borderWidth: this.borderWidth,
        fill: false
      }]
    }, this.options)
  }
}
