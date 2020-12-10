import { PolarArea } from 'vue-chartjs'
import ChartConfig from 'Constants/ChartConfig'
import { hexToRgbA } from 'Helpers/helpers'

export default {
  extends: PolarArea,
  mounted() {
    const { primary, white, danger } = ChartConfig.color
    this.renderChart({
      labels: ['Eating', 'Drinking', 'Sleeping', 'Designing', 'Coding', 'Cycling', 'Running'],
      datasets: [
        {
          label: 'Series A',
          backgroundColor: hexToRgbA(primary, 0.2),
          borderColor: hexToRgbA(primary, 1),
          pointBackgroundColor: hexToRgbA(primary, 1),
          pointBorderColor: white,
          pointHoverBackgroundColor: white,
          pointHoverBorderColor: hexToRgbA(primary, 1),
          data: [65, 59, 90, 81, 56, 55, 40]
        },
        {
          label: 'Series B',
          backgroundColor: hexToRgbA(danger, 0.2),
          borderColor: hexToRgbA(danger, 1),
          pointBackgroundColor: hexToRgbA(danger, 1),
          pointBorderColor: white,
          pointHoverBackgroundColor: white,
          pointHoverBorderColor: hexToRgbA(danger, 1),
          data: [28, 48, 40, 19, 96, 27, 100]
        }
      ]
    }, { responsive: true, maintainAspectRatio: false })
  }
}
