<template>
  <app-card custom-classes="grid-b-space" :heading="$t('message.photos')">
    <div class="row photo-wrap">
      <div v-for="image in images" :key="image.id" class="col-6 col-sm-4 col-md-3 image-wrap">
        <img :src="image.url" alt="gallery" class="img-fluid mb-30 text-center mx-auto" width="220" height="146">
      </div>
    </div>
  </app-card>
</template>

<script>
import { images } from 'Assets/data/photoGallery.js'

export default {
  data() {
    return {
      images
    }
  }
}
</script>
