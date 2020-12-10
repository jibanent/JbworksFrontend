<template>
  <div role="tablist" class="wallet-tab-list">
    <template v-for=" (details,index) in cardData">
      <b-card no-body class="mb-3 border-0">
        <b-card-header header-tag="header" class="px-20 border-0" role="tab">
          <div v-b-toggle="'accordion-'+ index" block href="#">
            <h4 class="mb-0 wallet-title d-flex justify-content-between align-items-center">
              <span><i :class="details.icon" class="pr-2" />{{ details.name }}</span>
              <i class="zmdi zmdi-chevron-down font-lg" />
            </h4>
          </div>
        </b-card-header>
        <b-collapse :id="'accordion-'+index" visible accordion="my-accordion" role="tabpanel">
          <b-card-body>
            <div class="row">
              <div class="col-md-6 col-lg-6 col-xl-7 amount-sec-wrap mb-md-0 mb-4">
                <ul class="list-inline mb-3 amount-list">
                  <li class="border-bottom py-3 d-flex align-items-center">
                    <div class="icon-wrap">
                      <i class="fa fa-money font-lg text-primary" />
                    </div>
                    <div class="content-wrap pl-3">
                      <h5 class="mb-1">Received Amount</h5>
                      <span class="fs-14">+ 13247837654</span>
                    </div>
                  </li>
                  <li class="border-bottom py-3 d-flex align-items-center">
                    <div class="icon-wrap">
                      <i class="fa fa-credit-card font-lg text-danger" />
                    </div>
                    <div class="content-wrap pl-3">
                      <h5 class="mb-1">Sent Amount</h5>
                      <span class="fs-14">- 13247837654</span>
                    </div>
                  </li>
                  <li class="border-bottom py-3 d-flex align-items-center">
                    <div class="icon-wrap">
                      <i class="fa fa-university font-lg text-success" />
                    </div>
                    <div class="content-wrap pl-3">
                      <h5 class="mb-1">Total Amount</h5>
                      <span class="fs-14">+ 13247837654</span>
                    </div>
                  </li>
                </ul>
                <b-button variant="primary" class="text-capitalize mr-3">Withdraw</b-button>
                <b-button variant="info" class="text-capitalize">Deposit</b-button>
              </div>
              <div class="col-md-6 col-lg-6 col-xl-5">
                <div class="text-center">
                  <h4 class="mb-3">Wallet Address</h4>
                  <div class="custom-prepend-input d-flex align-items-center mb-4">
                    <div class="icon-wrap h-100 d-flex justify-content-center align-items-center"><i
                      class="cc BTC-alt"
                    />
                    </div>
                    <b-form-input value="YXB35H24ISDJHCISDT" />
                  </div>
                  <img src="/static/img/gene-qr.jpg" width="150" height="150">
                </div>
              </div>
            </div>
          </b-card-body>
        </b-collapse>
      </b-card>
    </template>
  </div>
</template>

<script>
export default {
  data() {
    return {
      cardData: [
        {
          name: 'Bitcoin',
          viewers: '+41',
          trade: '30',
          icon: 'cc BTC-alt text-primary'
        },
        {
          name: 'Ethereum',
          viewers: '+4381',
          trade: '60',
          icon: 'cc ETC text-success'
        },
        {
          name: 'Litecoin',
          viewers: '+2611',
          trade: '80',
          icon: 'cc LTC-alt text-info'
        },
        {
          name: 'Zcash',
          viewers: '+611',
          trade: '40',
          icon: 'cc ZEC-alt text-danger'
        }
      ]
    }
  }
}
</script>
