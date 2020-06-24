<template>
  <div class="filter">
    <div class="label">Lọc theo giai đoạn</div>

    <div class="dd">
      <div
        class="li"
        :class="{active: !params.open_status && !params.close_status}"
        @click="handleFilterByStatus()"
      >Tất cả</div>
      <div
        class="li"
        :class="{active: params.open_status === item.value || params.close_status === item.value}"
        v-for="item in status"
        :key="item.id"
        @click="handleFilterByStatus(item.value)"
      >{{ item.name }}</div>
    </div>
  </div>
</template>

<script>
import { projectStatuses } from "../../config/status";
export default {
  name: "projects-status-filter",
  props: {
    params: { type: Object, default: null }
  },
  computed: {
    status() {
      if (this.params.active === 0) return projectStatuses.close;
      else return projectStatuses.open;
    }
  },
  methods: {
    handleFilterByStatus(status) {
      if (this.params.active === 0)
        this.$emit("filterByStatus", { close_status: status });
      else this.$emit("filterByStatus", { open_status: status });
    }
  }
};
</script>

<style></style>
