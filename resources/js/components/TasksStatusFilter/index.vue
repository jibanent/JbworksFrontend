<template>
  <div class="dd -cmenuw">
    <em>{{ textStatus }}</em>
    <div class="-cmenu -padding -no-icon">
      <div
        class="-item url js-review-mark"
        :class="{ active: !status }"
        @click="handleFilterByStatus()"
      >
        Tất cả trạng thái
      </div>
      <div
        class="-item url"
        :class="{ active: key === status }"
        @click="handleFilterByStatus(key)"
        v-for="(item, key) in taskStatus"
        :key="key"
      >
        {{ item }}
      </div>
    </div>
  </div>
</template>

<script>
import { taskStatus } from "../../config/status";
export default {
  name: "tasks-status-filter",
  props: ["status"],
  data() {
    return {
      taskStatus
    };
  },
  computed: {
    textStatus() {
      return taskStatus[this.status] || "Tất cả trạng thái";
    }
  },
  methods: {
    handleFilterByStatus(key) {
      this.$emit("filterTasksByStatus", key);
    }
  }
};
</script>

<style></style>
