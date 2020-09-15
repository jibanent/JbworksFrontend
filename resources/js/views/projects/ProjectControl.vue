<template>
  <div class="header">
    <div class="title">{{ $t('projects.project list') }}</div>
    <div class="search-icon"></div>
    <div class="side">
      <div class="filter-tags">
        <span class="label">{{ $t('projects.current filter') }}</span>
        <div
          class="tag -colorful js-filter-tag"
        >{{ params.active ? $t('projects.active') : $t('projects.closed')}}</div>
        <div class="tag -colorful js-stagefilter-tag">{{ status }}</div>
      </div>
      <projects-active-filter @filterByActive="handleFilterByActive" :params="params" />

      <projects-status-filter @filterByStatus="hanfleFilterByStatus" :params="params" />

      <search
        @search="handleSearch"
        :placeholder="$t('projects.quick filter project')"
        :search="params.search"
      />

      <div class="itabs">
        <div class="icon" :class="{active: view === 'grid'}" @click="$store.commit('SET_PROJECT_VIEW', 'grid')">
          <span class="ficon-th-large"></span>
        </div>
        <div class="icon" :class="{active: view === 'list'}" @click="$store.commit('SET_PROJECT_VIEW', 'list')">
          <span class="ficon-th-list"></span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Search from "../../components/Search";
import ProjectsStatusFilter from "../../components/ProjectsStatusFilter";
import ProjectsActiveFilter from "../../components/ProjectsActiveFilter";
import { projectStatuses } from "../../config/status";
export default {
  name: "project-control",
  props: {
    params: { type: Object, default: null },
    view: { type: String, default: 'list'}
  },
  computed: {
    status() {
      let status;
      if (this.params.active === 0) {
        status = projectStatuses.close.filter(item => {
          return item.value.replace(" ", "_") === this.params.close_status;
        });
      } else {
        status = projectStatuses.open.filter(item => {
          return item.value.replace(" ", "_") === this.params.open_status;
        });
      }
      if (status.length !== 0) return this.$t(`projects.${status[0].value}`);
      else return this.$t("projects.all");
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
      if (active)
        this.$emit("filterProject", { active, search, open_status });
      if (!active)
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
