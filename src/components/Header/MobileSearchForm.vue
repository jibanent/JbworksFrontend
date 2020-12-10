<template>
  <div class="search-form-wrap">
    <span class="close-btn d-flex justify-content-end">
      <i class="material-icons">close</i>
    </span>
    <div class="d-flex align-center justify-content-center my-auto">
      <input
        v-model="search"
        type="text"
        required
        autocomplete="true"
        prepend-icon="search"
        placeholder="Nhập từ khóa tìm kiếm.."
        class="search-input"
        @click.stop="onClickSearch"
      >
    </div>
  </div>
</template>

<script>
import $ from 'jquery'

export default {
  data() {
    return {
      search: ''
    }
  },
  mounted() {
    $('.mobile-search-btn').click(function(e) {
      e.stopPropagation()
      $('.search-form-wrap').addClass('search-slide')
    })
    $('.close-btn').click(function(e) {
      e.stopPropagation()
      $('.search-form-wrap').removeClass('search-slide')
    })
    $('.search-form-wrap').click(function(e) {
      e.stopPropagation()
      $(this).removeClass('search-slide')
    })
  },
  methods: {
    onClickSearch() {
      console.log('work')
    }
  }
}
</script>
