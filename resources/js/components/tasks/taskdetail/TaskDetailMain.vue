<template>
  <div class="task-main" v-if="task">
    <div class="edit-box compact edit-task-name">
      <div class="edit-display">
        <h1>{{ task.name }} ({{ formatDate(task.start_date) }})</h1>
      </div>
    </div>
    <div class="desc">
      <span class="ficon-circle anim-showhide-inf" :style="`color: ${task.status.color}`"></span>
      <span :style="`color: ${task.status.color}`">&nbsp; {{ task.status.name }} </span>

      <span class="url url-detail">Trong {{ task.project.name }}</span>
    </div>
    <div class="desc">
      <span class="-ap icon-uniF10B"></span>&nbsp;
      <div class="deadline">
        <div class="url">
          Ngày bắt đầu:
          <em>{{ formatDateTime(task.start_date) }}</em>
        </div>
        <span class="inline">
          &nbsp;
          <span class="-ap icon-arrow-right"></span> &nbsp;
        </span>
        <div class="deadline-display inline">
          Thời hạn:
          <span class="url em inline" v-if="task.due_on">{{ formatDateTime(task.due_on) }}</span>
          <span class="url em inline" v-else>Chọn thời hạn</span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import moment from "moment";
export default {
  name: "task-detail-main",
  props: {
    task: { type: Object, default: null }
  },
  methods: {
    formatDate(date) {
      if (date) return moment(date).format("DD/MM/YYYY");
    },
    formatDateTime(time) {
      if (time) return moment(time).format("HH:mm DD/MM/YYYY");
    }
  }
};
</script>

<style>
</style>
