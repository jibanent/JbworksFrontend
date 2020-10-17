<template>
  <div class="icon">
    <img
      :src="`/images/icons/${fileExtension}.png`"
      :alt="`${fileExtension}-icon`"
    />
  </div>
</template>

<script>
import { extensions } from "../../config/extensions";
export default {
  name: "file-icon",
  props: {
    extension: { type: String, default: "file" }, // excel, folder, jpg, dpf, png, txt, word
  },
  computed: {
    fileExtension() {

      return extensions[this.extension] ? extensions[this.extension] : 'file';
    },
  },
};
</script>

<style></style>
