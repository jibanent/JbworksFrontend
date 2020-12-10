import { Radar } from 'vue-chartjs'
import ChartConfig from 'Constants/ChartConfig'
import { hexToRgbA } from 'Helpers/helpers'

export default {
  extends: Radar,
  mounted() {
    const { warning, black, danger } = ChartConfig.color
    this.renderChart({
      labels: ['Eating', 'Drinking', 'Sleeping', 'Designing', 'Coding', 'Cycling', 'Running'],
      datasets: [
        {
          label: 'Series A',
          backgroundColor: hexToRgbA(warning, 0.2),
          borderColor: hexToRgbA(warning, 1),
          pointBackgroundColor: hexToRgbA(warning, 1),
          pointBorderColor: black,
          pointHoverBackgroundColor: black,
          pointHoverBorderColor: hexToRgbA(warning, 1),
          data: [65, 59, 90, 81, 56, 55, 40]
        },
        {
          label: 'Series B',
          backgroundColor: hexToRgbA(danger, 0.2),
          borderColor: hexToRgbA(danger, 1),
          pointBackgroundColor: hexToRgbA(danger, 1),
          pointBorderColor: black,
          pointHoverBackgroundColor: black,
          pointHoverBorderColor: hexToRgbA(danger, 1),
          data: [28, 48, 40, 19, 96, 27, 100]
        }
      ]
    }, { responsive: true, maintainAspectRatio: false })
  }
}
