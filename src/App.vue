<template>
  <div id="app">
    <component :is="layout">
      <router-view :layout.sync="layout" />
    </component>
  </div>
</template>

<script>
import AppConfig from 'Constants/AppConfig'
export default {
  name: 'App',
  computed: {
    layout() {
      return this.$route.meta.layout || 'div'
    }
  }
}
</script>
