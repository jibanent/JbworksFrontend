<template>
  <div class="exchange-statistics">
    <slick :options="slickOptions">
      <div v-for="(item,index) in exchangeStatistic" :key="index">
        <div class="row mb-2">
          <div class="col-lg-4">
            <div class="crypto-icon-wrap">
              <i :class="item.icon1" />
              <i :class="item.icon2" />
            </div>
          </div>
          <div class="col-lg-8">
            <div class="crypto-content ml-auto">
              <div class="crypto-text-wrap mb-3">
                <span>{{ item.icon1_name }}</span>
                <span class="px-2">/</span>
                <span>{{ item.icon2_name }}</span>
              </div>
              <div class="crypto-result-price">
                <div class=" mb-2 d-flex justify-content-between align-items-center">
                  <span class="fw-semi-bold">Price :</span>
                  <span>{{ item.price }}</span>
                </div>
                <div class="mb-2 d-flex justify-content-between align-items-start">
                  <span class="fw-semi-bold">Volume :</span>
                  <span>{{ item.volume }} <span
                    class="text-success d-block mt-2"
                  >{{ item.percentage }}%</span></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <line-chart-v5
          label="Statistics"
          :chartdata="item.data"
          :labels="item.chartLabel"
          :point-background-color="ChartConfig.color.primary"
          :height="90"
          :point-border-color="ChartConfig.color.white"
          :border-width="4"
          :show-grid-lines="false"
          :enable-gradient="false"
          :enable-shadow="true"
          shadow-color="#1565c0"
          :border-color="ChartConfig.color.primary"
        />
      </div>
    </slick>
  </div>
</template>
<script>
import Slick from 'vue-slick'
import { exchangeStatistic } from 'Views/crypto/data.js'
import LineChartV5 from 'Components/Charts/LineChartV5'
import ChartConfig from 'Constants/ChartConfig'

export default {
  components: {
    Slick,
    LineChartV5
  },
  data() {
    return {
      ChartConfig,
      exchangeStatistic,
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
        rtl: this.$store.getters.rtlLayouts
      }
    }
  }
}
</script>
