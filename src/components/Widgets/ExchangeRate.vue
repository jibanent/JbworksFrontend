<template>
  <div>
    <div>
      <label>Choose Currency</label>
      <div class="custom-prepend-select d-flex align-items-center">
        <div class="icon-wrap h-100 d-flex justify-content-center align-items-center"><i class="fa fa-money" />
        </div>
        <select class="custom-select">
          <option value="Bitcoin" selected>Bitcoin</option>
          <option value="Ethereum">Ethereum</option>
          <option value="Litecoin">Litecoin</option>
          <option value="Zcash">Zcash</option>
        </select>
      </div>
    </div>
    <div class="text-center"><i class="zmdi zmdi-swap-vertical font-2x my-2" /></div>
    <div class="mb-20">
      <label>Choose Currency</label>
      <div class="custom-prepend-select d-flex align-items-center">
        <div class="icon-wrap h-100 d-flex justify-content-center align-items-center"><i class="fa fa-money" />
        </div>
        <select class="custom-select">
          <option value="Bitcoin">Bitcoin</option>
          <option value="Ethereum">Ethereum</option>
          <option value="Litecoin">Litecoin</option>
          <option value="Zcash">Zcash</option>
        </select>
      </div>
    </div>
    <p class="text-success">1 BTC = 0.45373 ETC</p>
  </div>
</template>
<script>
export default {
  data() {
    return {
      type: 'passowrd',
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
