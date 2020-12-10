<template>
  <div class="sales-report-chart">
    <sales-report-chart :width="300" :height="150" />
  </div>
</template>

<script>
import SalesReportChart from 'Components/Charts/SalesReportChart'

export default {
  components: {
    SalesReportChart
  }
}
</script>
