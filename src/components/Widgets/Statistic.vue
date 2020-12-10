<template>
  <app-card
    :heading="$t('message.statistic')"
    :heading-menu="true"
    :full-block="true"
    custom-classes="statistic-widget"
    content-custom-class="d-flex flex-column justify-content-between"
  >
    <div class="d-flex text-center border-bottom">
      <div class="stat-count p-10 w-50 border-right">
        <h3 class="fw-bold mb-0 text-center">1280</h3>
        <span class="mb-0 font-xs">{{ $t('message.sold') }}</span>
      </div>
      <div class="stat-count p-10 w-50">
        <h3 class="fw-bold mb-0 text-center">1640</h3>
        <span class="mb-0 font-xs">{{ $t('message.inStock') }}</span>
      </div>
    </div>
    <div class="text-center py-30 px-20 bg-primary text-white">
      <span class="font-sm mb-2 d-block">{{ $t('message.amountOfStocksSold') }}</span>
      <span class="font-3x">$ 192846</span>
    </div>
    <b-list-group>
      <b-list-group-item v-for="stats in stats" :key="stats.id" class="d-flex align-items-center">
        <div class="w-33">
          <h5 class="mb-0">{{ stats.title }}</h5>
        </div>
        <div class="w-33  text-center">
          <span class="text-muted font-sm">{{ stats.value }}</span>
        </div>
        <div class="w-33 d-flex justify-content-end">
          <a href="javascript:void(0)" class="icon-btn m-0 text-muted"><i
            :class="`${stats.icon} ${stats.iconColor}`"
          /></a>
        </div>
      </b-list-group-item>
    </b-list-group>
    <div class="text-right p-15 btn-wrap">
      <b-button size="sm" variant="primary" class="text-capitalize">
        {{ $t('message.viewMore') }}
      </b-button>
    </div>
  </app-card>
</template>

<script>
export default {
  data() {
    return {
      stats: [
        {
          id: 1,
          title: 'Total orders',
          value: 300,
          icon: 'zmdi zmdi-shopping-basket',
          iconColor: 'text-warning'
        },
        {
          id: 2,
          title: 'Total sales',
          value: 2000,
          icon: 'zmdi zmdi-balance-wallet',
          iconColor: 'text-primary'

        },
        {
          id: 3,
          title: 'New customers',
          value: 120,
          icon: 'zmdi zmdi-account-add',
          iconColor: 'text-success'
        },
        {
          id: 4,
          title: 'Total customers',
          value: 950,
          icon: 'zmdi zmdi-accounts',
          iconColor: 'text-danger'
        }
      ]
    }
  }
}
</script>
