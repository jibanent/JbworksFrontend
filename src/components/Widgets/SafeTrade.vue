<template>
  <div>
    <slick :options="slickOptions">
      <div v-for="(item,index) in safeTradeContent" :key="index">
        <div class="layout justify-content-between">
          <div class="align-items-center d-flex mb-3">
            <div class="crypto-icon-wrap inline-block mr-3 font-3x">
              <i :class="item.icon" />
            </div>
            <div class="inline-block">
              <h3 class="mb-0">{{ item.name }}</h3>
            </div>
          </div>
        </div>
        <line-chart-shadow-v2
          :data-set="item.data"
          :line-tension="0.4"
          :data-labels="item.chartLabel"
          :width="400"
          :height="80"
          :border-width="3"
          :enable-gradient="false"
          :enable-shadow="true"
          :shadow-color="item.chartBorderColor"
          :border-color="item.chartBorderColor"
        />
        <div class="chart-info d-flex align-items-center justify-content-between py-3 border-bottom mb-3">
          <div class="fs-14 bg-grey rounded p-1 px-2 d-inline-block">last 4 days</div>
          <div :class="item.percentageColor"><i class="mr-2" :class="item.percentageIcon" />2.3%</div>
        </div>
        <div class="subheading"><strong class="text-success">${{ item.market_cap }}</strong> Market Capitalisation
        </div>
      </div>
    </slick>
  </div>
</template>

<script>
import Slick from 'vue-slick'
import { safeTradeContent } from 'Views/crypto/data.js'
import LineChartShadowV2 from 'Components/Charts/LineChartShadowV2'

export default {
  components: {
    Slick,
    LineChartShadowV2
  },
  data() {
    return {
      safeTradeContent,
      slickOptions: {
        infinite: true,
        speed: 1000,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        dots: false,
        fade: false,
        cssEase: 'linear',
        arrows: false,
        rtl: this.$store.getters.rtlLayout

      }
    }
  }
}
</script>
