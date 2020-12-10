<template>
  <app-card
    app-card-class="h-100"
    heading-menu="true"
    custom-classes="traffic-status-widget  grid-b-space"
    :heading="$t('message.overallTrafficStatus')"
    content-custom-class="d-flex justify-content-between flex-column h-90 overflow-hide"
    block-title-class="mb-3"
  >
    <div class="d-flex status-wrap mb-30">
      <div v-for="status in trafficStatus" :key="status.title" class="status-content">
        <span class="mb-1 d-block font-sm text-muted">{{ status.title }}</span>
        <div class="d-flex justify-content-between align-items-bottom">
          <h4 class="mb-0 fw-bold">{{ status.count }}</h4>
          <i class="zmdi font-lg" :class="[status.icon, status.color]" />
        </div>
      </div>
    </div>
    <overall-traffic-chart :width="400" :height="130" />
  </app-card>
</template>

<script>
import OverallTrafficChart from 'Components/Charts/OverallTrafficChart'

export default {
  components: {
    OverallTrafficChart
  },
  data() {
    return {
      trafficStatus: [
        {
          title: 'Online Sources',
          count: '3500',
          icon: 'zmdi-long-arrow-up',
          color: 'text-primary'
        },
        {
          title: 'Today',
          count: '170,20',
          icon: 'zmdi-long-arrow-up',
          color: 'text-primary'
        },
        {
          title: 'Last Month%',
          count: '20.30%',
          icon: 'zmdi-long-arrow-down',
          color: 'text-danger'
        }
      ]
    }
  }
}
</script>
