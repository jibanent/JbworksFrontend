<template>
  <div class="recent-trades">
    <vue-perfect-scrollbar :settings="settings" style="height:450px">
      <div class="table-responsive">
        <table class="table table-striped custom-table">
          <thead>
            <tr>
              <th v-for="(header,index) in headers" :key="index">
                {{ header.text }}
              </th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(row,index) in recentTrade" :key="index">
              <td><i class="font-lg" :class="row.currencyIcon" /></td>
              <td><span :class="row.statusClass">{{ row.status }}</span></td>
              <td>{{ row.price }}</td>
              <td>{{ row.total }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </vue-perfect-scrollbar>
    <div class="mt-4 action-wrap">
      <div class="mb-2">Overall Profit : <i class="fa fa-plus text-success px-1"> $35237 </i></div>
      <div class="mb-3">Overall Loss : <i class="fa fa-minus text-danger px-1"> $200 </i></div>
      <b-button variant="primary" class="text-capitalize">download CSV</b-button>
    </div>
  </div>
</template>

<script>
import { recentTrade } from 'Assets/data/recentTrades.js'

export default {
  data() {
    return {
      settings: {
        maxScrollbarLength: 100
      },
      recentTrade,
      headers: [
        {
          text: 'Currency',
          sortable: false,
          value: 'currency'
        },
        {
          text: 'Status',
          sortable: false,
          value: 'status'
        },
        {
          text: 'Price',
          sortable: false,
          value: 'price'
        },
        {
          text: 'Total($)',
          sortable: false,
          value: 'total($)'
        }
      ],
      active: null
    }
  }
}
</script>
