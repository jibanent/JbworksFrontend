<template>
  <div class="overflw-hidden">
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
    const {
      primary,
      danger,
      info,
      success,
      warning,
      white
    } = ChartConfig.color
    return {
      pie: {
        backgroundColor: white,
        tooltip: {
          trigger: 'item',
          formatter: '{a} <br/>{b} : {c} ({d}%)'
        },
        color: [primary, danger, info, success, warning],
        series: [
          {
            name: 'Product Sales',
            type: 'pie',
            radius: ['50%', '70%'],
            avoidLabelOverlap: false,
            data: [
              {
                value: 1548,
                name: 'Product A'
              },
              {
                value: 310,
                name: 'Product B'
              },
              {
                value: 234,
                name: 'Product C'
              },
              {
                value: 135,
                name: 'Product D'
              },
              {
                value: 335,
                name: 'Product E'
              }
            ],
            label: {
              normal: {
                show: false,
                position: 'center'
              },
              emphasis: {
                show: true,
                textStyle: {
                  fontSize: '30',
                  fontWeight: 'bold'
                }
              }
            },
            labelLine: {
              normal: {
                show: false
              }
            }
          }
        ]
      }
    }
  }
}
</script>
