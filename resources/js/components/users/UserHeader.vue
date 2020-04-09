<template>
  <div id="header">
    <div class="nav">
      <span class="icon"></span>
    </div>
    <div class="title">
      <div class="icon -svg">Icon</div>
      <div class="name">Thành viên</div>
    </div>
    <div class="main">
      <div class="tabs">
        <div class="tab active url -dd -cmenuw">
          Danh sách thành viên
          <div class="-cmenu -no-icon -padding">
            <div class="-item url" data-url="#collection">Thành viên thường</div>
            <div class="-item url" data-url="#js-guests">Tài khoản khách</div>
          </div>
        </div>
      </div>
    </div>

    <div class="side">
      <div class="search block">
        <div class="input">
          <input type="text" placeholder="Tìm kiếm thành viên" />
        </div>
      </div>

      <div class="cta url" @click="$emit('openModal')">
        <span class="-ap icon-plus2"></span>&nbsp; Thêm thành viên mới
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'user-header'
};
</script>

<style>
</style>
