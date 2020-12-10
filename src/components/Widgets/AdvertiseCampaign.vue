<template>
  <app-card
    :heading="$t('message.advertiseCampaign')"
    :heading-menu="true"
    custom-classes="campaign-widget"
    content-custom-class="d-sm-flex align-items-center"
  >
    <div class="w-50 mb-xs-2">
      <advertise-campaign-chart :width="100" :height="75" />
    </div>
    <div class="w-50 d-flex justify-content-center chart-content mt-xs-4 mx-auto">
      <ul class="list-unstyled mb-0">
        <li v-for="(campaign, index) in advertiseCampaign" :key="index" class="d-flex mb-30">
          <div class="mr-15">
            <span class="badge badge-label-sm fa-notify" :class="campaign.color">&nbsp;</span>
          </div>
          <div class="media-body">
            <h6>{{ campaign.name }}</h6>
            <span class="font-2x fw-bold">{{ campaign.price }}</span>
          </div>
        </li>
      </ul>
    </div>
  </app-card>
</template>

<script>
import AdvertiseCampaignChart from 'Components/Charts/AdvertiseCampaignChart'

export default {
  components: {
    AdvertiseCampaignChart
  },
  data() {
    return {
      advertiseCampaign: [
        {
          name: 'Google ads',
          price: '$6500',
          color: 'badge-danger'
        },
        {
          name: 'Facebook ads',
          price: '$3500',
          color: 'badge-primary'
        },
        {
          name: 'Print Media',
          price: '$1500',
          color: ' badge-warning'
        }
      ]
    }
  }
}
</script>
