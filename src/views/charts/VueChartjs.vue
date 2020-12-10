<template>
  <div>
    <page-title-bar />
    <div class="row">
      <div class="col-sm-12 col-md-6 col-lg-6 grid-b-space">
        <app-card :heading="$t('message.lineChart')" class="overflow-hide">
          <line-chart :height="260" />
        </app-card>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-6 grid-b-space">
        <app-card :heading="$t('message.barChart')" class="overflow-hide">
          <bar-chart :height="260" />
        </app-card>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-6 grid-b-space">
        <app-card :heading="$t('message.doughnutChart')" class="overflow-hide">
          <doughnut-chart :height="260" />
        </app-card>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-6 grid-b-space">
        <app-card :heading="$t('message.pieChart')" class="overflow-hide">
          <pie-chart :height="260" />
        </app-card>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-6 grid-b-space">
        <app-card :heading="$t('message.radarChart')" class="overflow-hide">
          <radar-chart :height="260" />
        </app-card>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-6 grid-b-space">
        <app-card :heading="$t('message.polarAreaChart')" class="overflow-hide">
          <polar-area-chart :height="260" />
        </app-card>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-6 grid-b-space">
        <app-card :heading="$t('message.bubbleChart')" class="overflow-hide">
          <bubble-chart :height="260" />
        </app-card>
      </div>
    </div>
  </div>
</template>

<script>
import LineChart from './vue-chartjs/LineChart'
import BarChart from './vue-chartjs/BarChart'
import DoughnutChart from './vue-chartjs/DoughnutChart'
import PieChart from './vue-chartjs/PieChart'
import RadarChart from './vue-chartjs/RadarChart'
import PolarAreaChart from './vue-chartjs/PolarAreaChart'
import BubbleChart from './vue-chartjs/BubbleChart'

export default {
  components: {
    LineChart,
    BarChart,
    DoughnutChart,
    PieChart,
    RadarChart,
    PolarAreaChart,
    BubbleChart
  }
}
</script>
