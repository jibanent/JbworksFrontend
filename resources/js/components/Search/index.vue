<template>
  <div class="search">
    <div class="input">
      <input
        :placeholder="placeholder"
        :value="search"
        @keyup.enter="handleSearch"
      />
    </div>
  </div>
</template>

<script>
export default {
  name: "search",
  props: {
    search: { type: String },
    placeholder: { type: String, default: ''}
  },
  methods: {
    handleSearch(e) {
      const search = e.target.value;
      this.$emit("search", search);
    }
  }
};
</script>

<style></style>
