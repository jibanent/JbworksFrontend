<template>
  <div v-if="status" class="loader-overlay">
    <spinner :loading="true" :size="43" :depth="3.5" color="#5D92F4" />
  </div>
</template>

<script>
export default {
  props: ['status']
}
</script>
