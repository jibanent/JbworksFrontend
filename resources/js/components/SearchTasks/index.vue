<template>
  <div class="search">
    <div class="input">
      <input
        placeholder="Tìm kiếm công việc"
        :value="search"
        @keyup.enter="handleSearchTasks"
      />
    </div>
  </div>
</template>

<script>
export default {
  name: "search-tasks",
  props: {
    search: { type: String }
  },
  methods: {
    handleSearchTasks(e) {
      const search = e.target.value;
      this.$emit("searchTasks", search);
    }
  }
};
</script>

<style></style>
