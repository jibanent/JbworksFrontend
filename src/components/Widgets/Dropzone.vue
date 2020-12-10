<template>
  <dropzone id="myVueDropzone" :options="dropzoneOptions">
    <input type="hidden" name="token" value="xxx">
  </dropzone>
</template>

<script>
import Dropzone from 'vue2-dropzone'

export default {
  components: {
    Dropzone
  },
  data() {
    return {
      dropzoneOptions: {
        url: 'https://httpbin.org/post',
        thumbnailWidth: 150,
        maxFilesize: 0.5,
        headers: { 'My-Awesome-Header': 'header value' }
      }
    }
  }
}
</script>
