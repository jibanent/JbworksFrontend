<template>
  <div>
    <div class="mb-20">
      <label>Choose Currency</label>
      <div class="custom-prepend-select d-flex align-items-center">
        <div class="icon-wrap h-100 d-flex justify-content-center align-items-center"><i class="fa fa-money" />
        </div>
        <select class="custom-select text-truncate">
          <option value="Please select the Currency" selected>Please select the Currency</option>
          <option value="Bitcoin">Bitcoin</option>
          <option value="Ethereum">Ethereum</option>
          <option value="Litecoin">Litecoin</option>
          <option value="Zcash">Zcash</option>
        </select>
      </div>
    </div>
    <div class="mb-20">
      <label>Select Amount</label>
      <b-form-input type="number" value="200" />
    </div>
    <div class="mb-20">
      <label>Password</label>
      <div class="custom-prepend-input d-flex align-items-center">
        <div class="icon-wrap h-100 d-flex justify-content-center align-items-center"><i class="fa fa-shield" />
        </div>
        <input class="form-control" type="password" placeholder="Amount"></input>
      </div>
    </div>
    <div class="mb-20">
      <label>Wallet Address</label>
      <div class="custom-prepend-input d-flex align-items-center">
        <div class="icon-wrap h-100 d-flex justify-content-center align-items-center"><i class="cc BTC-alt" />
        </div>
        <b-form-input value="AXB35H24ISDJHCISDT" />
      </div>
    </div>
    <p class="text-success">Your Account will be credited with 200 $</p>
    <div>
      <b-button variant="primary" class="text-capitalize">Sell</b-button><span class="text-success pl-2">Transaction
        successfull</span>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      options: [
        { text: 'Please select the Currency' },
        { text: 'Bitcoin' },
        { text: 'Ethereum' },
        { text: 'LItecoin' },
        { text: 'Zcash' }
      ],
      options1: [
        { text: 'Please select the Payment Method' },
        { text: 'PayPal' },
        { text: 'Debit Card' },
        { text: 'Bank Transfer' },
        { text: 'Credit Card' }
      ]
    }
  }
}
</script>
