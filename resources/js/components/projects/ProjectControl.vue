<template>
  <div class="header">
    <div class="title">Danh sách dự án &amp; teams</div>
    <div class="search-icon"></div>
    <div class="side">
      <div class="filter-tags hidden" id="js-current-filter-tags">
        <span class="label">Bộ lọc hiện tại</span>
        <div class="tag -colorful js-filter-tag hidden">Active</div>
        <div class="tag -colorful js-stagefilter-tag hidden">Planning</div>
      </div>

      <div class="filter" id="js-plist-filter">
        <div class="label" id="plist-filter-name">Hiển thị</div>

        <div class="dd">
          <div class="li active" data-label="Tất cả" data-filter="all">Tất cả</div>
          <div class="li" data-label="Active" data-filter="active">Active</div>
          <div class="li" data-label="Đã đóng" data-filter="closed">Đã đóng</div>
        </div>
      </div>

      <div class="filter" id="js-plist-stage-filter">
        <div class="label" id="plist-stage-filter-name">Lọc theo giai đoạn</div>

        <div class="dd">
          <div class="li active" data-label="Tất cả" data-filter="all">Tất cả</div>
          <div class="li" data-label="ontrack" data-filter="ontrack">On track</div>
          <div class="li" data-label="offtrack" data-filter="offtrack">Off track</div>
          <div class="li" data-label="atrisk" data-filter="atrisk">At risk</div>
        </div>
      </div>

      <div class="search">
        <div class="input">
          <input
            type="text"
            name="q"
            id="js-side-psearch"
            data-type="project"
            placeholder="Tìm nhanh dự án &amp; team"
          />
        </div>
      </div>

      <div class="itabs">
        <div class="icon" data-view="card">
          <span class="ficon-th-large"></span>
        </div>
        <div class="icon active" data-view="table">
          <span class="ficon-th-list"></span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'project-control'
};
</script>

<style>
</style>
