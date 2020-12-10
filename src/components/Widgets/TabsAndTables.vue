<template>
  <app-card custom-classes="grid-b-space tabs-table-wrap">
    <b-tabs>
      <b-tab :title="$t('message.transactionList')" active>
        <div class="table-responsive">
          <table class="table table-striped custom-table">
            <thead>
              <tr>
                <th v-for="(header,index) in headersForTransactionList" :key="index">
                  {{ header.text }}
                </th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(row,index) in tabsAndTableDetails.transactionListDetails" :key="index">
                <td>{{ row.transid }}</td>
                <td>{{ row.date }}</td>
                <td>{{ row.account }}</td>
                <td>
                  <b-badge :variant="row.typeColor">{{ row.type }}</b-badge>
                </td>
                <td>{{ row.amount }}</td>
                <td>{{ row.debit }}</td>
                <td>{{ row.credit }}</td>
                <td>{{ row.balance }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </b-tab>
      <b-tab :title="$t('message.transferReport')">
        <div class="table-responsive">
          <table class="table table-striped custom-table">
            <thead>
              <tr>
                <th v-for="(header,index) in headersForTransferReport" :key="index">
                  {{ header.text }}
                </th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(row,index) in tabsAndTableDetails.transferReport" :key="index">
                <td>{{ row.transid }}</td>
                <td>{{ row.date }}</td>
                <td>{{ row.account }}</td>
                <td>
                  <b-badge :variant="row.typeColor">{{ row.type }}</b-badge>
                </td>
                <td>{{ row.amount }}</td>
                <td>{{ row.balance }}</td>
                <td>
                  <b-badge :variant="row.statusColor">
                    {{ row.status }}
                  </b-badge>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </b-tab>
      <b-tab :title="$t('message.expenseCategory') ">
        <div class="table-responsive">
          <table class="table table-striped custom-table">
            <thead>
              <tr>
                <th v-for="(header,index) in headersForExpenseCategory" :key="index">
                  {{ header.text }}
                </th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(row,index) in tabsAndTableDetails.expenseCategoryDetails" :key="index">
                <td>{{ row.itmNo }}</td>
                <td>{{ row.date }}</td>
                <td>
                  <b-badge :variant="row.typeColor">{{ row.type }}</b-badge>
                </td>
                <td>{{ row.description }}</td>
                <td>{{ row.amount }}</td>
                <td>
                  <b-badge :variant="row.statusColor">
                    {{ row.status }}
                  </b-badge>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </b-tab>
    </b-tabs>
  </app-card>
</template>

<script>
import { tabsAndTableDetails } from 'Assets/data/tabsAndTablesData.js'

export default {
  data() {
    return {
      tabsAndTableDetails,
      headersForTransactionList: [
        {
          text: 'Transaction Id',
          sortable: false,
          value: 'transaction Id'
        },
        {
          text: 'Date',
          sortable: false,
          value: 'date'
        },
        {
          text: 'Account',
          sortable: false,
          value: 'account'
        },
        {
          text: 'Type',
          sortable: false,
          value: 'type'
        },
        {
          text: 'Amount',
          sortable: false,
          value: 'amount'
        },
        {
          text: 'Debit',
          sortable: false,
          value: 'debit'
        },
        {
          text: 'Credit',
          sortable: false,
          value: 'credit'
        },
        {
          text: 'Balance',
          sortable: false,
          value: 'balance'
        }
      ],

      headersForTransferReport: [
        {
          text: 'Transfer Id',
          sortable: false,
          value: 'transfer Id'
        },
        {
          text: 'Date',
          sortable: false,
          value: 'date'
        },
        {
          text: 'Account',
          sortable: false,
          value: 'account'
        },
        {
          text: 'Type',
          sortable: false,
          value: 'type'
        },
        {
          text: 'Amount',
          sortable: false,
          value: 'amount'
        },
        {
          text: 'Balance',
          sortable: false,
          value: 'balance'
        },
        {
          text: 'Status',
          sortable: false,
          value: 'status'
        }
      ],

      headersForExpenseCategory: [
        {
          text: 'Item No',
          sortable: false,
          value: 'item No'
        },
        {
          text: 'Date',
          sortable: false,
          value: 'date'
        },
        {
          text: 'Type',
          sortable: false,
          value: 'type'
        },
        {
          text: 'Description',
          sortable: false,
          value: 'description'
        },
        {
          text: 'Amount',
          sortable: false,
          value: 'Amount'
        },
        {
          text: 'Status',
          sortable: false,
          value: 'info'
        }
      ]
    }
  }
}
</script>
