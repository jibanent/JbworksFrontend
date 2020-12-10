<template>
  <div id="responsive-table">
    <app-card custom-classes="grid-b-space" :heading="$t('message.tasktype')">
      <list-view />
    </app-card>
  </div>
</template>

<script>
import listView from './list-view'
export default {
  components: {
    listView
  }
}
</script>