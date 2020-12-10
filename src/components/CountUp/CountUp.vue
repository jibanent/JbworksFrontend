<template>
  <i-count-up
    :start-val="startVal"
    :end-val="endVal"
    :decimals="decimals"
    :duration="duration"
    :options="counterOptions"
  />
</template>

<script>
import ICountUp from 'vue-countup-v2'

export default {
  components: {
    ICountUp
  },
  props: ['decimals', 'startVal', 'endVal', 'duration'],
  data() {
    return {
      counterOptions: {
        useEasing: true,
        useGrouping: true,
        separator: ',',
        decimal: '.',
        prefix: '',
        suffix: ''
      }
    }
  }
}
</script>
