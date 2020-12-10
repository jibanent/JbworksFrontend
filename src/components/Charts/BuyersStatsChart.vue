<template>
  <app-card
    app-card-class="h-100 d-flex flex-column justify-content-between "
    :heading="$t('message.buyersStats')"
    heading-menu="true"
    footer-classes="p-0"
    :enable-footer="true"
    custom-classes="buyers-stats overflow-hide h-100"
  >
    <ECharts :options="pie" style="width:100%; height:270px" auto-resize />
    <ul slot="footer" class="footer-border border-0">
      <li v-for="(stats, index) in buyersStats" :key="index" class="w-33">
        <h5 class="font-weight-bold mb">{{ stats.count }}</h5>
        <span class="font-xs">{{ stats.gender }}</span>
      </li>
    </ul>
  </app-card>
</template>

<script>
import ECharts from 'vue-echarts'
import 'echarts/lib/chart/pie'
import 'echarts/lib/component/title'
import ChartConfig from 'Constants/ChartConfig'

export default {
  components: {
    ECharts
  },
  data() {
    return {
      buyersStats: [
        {
          count: '1,00,000',
          gender: 'Male Buyers'
        },
        {
          count: '1,10,000',
          gender: 'Female Buyers'
        },
        {
          count: '56,000',
          gender: 'Kids Buyers'
        }
      ],
      pie: {
        backgroundColor: 'transparent',
        tooltip: {
          trigger: 'item',
          formatter: '{a} <br/>{b} : {c} ({d}%)'
        },
        avoidLabelOverlap: false,
        color: [
          ChartConfig.color.warning, ChartConfig.color.info, ChartConfig.color.primary
        ],
        series: [
          {
            name: 'Buyers Stats',
            type: 'pie',
            radius: '55%',
            center: ['50%', '50%'],
            data: [
              {
                value: 100000,
                name: 'Male'
              },
              {
                value: 110000,
                name: 'Female'
              },
              {
                value: 56000,
                name: 'Kids'
              }
            ],
            roseType: 'radius',
            label: {
              normal: {
                textStyle: {
                  color: 'rgba(0, 0, 0, 1)'
                }
              }
            },
            itemStyle: {
              normal: {
                shadowColor: 'rgba(0, 0, 0, 0.5)'
              }
            },
            animationType: 'scale',
            animationEasing: 'elasticOut',
            animationDelay: function(idx) {
              return Math.random() * 20
            }
          }
        ]
      }
    }
  }
}
</script>
