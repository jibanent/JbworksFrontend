<template>
  <div class="doughnut-chart">
    <doughnut-chart :width="300" :height="200" />
  </div>
</template>

<script>
import DoughnutChart from 'Components/Charts/DoughnutChart'

export default {
  components: {
    DoughnutChart
  }
}
</script>
