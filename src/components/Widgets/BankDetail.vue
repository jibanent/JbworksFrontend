<template>
  <div class="bank-details">
    <app-card :heading="$t(&quot;message.bankDetails&quot;)" custom-classes="overflow-hide h-100">
      <div class="row">
        <div class="col-sm-7 col-md-7 col-lg-7 bank-detail mb-sm-0 mb-4">
          <div class="mrgn-b-md">
            <h5 class="mb-3">Rich Earnand</h5>
            <p class="fw-normal h4 mb-3">
              <span class="fa fa-university text-primary mr-2" />
              Central Bank Of Lorem
            </p>
            <p class="verified-status text-success h6 mb-3">
              <span class="fa fa-check mr-2" />
              KYC Verified
            </p>
          </div>
          <div class="fw-bold">
            <div class="mb-3">Account : <span class="fw-normal">XXXXXXXXX73823</span></div>
            <div>Phone : <span class="fw-normal">XXXXXXXX1234</span></div>
          </div>
        </div>
        <div class="col-sm-5 col-md-5 col-lg-5">
          <div class="price-wrap text-sm-right">
            <h3 class="mb-3">$9783862</h3>
            <b-button variant="primary" class="mb-2 text-capitalize d-block ml-sm-auto">Withdraw</b-button>
            <b-button variant="info" class="mb-2 text-capitalize d-block ml-sm-auto">Deposit</b-button>
            <b-button variant="danger" class="mb-2 text-capitalize d-block ml-sm-auto">Saved Cards</b-button>
          </div>
        </div>
      </div>
    </app-card>
  </div>
</template>
