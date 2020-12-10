<template>
  <app-card :heading="$t('message.bestSeller')" heading-menu="true" content-custom-class="p-0">
    <div class="idb-full-block best-seller-wrap">
      <slick v-if="bestSellers !== null" ref="slick" :options="slickOptions">
        <div v-for="sellers in bestSellers" :key="sellers.img" class="content-wrap">
          <div class="idb-block-content p-20 pb-25">
            <div class="product-image mb-20 d-flex justify-content-center align-items-center">
              <img :src="sellers.img" class="img-fluid" alt="product" width="" height="">
            </div>
            <div class="d-flex justify-content-between mb-10">
              <h5 class="mb-0">{{ sellers.title }}</h5>
              <h5 class="text-danger mb-0 fw-bold">{{ sellers.price }}</h5>
            </div>
            <div class="product-ratings mb-1">
              <i v-for="(stars, index) in 5" :key="index" class="fa fa-star text-warning" />
            </div>
          </div>
          <ul class="product-stats footer-border">
            <li class="w-33">
              <h4 class="fw-bold">{{ sellers.sales }}</h4>
              <span class="font-xs"><i
                class="zmdi zmdi-shopping-basket font-sm mr-1 text-success"
              />{{ $t('message.sales') }}</span>
            </li>
            <li class="w-33">
              <h4 class="fw-bold">{{ sellers.rating }}</h4>
              <span class="font-xs"><i
                class="zmdi zmdi-star font-sm mr-1 text-warning"
              />{{ $t('message.rating') }}</span>
            </li>
            <li class="w-33">
              <h4 class="fw-bold">{{ sellers.comments }}</h4>
              <span class="font-xs"><i
                class="zmdi zmdi-comment fotn-sm mr-1 text-info"
              />{{ $t('message.comments') }}</span>
            </li>
          </ul>
        </div>
      </slick>
    </div>
  </app-card>
</template>

<script>
import Slick from 'vue-slick'
import { bestSellers } from 'Assets/data/bestSellers.js'

export default {
  components: {
    Slick
  },
  data() {
    return {
      bestSellers,
      slickOptions: {
        slidesToShow: 1,
        arrows: false,
        infinite: true,
        speed: 500,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        dots: false
      }
    }
  }
}
</script>
