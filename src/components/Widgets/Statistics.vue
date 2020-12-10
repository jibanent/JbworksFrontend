<template>
  <div>
    <line-chart-v2
      :width="650"
      :height="400"
      :data-set="data"
      :labels="labels"
      :label-x="labelX"
      :label-y="labelY"
      :border-color="ChartConfig.color.primary"
      :label="label"
    />
  </div>
</template>

<script>
import LineChartV2 from 'Components/Charts/LineChartV2'
import ChartConfig from 'Constants/ChartConfig'

export default {
  components: {
    LineChartV2
  },
  props: ['data', 'labels', 'label', 'labelX', 'labelY'],
  data() {
    return {
      ChartConfig
    }
  }
}
</script>
