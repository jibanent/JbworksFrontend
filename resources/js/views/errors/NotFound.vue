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
      console.log(this.$router);
      this.$router.push('/reports')
    }
  },
  watch: {
    '$route' (to, from) {
      console.log(to);
      console.log(from);

    }
  },
};
</script>

<style></style>
