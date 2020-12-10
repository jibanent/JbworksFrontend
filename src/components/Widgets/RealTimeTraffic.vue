<template>
  <app-card
    app-card-class="h-100 d-flex flex-column justify-content-between"
    :heading="$t('message.realTimeTraffic')"
    :heading-menu="true"
    custom-classes="real-traffic-widget overflow-hide h-100"
    footer-classes="p-0"
    :enable-footer="true"
  >
    <real-time-traffic-chart :width="350" :height="100" />
    <ul slot="footer" class="footer-border border-0">
      <li v-for="(data, index) in trafficData" :key="index" class="w-33">
        <h5 class="font-weight-bold mb text-center">{{ data.request }}</h5>
        <span class="font-xs">{{ data.message }}</span>
      </li>
    </ul>
  </app-card>
</template>

<script>

import RealTimeTrafficChart from 'Components/Charts/RealTimeTrafficChart'

export default {
  components: {
    RealTimeTrafficChart
  },
  data() {
    return {
      trafficData: [
        {
          request: '5100',
          message: 'Minimum Incoming Request'
        },
        {
          request: '5100',
          message: 'Highest Incoming Request'
        },
        {
          request: '41%',
          message: 'Avg. Per Hour'
        }
      ]
    }
  }
}
</script>
