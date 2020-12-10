<template>
  <app-card
    app-card-class="h-100"
    custom-classes="gradient-primary overflow-hide h-100"
    content-custom-class="h-100 d-flex flex-column justify-content-between chart-card"
  >
    <h5 class="mb-20">{{ $t('message.totalRevenue') }}</h5>
    <div class="d-flex align-items-end">
      <div class="w-40 chart-content">
        <h2 class="card-count mb-15">
          <count-up :start-val="0" :end-val="256" :decimals="0" :duration="10" />
        </h2>
        <p class="mb-0 card-status">{{ $t('message.revenueToday') }}</p>
      </div>
      <div class="w-60 app-chart overflow-hide">
        <revenue-mini-chart :width="100" :height="50" />
      </div>
    </div>
  </app-card>
</template>

<script>
import RevenueMiniChart from 'Components/Charts/RevenueMiniChart'

export default {
  components: {
    RevenueMiniChart
  }
}
</script>
