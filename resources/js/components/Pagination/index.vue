<template>
  <div class="center apppages" v-if="lastPage > 1">
    <div class="icons">
      <div
        class="prev"
        :class="{ disabled: page <= 1 }"
        @click="handlePagination('prev')"
      >
        <span class="-ap icon-arrow-left2"></span>
      </div>
      <div class="label">{{ $t('common.page number', {page}) }}</div>
      <div
        class="next url"
        :class="{ disabled: page >= lastPage }"
        @click="handlePagination('next')"
      >
        <span class="-ap icon-arrow-right2"></span>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "pagination",
  props: {
    page: { type: Number, default: 1 },
    lastPage: { type: Number, required: true }
  },
  methods: {
    handlePagination(val) {
      this.$emit("pagination", val);
    }
  }
};
</script>

<style></style>
