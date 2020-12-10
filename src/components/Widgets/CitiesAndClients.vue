<template>
  <app-card :heading="$t('message.citiesAndClients')" :heading-menu="true" :full-block="true">
    <vue-perfect-scrollbar :settings="settings" style="height:439px">
      <b-list-group>
        <b-list-group-item v-for="(data, index) in citiesAndClients" :key="index" class="py-15 px-20">
          <div class="d-flex justify-content-between mb-20">
            <h6 class="mb-0">{{ data.name }}</h6>
            <span class="fs-12 text-muted">{{ data.percentage }}</span>
          </div>
          <b-progress height="6px" :value="data.value" :variant="data.color" />
        </b-list-group-item>
      </b-list-group>
    </vue-perfect-scrollbar>
  </app-card>
</template>

<script>
import { citiesAndClients } from 'Assets/data/citiesAndClients.js'

export default {
  data() {
    return {
      citiesAndClients,
      settings: {
        maxScrollbarLength: 100
      }
    }
  }
}
</script>
