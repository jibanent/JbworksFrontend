<template>
  <div class="p-3">
    <b-card
      v-for="(data,index) in cardsData"
      :key="index"
      :bg-variant="data.bgColor"
      text-variant="white"
      class="mb-3"
    >
      <p class="card-text">{{ data.text }}</p>
    </b-card>
    <div class="text-center pt-3">
      <b-btn variant="link" class="text-muted text-capitalize">
        View All Notifications
      </b-btn>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      cardsData: [
        {
          bgColor: 'danger',
          heading: 'danger',
          text: 'Site goes is down for 6 hours due to maintainance and bug fixing.Please Check'
        },
        {
          bgColor: 'success',
          heading: 'success',
          text: 'New users from March is promoted as special benefit under promotional offer of 30%.'
        },
        {
          bgColor: 'primary',
          heading: 'primary',
          text: 'Bug detected from the development team at the cart module of Fashion store.'
        }
      ]
    }
  }
}
</script>
