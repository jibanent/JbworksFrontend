<template>
  <div>
    <h1>Page Not Found</h1>
    <button v-on:click="back">Back</button>
  </div>
</template>

<script>
export default {
  methods: {
    back() {
      this.$router.push("/reports");
    }
  }
};
</script>

<style></style>
