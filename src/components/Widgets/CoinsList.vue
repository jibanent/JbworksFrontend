<template>
  <div>
    <div class="table-responsive">
      <div class="mb-3">
        <button class="btn btn-primary mr-2" @click="changeBtn('BTC')">BTC</button>
        <button class="btn btn-danger mr-2" @click="changeBtn('ETH')">ETH</button>
        <button class="btn btn-info" @click="changeBtn('EUR')">EUR</button>
      </div>
      <table class="table table-striped custom-table">
        <thead>
          <tr>
            <th v-for="(header,index) in headers" :key="index">
              {{ header.text }}
            </th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(row,index) in selectedCoin" :key="index">
            <td>{{ index }}</td>
            <td>{{ row.desktop_name }}</td>
            <td>{{ row.mobile_name }}</td>
            <td>{{ row.price }}</td>
            <td>{{ row.volume }}</td>
            <td>{{ row.tag }}</td>
            <td>{{ row.total_volume }}</td>
            <td>{{ row.market_cap }}</td>
            <td>{{ row.circulating_supply }}</td>
            <td>
              <b-badge class="badge" :class="`badge-${row.status=='Leading' ? 'success' : 'danger'}`">
                {{ row.status }}</b-badge>
            </td>
            <td>{{ row.change }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import { coinsList } from 'Views/crypto/data.js'
import LineChartShadowV3 from 'Components/Charts/LineChartShadowV3'
import ChartConfig from 'Constants/ChartConfig'

export default {
  components: {
    LineChartShadowV3
  },
  data() {
    return {
      selectedBtn: 'BTC',
      selectedCoin: [],
      ChartConfig,
      labels: ['A', 'B', 'C', 'D', 'E', 'F', 'J', 'K', 'L', 'M', 'N', 'P'],
      coinsList,
      headers: [
        {
          text: 'No',
          align: 'left',
          sortable: false,
          value: 'number'
        },
        {
          text: 'Coins',
          align: 'left',
          sortable: false,
          value: 'coins'
        },
        {
          text: 'Symbol',
          align: 'left',
          sortable: false,
          value: 'symbol'
        },
        {
          text: 'Price',
          align: 'left',
          sortable: false,
          value: 'price'
        },
        {
          text: 'Direct Vol. 24H',
          align: 'left',
          sortable: false,
          value: 'directVolume'
        },
        {
          text: 'Tag',
          align: 'left',
          sortable: false,
          value: 'tag'
        },
        {
          text: 'Total Vol. 24H',
          align: 'left',
          sortable: false,
          value: 'totalVolume'
        },
        {
          text: 'Market Cap',
          align: 'left',
          sortable: false,
          value: 'marketCap'
        },
        {
          text: 'Circulating Supply',
          align: 'left',
          sortable: false,
          value: 'circulatingSupply'
        },
        {
          text: 'Status',
          align: 'center',
          sortable: false,
          value: 'status'
        },
        {
          text: 'Chg. 24H',
          sortable: false,
          value: 'chg'
        }
      ]
    }
  },
  mounted() {
    this.getSelectedCurrency()
  },
  methods: {
    getSelectedCurrency() {
      this.selectedCoin = []
      for (var i = 0; i < coinsList.length; i++) {
        if (coinsList[i].tag == this.selectedBtn) {
          this.selectedCoin.push(coinsList[i])
        }
      }
    },
    changeBtn(value) {
      this.selectedBtn = value
      this.getSelectedCurrency()
    }
  }
}
</script>
