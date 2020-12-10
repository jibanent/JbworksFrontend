<template>
  <v-tour name="vuelyTour" :steps="steps" />
</template>

<script>
export default {
  data() {
    return {
      steps: [
        {
          target: '.v-step-0',
          content: 'Use this to collapse sidebar.'
        },
        {
          target: '.v-step-1',
          content: 'Enjoying Search box with sugestion and many more things.'
        },
        {
          target: '.v-step-2',
          content: 'Toggle Full Screen Mode'
        }
      ]
    }
  }
}
</script>
