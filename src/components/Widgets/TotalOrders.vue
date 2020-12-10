<template>
  <app-card
    app-card-class="h-100"
    custom-classes="gradient-purple overflow-hide h-100"
    content-custom-class="h-100 d-flex flex-column justify-content-between chart-card"
  >
    <h5 class="mb-20">{{ $t('message.totalOrders') }}</h5>
    <div class="d-flex align-items-end">
      <div class="w-50 chart-content">
        <h2 class="card-count mb-15">
          <count-up :start-val="0" :end-val="4100" :decimals="0" :duration="10" />
        </h2>
        <p class="m-0 card-status">{{ $t('message.newOrdersToday') }}</p>
      </div>
      <div class="w-50  app-chart overflow-hide">
        <total-orders-mini-chart :width="160" :height="100" />
      </div>
    </div>
  </app-card>
</template>

<script>
import TotalOrdersMiniChart from 'Components/Charts/TotalOrdersMiniChart'

export default {
  components: {
    TotalOrdersMiniChart
  }
}
</script>
