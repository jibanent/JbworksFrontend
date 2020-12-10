<template>
  <div class="search-wrap">
    <b-form-input v-model="search" type="text" required :placeholder="placeholder" class="search-input" />
    <span class="search-icon">
      <i class="zmdi zmdi-search" />
    </span>
  </div>
</template>
<script>
export default {
  data: function() {
    return {
      placeholder:  this.$t("message.searchForm"),
      search: ''
    }
  }
}
</script>