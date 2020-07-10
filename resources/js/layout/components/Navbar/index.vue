<template>
  <div class="nav" @click="toggleBodyClass">
    <span class="icon"></span>
  </div>
</template>

<script>
export default {
  name: "navbar",
  methods: {
    toggleBodyClass() {
      const element = document.body;
      if (element.classList.contains("screen-full")) {
        element.classList.remove("screen-full");
      } else {
        element.classList.add("screen-full");
      }
    }
  }
};
</script>

<style>
</style>
