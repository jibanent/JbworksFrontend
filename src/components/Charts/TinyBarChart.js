import { Bar } from 'vue-chartjs'

export default {
  extends: Bar,
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
      options: {
        responsive: false,
        maintainAspectRatio: true,
        legend: {
          display: false
        },
        tooltips: {
          enabled: false
        },
        scales: {
          yAxes: [
            {
              display: false
            }
          ],
          xAxes: [
            {
              categoryPercentage: 0.8,
              barPercentage: 1,
              display: false
            }
          ]
        }
      }
    }
  },
  mounted() {
    this.renderChart(
      {
        labels: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
        datasets: [
          {
            type: 'bar',
            label: 'Sales',
            backgroundColor: this.color,
            data: this.data
          }
        ]
      },
      this.options
    )
  }
}
