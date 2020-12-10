<template>
  <div class="overflw-hidden">
    <ECharts :options="pie" style="width:100%; height:290px" auto-resize />
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
    return {
      pie: {
        backgroundColor: 'transparent',
        color: [
          ChartConfig.color.primary, ChartConfig.color.danger, ChartConfig.color.warning
        ],
        series: [
          {
            name: 'Server Load',
            type: 'pie',
            radius: ['50%', '70%'],
            avoidLabelOverlap: false,
            data: [
              {
                value: 500,
                name: '50%'
              },
              {
                value: 350,
                name: '35%'
              },
              {
                value: 150,
                name: '364mb'
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
                  fontSize: '24',
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
