<template>
  <div class="filter">
    <div class="label">{{ $t('projects.display') }}</div>
    <div class="dd">
      <div class="li" :class="{active: params.active}" @click="handleFilterByActive(1)">{{ $t('projects.active') }}</div>
      <div class="li" :class="{active: !params.active}" @click="handleFilterByActive(0)">{{ $t('projects.closed') }}</div>
    </div>
  </div>
</template>

<script>
export default {
  name: "projects-active-filter",
  props: {
    params: { type: Object, default: null}
  },
  methods: {
    handleFilterByActive(active) {
      this.$emit("filterByActive", active);
    }
  }
};
</script>

<style>
</style>
