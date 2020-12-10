<template>
  <div class="chart-wrap">
    <div class="d-flex justify-content-between">
      <h5>{{ title }}</h5>
      <span class="fw-bold mb-0">{{ value }}</span>
    </div>
    <tiny-area-chart :data="data" :width="width" :height="height" :color="color" />
  </div>
</template>

<script>
import TinyAreaChart from 'Components/Charts/TinyAreaChart'

export default {
  components: {
    TinyAreaChart
  },
  props: ['title', 'value', 'data', 'width', 'height', 'color', 'statsClass']
}
</script>
