<template>
  <div class="desc">
    <div class="review-status" :style="`background-color: ${task.status.color}`">
      <span>{{ task.status.name }}</span>
    </div>
    <div class="content">
      <div class="ap-xdot">
        <div class="labels">
          <span class="label tag-alt1-edge">Công việc của {{ task.assigned_to.name }}</span>
          <span class="label std x-error" v-if="task.is_overdue && !task.late_completed">Quá hạn</span>
          <span class="label std x-overdue" v-if="task.late_completed && task.is_overdue">HT sau deadline</span>
          <span class="label std">
            <span class="ficon-caret-right"></span>
            bắt đầu {{ formatDate }}
          </span>
        </div>
        <span class="inner" :title="title">{{ description }} · Created by {{ task.created_by.name }}</span>
      </div>
    </div>
  </div>
</template>

<script>
import moment from "moment";
export default {
  name: "task-item-description",
  props: {
    task: { type: Object, default: null }
  },
  computed: {
    title() {
      return `${this.description}. Created by ${this.task.created_by.name}`;
    },
    description() {
      return this.task.description ? this.task.description : "Chưa có mô tả";
    },
    formatDate() {
      return moment(this.task.start_date).format("DD/MM/YYYY");
    }
  },
  methods: {}
};
</script>

<style scoped>
.review-status {
  border-radius: 12px;
  color: #fff !important;
}
</style>
