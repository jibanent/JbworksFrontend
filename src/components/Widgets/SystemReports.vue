<template>
  <app-card
    app-card-class="h-100"
    custom-classes="system-reports h-100"
    :heading="$t('message.systemReports')"
    :heading-menu="true"
    :full-block="true"
  >
    <vue-perfect-scrollbar :settings="settings" class="scroll-length">
      <b-list-group>
        <b-list-group-item
          v-for="(reports, index) in systemReports"
          :key="index"
          class="d-flex align-items-center py-10 px-20 system-reports h-100"
        >
          <div class="w-80 d-flex align-items-center">
            <span>
              <i class="fa fa-file-pdf-o fa-2x text-danger" aria-hidden="true" />
            </span>
            <div class="text-content px-20">
              <h5>{{ reports.name }}</h5>
              <span class="text-muted font-xs">{{ reports.date }}</span>
            </div>
          </div>
          <div class="w-20 d-flex justify-content-end">
            <a href="javascript:;">
              <i class="ti-import" aria-hidden="true" />
            </a>
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
import { systemReports } from 'Assets/data/systemReports.js'

export default {
  data() {
    return {
      systemReports,
      settings: {
        maxScrollbarLength: 100
      }
    }
  }
}
</script>
