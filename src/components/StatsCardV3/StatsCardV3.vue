<template>
  <app-card custom-classes="magazine-stats-card">
    <div>
      <div class="stats-card-title">
        <h3 class="font-weight-normal mb-3">
          <i :class="icon" />
          {{ title }}
        </h3>
      </div>
      <slot />
      <div class="stats-card-chart d-flex justify-content-between align-items-center">
        <p class="mb-0">{{ viewer }}</p>
        <p class="mb-0">Trade: {{ trade }} %</p>
      </div>
    </div>
  </app-card>
</template>

<script>
import LineChart from 'Components/Charts/LineChart'
export default {
  components: {
    LineChart
  },
  props: ['title', 'viewer', 'trade', 'dataSet', 'icon', 'color', 'labels', 'extraClass']
}
</script>
