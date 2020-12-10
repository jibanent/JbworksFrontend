<template>
  <div>
    <app-card>
      <div class="layout justify-content-between">
        <div class="align-items-center d-flex mb-3">
          <div class="crypto-icon-wrap inline-block mr-3 font-2x">
            <i :class="icon" title="BCN" />
          </div>
          <div class="inline-block">
            <h3 class="mb-0">{{ heading }}</h3>
          </div>
        </div>
      </div>
      <slot />
      <div class="chart-info d-flex align-items-center justify-content-between pt-3">
        <div class="fs-14 bg-grey rounded p-1 px-2 d-inline-block">last 4 days</div>
        <div :class="color"><i class="zmdi zmdi-long-arrow-up mr-2" />2.3%</div>
      </div>
    </app-card>
  </div>
</template>

<script>
export default {
  props: ['heading', 'icon', 'color']
}
</script>
