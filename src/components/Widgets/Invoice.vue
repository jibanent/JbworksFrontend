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
          <tr v-for="row in invoiceList" :key="row.id">
            <td>{{ row.id }}</td>
            <td class="fw-semi-bold">{{ row.firstName }} {{ row.lastName }}</td>
            <td>
              <b-badge :variant="row.typeColor">{{ row.accountType }}</b-badge>
            </td>
            <td>{{ row.dateCreated }}</td>
            <td>{{ row.dueDate }}</td>
            <td>{{ row.amount }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import { invoiceList } from 'Assets/data/invoices.js'

export default {
  data() {
    return {
      invoiceList,
      headers: [
        {
          text: 'Invoice Id',
          sortable: false,
          value: 'id'
        },
        {
          text: 'Client Name',
          sortable: false,
          value: 'firstName lastName'
        },
        {
          text: 'Account Type',
          sortable: false,
          value: 'accountType'
        },
        {
          text: 'Date Created',
          sortable: false,
          value: 'dateCreated'
        },
        {
          text: 'Due Date',
          sortable: false,
          value: 'dueDate'
        },
        {
          text: 'Amount',
          sortable: false,
          value: 'amount'
        }
      ]
    }
  }
}
</script>
