<template>
  <div class="dd -cmenuw">
    <em>{{ textStatus }}</em>
    <div class="-cmenu -padding -no-icon">
      <div
        class="-item url js-review-mark"
        :class="{ active: !status }"
        @click="handleFilterByStatus()"
      >{{ $t("tasks.all status") }}</div>
      <div
        class="-item url"
        :class="{ active: key === status }"
        @click="handleFilterByStatus(key)"
        v-for="(value, key) in taskStatus"
        :key="key"
      >{{ $t(`tasks.${value}`) }}</div>
    </div>
  </div>
</template>

<script>
import { taskStatus } from "../../config/status";
import { mapState } from "vuex";
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
      if (!this.status) return this.$t("tasks.all status");
      return this.$t(`tasks.${taskStatus[this.status]}`);
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
