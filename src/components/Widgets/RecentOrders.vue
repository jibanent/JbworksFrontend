<template>
  <app-card heading-menu="true" :heading="$t('message.recentOrderAndStatus')" :full-block="true">
    <vue-perfect-scrollbar :settings="settings" style="height:450px">
      <div class="table-responsive recent-order">
        <table class="table table-striped custom-table">
          <thead>
            <tr>
              <th>{{ $t('message.orderID') }}</th>
              <th>{{ $t('message.orderName') }}</th>
              <th>{{ $t('message.orderCreateDate') }}</th>
              <th>{{ $t('message.orderDate') }}</th>
              <th>{{ $t('message.orderAmount') }}</th>
              <th>{{ $t('message.orderCompanion') }}</th>
              <th>{{ $t('message.orderStatus') }}</th>
              <th class="text-right">{{ $t('message.orderAction') }}</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="order in recentOrders" :key="order.id">
              <td>#{{ order.orderId }}</td>
              <td>
                <img class="img-fluid rounded-circle user-img" :src="order.userAvatar" width="40" height="40">
                <span class="d-inline-block">{{ order.userName }}</span>
              </td>
              <td>{{ order.date }}</td>
              <td>{{ order.shipDate }}</td>
              <td><span class="badge" :class="`badge-${order.color}`">{{ order.payment }}</span></td>
              <td>{{ order.trackingId }}</td>
              <td>
                <b-progress :value="order.status" height="5px" :variant="getProgressColor(order.status)" />
              </td>
              <td class="table-action d-flex justify-content-end">
                <a href="javascript:;" class="icon-btn text-muted"><i class="zmdi zmdi-check" /></a>
                <a href="javascript:;" class="icon-btn text-muted"><i class="zmdi zmdi-edit" /></a>
                <a href="javascript:;" class="icon-btn text-muted"><i class="zmdi zmdi-delete" /></a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </vue-perfect-scrollbar>
  </app-card>
</template>

<script>
import { recentOrders } from 'Assets/data/recentOrders.js'

export default {
  data() {
    return {
      headers: [
        {
          text: 'Order Id',
          align: 'center',
          sortable: false,
          value: 'id'
        },
        {
          text: 'Product Name',
          align: 'center',
          sortable: false,
          value: 'productName'
        },
        {
          text: 'Quantity',
          align: 'center',
          sortable: false,
          value: 'quantity'
        },
        {
          text: 'Status',
          align: 'center',
          sortable: false,
          value: 'status'
        },
        {
          text: 'Amount',
          align: 'center',
          sortable: false,
          value: 'amount'
        },
        {
          text: 'Companion',
          align: 'center',
          sortable: false
        }
      ],
      recentOrders,
      settings: {
        maxScrollbarLength: 300
      }
    }
  },
  methods: {
    getProgressColor(value) {
      let color = ''
      if (value < 30) {
        color = 'danger'
      } else if (value < 60 && value > 30) {
        color = 'warning'
      } else if (value > 60) {
        color = 'success'
      } else {
        color = 'danger'
      }
      return color
    }
  }
}
</script>
