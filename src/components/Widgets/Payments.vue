<template>
  <div>
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
          <tr v-for="row in paymentDetails" :key="row.id">
            <td>{{ row.payid }}</td>
            <td class="fw-semi-bold">{{ row.firstName }} {{ row.lastName }}</td>
            <td>
              <b-badge :variant="row.typeColor">{{ row.paymentType }}</b-badge>
            </td>
            <td>{{ row.paidDate }}</td>
            <td>{{ row.amount }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import { paymentDetails } from 'Assets/data/paymentDetails.js'

export default {
  data() {
    return {
      headers: [
        {
          text: 'Payment Id',
          sortable: false,
          value: 'Payment Id'
        },
        {
          text: 'Client Name	',
          sortable: false,
          value: 'Client Name	'
        },
        {
          text: 'Payment Type',
          sortable: false,
          value: 'Payment Type'
        },
        {
          text: 'Paid Date',
          sortable: false,
          value: 'Paid Date'
        },
        {
          text: 'Amount',
          sortable: false,
          value: 'Amount'
        }
      ],
      paymentDetails
    }
  }
}
</script>
