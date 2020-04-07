<template>
  <div class="task-main" v-if="task">
    <div class="edit-box compact edit-task-name">
      <div class="edit-display">
        <h1>{{ task.name }} {{ formatDate(task.start_date) }}</h1>
      </div>
    </div>
    <div class="desc">
      <span class="ficon-circle anim-showhide-inf" :style="`color: ${task.status.color}`" v-if="task.status.slug==='doing'"></span>
      <span class="ficon-check-circle text-success" :style="`color: ${task.status.color}`" v-if="task.status.slug==='done'"></span>
      <span :style="`color: ${task.status.color}`">&nbsp; {{ task.status.name }} </span>

      <span class="url url-detail">Trong {{ task.project.name }}</span>
    </div>
    <div class="desc">
      <span class="-ap icon-uniF10B"></span>&nbsp;
      <div class="deadline">
        <div class="url">
          Ngày bắt đầu:
          <em v-if="task.start_date">{{ formatDateTime(task.start_date) }}</em>
          <em v-else>Chọn ngày bắt đầu</em>
        </div>
        <span class="inline">
          &nbsp;
          <span class="-ap icon-arrow-right"></span> &nbsp;
        </span>
        <div class="deadline-display inline">
          Thời hạn:
          <em v-if="task.due_on">{{ formatDateTime(task.due_on) }}</em>
          <em v-else>Chọn thời hạn</em>
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
      if (date) return `(${moment(date).format("DD/MM/YYYY")})`;
    },
    formatDateTime(time) {
      if (time) return moment(time).format("HH:mm DD/MM/YYYY");
    }
  }
};
</script>

<style>
</style>
