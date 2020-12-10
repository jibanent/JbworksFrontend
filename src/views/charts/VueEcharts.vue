<template>
  <div>
    <page-title-bar />
    <div class="row">
      <div class="col-sm-12 col-md-6 col-lg-6 grid-b-space">
        <app-card class="text-center" :heading="$t('message.lineChart')">
          <line-chart />
        </app-card>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-6 grid-b-space">
        <app-card :heading="$t('message.barChart')">
          <bar-chart />
        </app-card>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-6 text-center grid-b-space">
        <app-card class="text-center" :heading="$t('message.pieChart')">
          <pie-chart />
        </app-card>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-6 grid-b-space">
        <app-card :heading="$t('message.doughnutChart')">
          <doughnut-chart />
        </app-card>
      </div>
      <div class="col-sm-12 col-md-12 col-lg-12 grid-b-space">
        <app-card :heading="$t('message.funnelChart')">
          <funnel-chart />
        </app-card>
      </div>
    </div>
  </div>
</template>

<script>
import LineChart from './vue-echarts/LineChart.vue'
import BarChart from './vue-echarts/BarChart.vue'
import PieChart from './vue-echarts/PieChart.vue'
import DoughnutChart from './vue-echarts/DoughnutChart.vue'
import FunnelChart from './vue-echarts/FunnelChart.vue'

export default {
  name: 'BuyersStats',
  components: {
    LineChart,
    BarChart,
    PieChart,
    DoughnutChart,
    FunnelChart
  }
}
</script>
