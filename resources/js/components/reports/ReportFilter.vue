<template>
  <div class="db-header">
    <div class="filters">
      <div class="filter -dd">
        From:
        <em>18/02 - 19/03/20</em>
      </div>

      <div class="filter -dd -cmenuw">
        <em>By created dates</em>
        <div class="-cmenu -padding -no-icon">
          <div class="-item url active" data-urlparam="by" data-value>By created dates</div>
          <div class="-item url" data-urlparam="by" data-value="deadline">By deadline</div>
          <div class="-item url" data-urlparam="by" data-value="started">By started date</div>
        </div>
      </div>

      <div class="filter -dd -cmenuw js-department">
        <em>All departments</em>

        <div class="-cmenu -padding -no-icon">
          <div class="-item url active">All departments</div>
          <div class="-item url">BỆNH VIỆN</div>
        </div>
      </div>

      <div class="filter -dd -cmenuw js-assignees hidden">
        <em>Everyone</em>
        <div class="-cmenu -padding -no-icon">
          <div class="-item url active" data-urlparam="assignees" data-value>Everyone</div>
          <div class="-item" data-urlparam="assignees" data-value="custom">Choose assignees</div>
        </div>
      </div>

      <div class="filter"></div>

      <div class="filter"></div>
    </div>
  </div>
</template>

<script>
export default {
  name: "report-filter"
};
</script>

<style>
</style>
