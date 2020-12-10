<template>
  <stacked-line-chart :width="300" :height="150" onresize />
</template>

<script>
import StackedLineChart from 'Components/Charts/StackedLineChart'

export default {
  components: {
    StackedLineChart
  }
}
</script>
