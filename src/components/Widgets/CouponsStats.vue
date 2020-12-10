<template>
  <vue-perfect-scrollbar :settings="settings" style="height:439px">
    <div class="table-responsive">
      <table class="table table-striped custom-table">
        <thead>
          <tr>
            <th>Coupon Code</th>
            <th>Title</th>
            <th>Added on</th>
            <th>Expired on</th>
            <th>Status</th>
            <th>Count</th>
            <th class="text-right">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(data, index) in couponsStats" :key="index">
            <td class="fw-semi-bold">{{ data.couponCode }}</td>
            <td>{{ data.title }}</td>
            <td>{{ data.addedOn }}</td>
            <td>{{ data.expiredOn }}</td>
            <td>
              <b-badge :variant="data.color">{{ data.status }}</b-badge>
            </td>
            <td>1450</td>
            <td class="table-action d-flex justify-content-end">
              <a href="javascript:;" class="icon-btn text-muted"><i class="zmdi zmdi-check" /></a>
              <a href="javascript:;" class="icon-btn text-muted"><i class="zmdi zmdi-edit" /></a>
              <a href="javascript:;" class="icon-btn text-muted "><i class="zmdi zmdi-delete" /></a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </vue-perfect-scrollbar>
</template>

<script>
import { couponsStats } from 'Assets/data/couponsStats.js'

export default {
  data() {
    return {
      couponsStats,
      settings: {
        maxScrollbarLength: 300
      }
    }
  }
}
</script>
