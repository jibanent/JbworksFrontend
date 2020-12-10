import { Line } from 'vue-chartjs'
import ChartConfig from 'Constants/ChartConfig'

export default {
  extends: Line,
  props: {
    data: {
      type: Array,
      required: true
    }
  },
  data: function() {
    return {
      timeOut: null,
      options: {
        responsive: true,
        maintainAspectRatio: true,
        legend: {
          display: false
        },
        scales: {
          yAxes: [{
            display: false
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
          borderColor: ChartConfig.color.white,
          pointBackgroundColor: ChartConfig.color.white,
          backgroundColor: 'rgba(0, 0, 0, 0.2)',
          borderWidth: 1,
          lineTension: 0,
          data: this.data
        }
      ]
    }, this.options)
  }
}
