import { Line } from 'vue-chartjs'
import { hexToRgbA } from 'Helpers/helpers'
import ChartConfig from 'Constants/ChartConfig'

export default {
  extends: Line,
  props: {
    data: {
      type: Array,
      required: true
    },
    color: {
      type: String,
      required: true
    }
  },
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
          yAxes: [
            {
              display: false
            }
          ],
          xAxes: [
            {
              display: false
            }
          ]
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
    const { danger, primary, waning, success, info, white, lightGrey } = ChartConfig.color
    this.gradient = this.$refs.canvas.getContext('2d').createLinearGradient(200, 10, 200, 800)
    this.gradient.addColorStop(0, hexToRgbA(this.color, 0.5))
    this.gradient.addColorStop(0.5, hexToRgbA(this.color, 0.9))
    this.gradient.addColorStop(1, hexToRgbA(this.color, 0))

    this.renderChart(
      {
        labels: ['Jan', 'Feb',	'Mar', 'Apr', 'May',	'Jun', 'Jul', 'Aug',	'Sep', 'Oct',	'Nov', 'Dec'],
        datasets: [
          {
            label: 'Total Users',
            borderColor: this.color,
            pointBackgroundColor: this.gradient,
            backgroundColor: this.gradient,
            borderWidth: 1,
            lineTension: 0,
            data: this.data
          }
        ]
      },
      this.options
    )
  }
}
