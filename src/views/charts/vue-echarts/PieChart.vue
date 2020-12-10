<template>
  <div class="">
    <ECharts :options="pie" style="width:100%; height:300px" auto-resize />
  </div>
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
    const { primary, danger, warning, white } = ChartConfig.color
    return {
      pie: {
        backgroundColor: white,
        tooltip: {
          trigger: 'item',
          formatter: '{a} <br/>{b} : {c} ({d}%)'
        },
        avoidLabelOverlap: false,
        color: [primary, danger, warning],
        series: [
          {
            name: 'Product Sales',
            type: 'pie',
            radius: '55%',
            center: ['50%', '50%'],
            data: [
              {
                value: 700,
                name: 'Product A'
              },
              {
                value: 300,
                name: 'Product B'
              },
              {
                value: 247,
                name: 'Product C'
              }
            ],
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
