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
          <tr v-for="row in taxRatesDetails" :key="row.id">
            <td>{{ row.date }}</td>
            <td>{{ row.account }}</td>
            <td>
              <b-badge :variant="row.TypeColor">{{ row.type }}</b-badge>
            </td>
            <td>{{ row.amount }}</td>
            <td>{{ row.credit }}</td>
            <td>{{ row.balance }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import { taxRatesDetails } from 'Assets/data/taxRatesDetails.js'

export default {
  data() {
    return {
      headers: [
        {
          text: 'Date',
          sortable: false,
          value: 'Date'
        },
        {
          text: 'Account',
          sortable: false,
          value: 'Account'
        },
        {
          text: 'Type',
          sortable: false,
          value: 'Type'
        },
        {
          text: 'Amount',
          sortable: false,
          value: 'Amount'
        },
        {
          text: 'Credit',
          sortable: false,
          value: 'Credit	'
        },
        {
          text: 'Balance',
          sortable: false,
          value: 'Balance'
        }
      ],
      taxRatesDetails
    }
  }
}
</script>
