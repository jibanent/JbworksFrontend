<template>
  <div class="task-wrapper js-task">
    <div class="js-task li -doing -overdue active focusing">
      <div class="name">
        <div class="ap-xdot">
          <div class="mn">
            <router-link
              tag="span"
              :to="{
                name: 'task-detail',
                params: {
                  id: task.id,
                  task: formatTaskName,
                },
              }"
              class="url"
              :title="title"
            >{{ task.name }} ({{ formatDate(task.start_date) }})</router-link>
            <span class="istats">
              <span class="istat" title="Comments">
                <span class="-ap icon-bubble3"></span> 1
              </span>
            </span>
          </div>
        </div>
      </div>
      <div class="check url">
        <div class="task-status -xdone"></div>
      </div>

      <div class="assign url -infow">
        <div class="avatar">
          <div class="image imagew">
            <img :src="avatar" />
          </div>
        </div>
        <span class="-infobox -up -w200">
          <span class="-box block normal">{{ task.assigned_to.name }}</span>
        </span>
      </div>
      <div class="desc">
        <div class="content">
          <div class="ap-xdot">
            <div class="labels">
              <span class="label tag-alt1-edge js-tag url">Công việc của {{ task.assigned_to.name }}</span>
              <span class="label std x-error js-tag url" v-if="task.is_overdue">Quá hạn</span>
              <span class="label std js-tag url">
                <span class="ficon-caret-right"></span>
                bắt đầu {{ formatDate(task.start_date) }}
              </span>
            </div>
            <span class="inner">{{ description }} · Created by {{ task.created_by.name }}</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import moment from "moment";
import { getAvatar, removeVietnameseFromString } from "../../../helpers";
export default {
  name: "task-detail-left-side-item",
  props: {
    task: { type: Object, default: null }
  },
  computed: {
    formatTaskName() {
      return removeVietnameseFromString(this.task.name);
    },
    description() {
      return this.task.description ? this.task.description : "Chưa có mô tả";
    },
    avatar() {
      return getAvatar(this.task.assigned_to.avatar);
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
