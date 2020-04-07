<template>
  <div class="side-body" v-if="task">
    <div class="section -fit">
      <div class="overdue">
        <div class="icon anim-showhide-inf">
          <span class="-ap icon-error"></span>
        </div>
        <div class="label">Công việc đã quá hạn</div>
        <div class="side">20/03/2020</div>
      </div>
    </div>
    <div class="section -fit">
      <div class="start">
        <div class="icon">
          <span class="-ap icon-play_circle_filled"></span>
        </div>
        <div class="label">Task is started 17 days ago</div>
        <div class="info">This task is assigned to you</div>
      </div>
    </div>
    <div class="section">
      <div class="title">Người giao việc</div>
      <div class="assigner body">
        <div class="user">
          <div class="image">
            <img :src="avatar" />
          </div>
          <div class="name">{{ task.created_by.name }}</div>
          <div class="info">{{ task.created_by.position }}</div>
        </div>
      </div>
    </div>
    <div class="section">
      <div class="exec-rows">
        <div class="row">
          <div class="icon">
            <span class="ficon-user-circle-o"></span>
          </div>
          <div class="label">
            TG tạo:
            <em>{{ formatDateTime(task.created_at) }}</em>
          </div>
        </div>
        <div class="row">
          <div class="icon">
            <span class="ficon-clock-o"></span>
          </div>
          <div class="label">
            TG cập nhật:
            <em>{{ formatDateTime(task.updated_at) }}</em>
          </div>
        </div>
        <div class="row">
          <div class="icon">
            <span class="ficon-chevron-circle-right"></span>
          </div>
          <div class="label">
            Bắt đầu:
            <em>{{ formatDateTime(task.start_date) }}</em>
          </div>
        </div>
        <div class="row">
          <div class="icon">
            <span class="ficon-clock-o"></span>
          </div>
          <div class="label">
            Deadline:
            <em>{{ formatDateTime(task.due_on) }}</em>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</template>

<script>
import { getAvatar } from "../../../helpers";
import moment from 'moment'
export default {
  name: "task-detail-right-side",
  props: {
    task: { type: Object, default: null }
  },
  methods: {
    formatDateTime(time) {
      if (time) return moment(time).format("HH:mm DD/MM/YYYY");
    }
  },
  computed: {
    avatar() {
      return getAvatar(this.task.created_by.avatar);
    }
  }
};
</script>

<style>
</style>
