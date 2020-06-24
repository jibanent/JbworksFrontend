<template>
  <div class="header">
    <div class="title">Danh sách dự án &amp; teams</div>
    <div class="search-icon"></div>
    <div class="side">
      <div class="filter-tags">
        <span class="label">Bộ lọc hiện tại</span>
        <div class="tag -colorful js-filter-tag">{{ params.active ? 'Hoạt động' : 'Đã đóng'}}</div>
        <div class="tag -colorful js-stagefilter-tag">{{ status }}</div>
      </div>
      <projects-active-filter @filterByActive="handleFilterByActive" :params="params" />

      <projects-status-filter @filterByStatus="hanfleFilterByStatus" :params="params" />

      <search @search="handleSearch" placeholder="Tìm nhanh dự án" :search="params.search" />

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
import Search from "../Search";
import ProjectsStatusFilter from "../ProjectsStatusFilter";
import ProjectsActiveFilter from "../ProjectsActiveFilter";
import { projectStatuses } from "../../config/status";
export default {
  name: "project-control",
  props: {
    params: { type: Object, default: null }
  },
  computed: {
    status() {
      let status;
      if (this.params.active === 0) {
        status = projectStatuses.close.filter(item => {
          return item.value === this.params.close_status;
        });
      } else {
        status = projectStatuses.open.filter(item => {
          return item.value === this.params.open_status;
        });
      }
      if (status.length !== 0) return status[0].name;
      else return "Tất cả";
    }
  },
  methods: {
    handleSearch(search) {
      const { active, open_status, close_status } = this.params;
      this.$emit("filterProject", {
        search,
        active,
        open_status,
        close_status
      });
    },
    handleFilterByActive(active) {
      const { search, open_status, close_status } = this.params;
      if (active === 1)
        this.$emit("filterProject", { active, search, open_status });
      if (active === 0)
        this.$emit("filterProject", { active, search, close_status });
    },
    hanfleFilterByStatus(status) {
      const { search, active } = this.params;
      this.$emit("filterProject", { ...status, search, active });
    }
  },
  components: {
    Search,
    ProjectsStatusFilter,
    ProjectsActiveFilter
  }
};
</script>

<style>
</style>
