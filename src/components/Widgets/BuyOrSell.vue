<template>
  <div class="buy-sell-wrap">
    <div class="mb-3 text-right">
      <b-button variant="primary" class="mr-2 text-capitalize">This Month</b-button>
      <b-button variant="danger" class="mr-2 text-capitalize">This Year</b-button>
      <b-button variant="info" class="text-capitalize">Overall</b-button>
    </div>
    <div>
      <line-chart-v4
        :width="650"
        :height="400"
        :data-set="buySellChartData.dataAndLabel"
        :labels="buySellChartData.buySellChartLabel"
        :chart-colors-data="buySellChartData.buySellChartColors"
        :label="buySellChartData.dataAndLabel"
      />
    </div>
  </div>
</template>
<script>
import LineChartV4 from 'Components/Charts/LineChartV4'
import { buySellChartData } from 'Assets/data/buySellChartData.js'

export default {
  components: {
    LineChartV4
  },
  data() {
    return {
      buySellChartData
    }
  }
}
</script>
