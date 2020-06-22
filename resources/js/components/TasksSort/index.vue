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
        v-for="(item, key) in tasksOrder"
        :key="key"
      >
        {{ item }}
      </div>
    </div>
  </div>
</template>

<script>
import { tasksOrder } from "../../config/status";
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
      return tasksOrder[this.order] || "Thời gian cập nhật";
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
