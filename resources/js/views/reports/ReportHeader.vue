<template>
  <div id="header">
    <div class="nav">
      <span class="icon"></span>
    </div>
    <div class="title">
      <div class="icon -svg">
        <svg
          id="b9968c63-1737-4c46-9df2-e7447143ce17"
          data-name="Layer 1"
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 14 14"
        >
          <title>icon music</title>
          <path d="M3,14a.5.5,0,0,1-.5-.5V1.5a.5.5,0,0,1,1,0v12A.5.5,0,0,1,3,14Z" />
          <path
            d="M10.28,7.71H3.71A1.21,1.21,0,0,1,2.5,6.5v-5A1.22,1.22,0,0,1,3.71.28h6.57a1.22,1.22,0,0,1,1.15.81,1.2,1.2,0,0,1-.38,1.35L9.35,3.83a.22.22,0,0,0,0,.34l1.7,1.39a1.21,1.21,0,0,1-.77,2.15ZM3.71,1.28a.22.22,0,0,0-.21.22v5a.21.21,0,0,0,.21.21h6.57a.21.21,0,0,0,.21-.14.23.23,0,0,0-.07-.24L8.72,4.94A1.2,1.2,0,0,1,8.27,4a1.18,1.18,0,0,1,.45-.94l1.7-1.39h0a.23.23,0,0,0,.07-.24.2.2,0,0,0-.21-.15Z"
          />
        </svg>
      </div>
      <div class="name">{{ $t('report.report') }}</div>
    </div>

    <div class="main">
      <div class="tabs auto-active-url">
        <div class="tab url active" data-url="reports">{{ $t('report.synthesis report') }}</div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "report-header"
};
</script>

<style>
</style>
