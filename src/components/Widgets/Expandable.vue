<template>
  <div role="tablist" class="mktcap-tab-list">
    <template v-for="(details,index) in marketCapDetails">
      <b-card no-body class="mb-3 border-0">
        <b-card-header header-tag="header" class="py-0 px-3 border-0" role="tab">
          <div v-b-toggle="'accordion-'+details.sr_no" block>
            <div class="mktcap-wrap">
              <div class="mktcap-title"> {{ details.sr_no }}</div>
              <div class="mktcap-title">{{ details.currency }}</div>
              <div class="mktcap-title">{{ details.market_cap }}</div>
              <div class="mktcap-title">{{ details.price }}</div>
              <div class="mktcap-title">{{ details.volume }}</div>
              <div class="mktcap-title">{{ details.change }}</div>
              <div class="mktcap-title">{{ details.more }}<i class="zmdi zmdi-chevron-down font-lg" /></div>
            </div>
          </div>
        </b-card-header>

        <b-collapse :id="'accordion-'+details.sr_no" visible accordion="my-accordion">
          <b-card-body>
            <div class="mb-4">
              <b-btn variant="primary" class="mr-2 text-capitalize" @click="showYearly()">Yearly</b-btn>
              <b-btn variant="danger" class="mr-2 text-capitalize" @click="showMonthly()">Monthly</b-btn>
              <b-btn variant="info" class="mr-2 text-capitalize" @click="showWeekly()">Weekly</b-btn>
            </div>
            <LineChartV3
              v-show="selectedBtn == 'yearly'"
              style="height: 500px;"
              :data-set="[10, 65, 40, 150, 40, 85, 30]"
            />

            <LineChartV3
              v-show="selectedBtn == 'monthly'"
              style="height: 500px;"
              :data-set="[0, 65, 40,0,40,85,0]"
            />

            <LineChartV3
              v-show="selectedBtn == 'weekly'"
              style="height: 500px;"
              :data-set="[60, 25, 150,60,100,5,60]"
            />
          </b-card-body>
        </b-collapse>
      </b-card>
    </template> </div>
</template>
<script>
import LineChartV3 from 'Components/Charts/LineChartV3'
import { marketCapDetails } from 'Views/crypto/data.js'

export default {
  components: {
    LineChartV3
  },
  data() {
    return {
      marketCapDetails,
      selectedBtn: 'yearly',
      yearly: [10, 65, 40, 150, 40, 85, 30],
      monthly: [0, 65, 40, 0, 40, 85, 0],
      weekly: [60, 25, 150, 60, 100, 5, 60]
    }
  },
  methods: {
    showYearly() {
      this.selectedBtn = 'yearly'
    },
    showMonthly() {
      this.selectedBtn = 'monthly'
    },
    showWeekly() {
      this.selectedBtn = 'weekly'
    }
  }
}
</script>
