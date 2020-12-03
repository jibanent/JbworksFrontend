<template>
  <div class="clients-list-wrap ">
    <div class="row">
      <div
        v-for="(details, index) in clientData"
        :key="index"
        class="mb-30 col-12 col-sm-6 col-md-4 col-lg-3"
      >
        <app-card custom-classes="mb-0 client-item">
          <div :key="index" class="text-center position-relative">
            <router-link :to="{name: 'customer', params: {id: 1}}" tag="div" class="thumb-wrap mb-3 client-link">
              <img :src="details.image" class="rounded-lg">
            </router-link>
            <div class="client-content">
              <router-link :to="{name: 'customer', params: {id: 1}}" tag="h4" class="mb-2 text-primary client-link">{{ details.name }}</router-link>
              <div class="contact-links text-truncate mb-1 fs-14">
                <a class="" href="javascript:void(0)">{{ details.e_mail }}</a>
              </div>
              <div class="contact-links fs-14 text-truncate mb-1">
                <a class="" href="javascript:void(0)">{{ details.phone_number }}</a>
              </div>
            </div>
            <div class="action-btn-wrap">
              <b-button class="border-0"><i class="material-icons">edit</i></b-button>
              <b-button class="border-0"><i class="material-icons">delete</i></b-button>
            </div>
          </div>
        </app-card>
      </div>
    </div>
  </div>
</template>

<script>
import { clientData } from 'Assets/data/clientData.js'
export default {
  name: 'GridView',
  data() {
    return {
      clientData
    }
  }
}
</script>

<style scoped>
  .client-link {
    cursor: pointer;
  }
</style>
