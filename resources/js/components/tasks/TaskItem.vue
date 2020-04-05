<template>
  <div class="task-wrapper js-task">
    <div class="js-task li li-2421891 -todo -review">
      <div class="name">
        <div class="ap-xdot">
          <div class="mn">
            <span class="url" :title="title">{{ task.name }} ({{ formatDate(task.start_date) }})</span>
          </div>
        </div>
      </div>
      <div class="check url">
        <div class="task-status -xdone"></div>
      </div>
      <div class="sicons">
        <div class="icon star url" title="Đánh dấu ưu tiên">
          <span class="-ap icon-uniF186"></span>
        </div>
      </div>
      <task-action />
      <div class="timebox">
        <div class="tx duration">
          <em class="url">{{ formatDate(task.due_on) }}</em>
        </div>
      </div>
      <div class="assign url -infow">
        <div class="avatar">
          <div class="image imagew">
            <img :src="avatar" />
          </div>
        </div>
        <div class="fname ap-xdot" :title="task.assigned_to.name">{{ task.assigned_to.name }}</div>
      </div>
      <div class="desc">
        <div
          class="review-status"
          :style="`background-color: ${task.status.color}; border-radius: 12px`"
        >
          <span>{{ task.status.name }}</span>
        </div>
        <div class="content">
          <div class="ap-xdot">
            <div class="labels">
              <span class="label tag-alt1-edge js-tag url">Công việc của {{ task.assigned_to.name }}</span>
              <span class="label std js-tag url">
                <span class="ficon-caret-right"></span>
                bắt đầu {{ formatDate(task.start_date) }}
              </span>
            </div>
            <span
              class="inner"
              :title="`${description}. Created by ${task.created_by.name}`"
            >{{ description }} · Created by {{ task.created_by.name }}</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import moment from "moment";
import { getAvatar } from "../../helpers";
import TaskAction from './TaskAction'
export default {
  name: "task-item",
  props: {
    task: {
      type: Object,
      default: null
    }
  },
  components: {
    TaskAction
  },
  computed: {
    avatar() {
      return getAvatar(this.task.assigned_to.avatar);
    },
    description() {
      return this.task.description ? this.task.description : "Chưa có mô tả";
    },
    title() {
      const { created_by, created_at, id } = this.task;
      return `Tạo bởi ${created_by.name} lúc ${this.formatDate(
        created_at
      )} | Order: ${id}`;
    }
  },
  methods: {
    formatDate(date) {
      if (date) return moment(date).format("DD/MM/YYYY");
    }
  }
};
</script>

<style>
</style>
