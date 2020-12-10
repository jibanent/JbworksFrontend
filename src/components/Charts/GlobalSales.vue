<template>
  <ECharts :options="map" style="width:100%; height:300px" />
</template>

<script>
import ECharts from 'vue-echarts/components/ECharts.vue'
import 'echarts/lib/chart/map'
import 'echarts/map/js/world'

export default {
  name: 'BuyersStats',
  components: {
    ECharts
  },
  data() {
    return {
      map: {
        tooltip: {
          trigger: 'item',
          formatter: '{b}'
        },
        visualMap: {
          min: 0,
          max: 10000,
          text: ['High', 'Low'],
          realtime: false,
          calculable: true,
          inRange: {
            color: ['#787878', '#505050', '#383838']
          }
        },
        series: [
          {
            name: 'Global Sales',
            type: 'map',
            mapType: 'world',
            roam: true,
            itemStyle: {
              emphasis: {
                label: {
                  show: false
                }
              }
            },
            data: [
              { name: 'United States', value: 8000 },
              { name: 'Russia', value: 900 },
              { name: 'Argentina', value: 200 },
              { name: 'Armenia', value: 100 },
              { name: 'India', value: 6000 },
              { name: 'Brazil', value: 2000 },
              { name: 'Greenland', value: 4000 }
            ]
          }
        ]
      }
    }
  }
}
</script>
