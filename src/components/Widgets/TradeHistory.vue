<template>
  <div>
    <vue-perfect-scrollbar :settings="settings" style="height:393px">
      <div class="table-responsive">
        <table class="table table-striped crypto-table custom-table">
          <thead>
            <tr>
              <th v-for="(header,index) in headers" :key="index">
                {{ header.text }}
              </th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(row,index) in tradeHistory" :key="index">
              <td><i :class="row.currencyIcon" /></td>
              <td>{{ row.txnno }}</td>
              <td :class="row.statusClass">{{ row.status }}</td>
              <td>{{ row.price }}</td>
              <td>{{ row.total }}</td>
              <td>{{ row.date }}</td>
              <td>{{ row.from }}</td>
              <td><a href="javascript:void(0);"><i v-b-modal="'modal-'+index" class="zmdi zmdi-info" /></a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </vue-perfect-scrollbar>
    <template v-for="(row,index) in tradeHistory">
      <b-modal
        :id="'modal-'+index"
        :key="index"
        class="trade-history-popup"
        centered
        title="Transaction Details"
        :hide-footer="true"
      >
        <p class="mb-4">Transaction with Txn No 76237523 was placed on 21/3/102, 11:10 with Payment done being <span
          class="text-success"
        >Successful</span>.
        </p>
        <div class="mb-20 d-flex align-items-center">
          <span class="fw-semi-bold w-50">Currency : </span><span class="w-50"><i
            :class="row.currencyIcon"
          /></span>
        </div>
        <div class="mb-20 d-flex align-items-center">
          <span class="fw-semi-bold w-50">Payment Currency : </span><span
            class="w-50"
          >{{ row.payment_currency }}</span>
        </div>
        <div class="mb-20 d-flex align-items-center">
          <span class="fw-semi-bold w-50">Price : </span><span class="w-50">{{ row.price }}</span>
        </div>
        <div class="mb-20 d-flex align-items-center">
          <span class="fw-semi-bold w-50">Total : </span><span class="w-50">{{ row.total }}</span>
        </div>
        <div class="mb-20 d-flex align-items-center">
          <span class="fw-semi-bold w-50">To/From : </span><span class="w-50">{{ row.from }}</span>
        </div>
        <div class="mb-20">
          <label>Wallet Address :</label>
          <div class="custom-prepend-input d-flex align-items-center">
            <div class="icon-wrap h-100 d-flex justify-content-center align-items-center"><i
              :class="row.currencyIcon"
            /></div>
            <b-form-input value="AXB35H24ISDJHCISDT" />
          </div>
        </div>
      </b-modal>
    </template>
  </div>
</template>

<script>
import { tradeHistory } from 'Assets/data/tradeHistory.js'

export default {
  data() {
    return {
      settings: {
        maxScrollbarLength: 100
      },
      tradeHistory,
      headers: [
        {
          text: 'Currency',
          sortable: false,
          value: 'currency'
        },
        {
          text: 'Txn No',
          sortable: false,
          value: 'txn No'
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
        },
        {
          text: 'Date',
          sortable: false,
          value: 'date'
        },
        {
          text: 'To / From',
          sortable: false,
          value: 'to / from'
        },
        {
          text: 'More',
          sortable: false,
          value: 'more'
        }
      ],
      active: null
    }
  }
}
</script>
