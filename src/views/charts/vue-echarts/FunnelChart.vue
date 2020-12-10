<template>
  <div class="overflw-hidden">
    <ECharts :options="funnel" style="width:100%; height:300px" auto-resize />
  </div>
</template>

<script>
import ECharts from 'vue-echarts'
import 'echarts/lib/chart/funnel'
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
      funnel: {
        tooltip: {
          trigger: 'item'
        },
        legend: {
          data: [
            'Product A',
            'Product B',
            'Product C',
            'Product D',
            'Product E'
          ]
        },
        calculable: true,
        color: [primary, danger, info, success, warning],
        series: [
          {
            name: 'Sales',
            type: 'funnel',
            left: '10%',
            top: 60,
            bottom: 60,
            width: '80%',
            min: 0,
            max: 100,
            minSize: '0%',
            maxSize: '100%',
            sort: 'descending',
            gap: 2,
            label: {
              normal: {
                show: true,
                position: 'inside'
              },
              emphasis: {
                textStyle: {
                  fontSize: 20
                }
              }
            },
            labelLine: {
              normal: {
                length: 10,
                lineStyle: {
                  width: 1,
                  type: 'solid'
                }
              }
            },
            itemStyle: {
              normal: {
                borderColor: white,
                borderWidth: 1
              }
            },
            data: [
              { value: 60, name: 'Product A' },
              { value: 40, name: 'Product B' },
              { value: 20, name: 'Product C' },
              { value: 80, name: 'Product D' },
              { value: 100, name: 'Product E' }
            ]
          }
        ]
      }
    }
  }
}
</script>
