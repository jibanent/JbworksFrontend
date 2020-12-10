<template>
  <app-card custom-classes="top-buyers h-100" :heading="$t('message.topBuyers')" :heading-menu="true" :full-block="true">
    <vue-perfect-scrollbar :settings="settings" style="height:330px">
      <b-list-group>
        <b-list-group-item
          v-for="(buyers, index) in topBuyers"
          :key="index"
          class="d-flex align-items-center py-10 px-20 top-buyers h-100"
        >
          <div class="w-80 d-flex align-items-center">
            <div class="avatar-wrap">
              <img class="rounded-circle" :src="buyers.img" width="45" height="45">
            </div>
            <div class="text-content">
              <h5 class="mb-0 ">{{ buyers.name }}</h5>
              <span class="text-danger font-xs">{{ buyers.orders }}</span>
            </div>
          </div>
          <div class="w-20  text-right">
            <span class="font-sm">{{ buyers.price }}</span>
          </div>
        </b-list-group-item>
      </b-list-group>
    </vue-perfect-scrollbar>
    <div class="py-3 px-4 view-more-wrap">
      <b-button variant="primary" class="btn-sm text-capitalize">view all</b-button>
    </div>
  </app-card>
</template>

<script>
import { topBuyers } from 'Assets/data/topBuyers.js'

export default {
  data() {
    return {
      topBuyers,
      settings: {
        maxScrollbarLength: 100
      }
    }
  }
}
</script>
