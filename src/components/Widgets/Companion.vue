<template>
  <app-card heading-menu="true" :full-block="true">
    <vue-perfect-scrollbar :settings="settings" style="height:450px">
      <div class="table-responsive companion-data">
        <table class="table table-striped custom-table">
          <thead>
            <tr>
              <th>{{ $t('message.companionID') }}</th>
              <th>{{ $t('message.companionAva') }}</th>
              <th>{{ $t('message.companionName') }}</th>
              <th>{{ $t('message.companionCreat') }}</th>
              <th>{{ $t('message.companionamount') }}</th>
            </tr>
          </thead>
          <tbody>            
            <tr v-for="companion in companionData" :key="companion.id">              
              <td>#{{ companion.companionId }}</td>
              <td>
                <img class="img-fluid rounded-circle user-img" :src="companion.userAvatar" width="40" height="40">
              </td>
              <td>{{ companion.companionName }}</td>
              <td>{{ companion.date }}</td>
              <td><span class="badge">{{ companion.amount }}</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </vue-perfect-scrollbar>
  </app-card>
</template>

<script>
import { companionData } from 'Assets/data/Companion.js'

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
      companionData,
      settings: {
        maxScrollbarLength: 300
      }
    }
  }
}
</script>
