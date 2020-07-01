<template>
  <div class="dd -cmenuw">
    <em>{{ textOrder }}</em>
    <div class="-cmenu -padding -no-icon">
      <div
        class="-item url"
        :class="{
          active: key !== 'updated' ? order === key : !order
        }"
        @click="handleFilterByOrder(key !== 'updated' ? key : null)"
        v-for="(value, key) in tasksOrder"
        :key="key"
      >{{ $t(`tasks.${value}`) }}</div>
    </div>
  </div>
</template>

<script>
import { tasksOrder } from "../../config/sort";
export default {
  name: "tasks-sort",
  props: {
    order: { type: String }
  },
  data() {
    return {
      tasksOrder
    };
  },
  computed: {
    textOrder() {
      if (!this.order) return this.$t("tasks.updated time");
      return this.$t(`tasks.${tasksOrder[this.order]}`);
    }
  },
  methods: {
    handleFilterByOrder(key) {
      this.$emit("sortTasks", key);
    }
  }
};
</script>

<style></style>
