<template>
  <div class="side-body" v-if="task">
    <div class="section -fit" v-if="task.is_overdue && !task.late_completed">
      <div class="overdue">
        <div class="icon anim-showhide-inf">
          <span class="-ap icon-error"></span>
        </div>
        <div class="label">{{ $t('tasks.task overdue') }}</div>
        <br />
        <div
          class="side"
        >{{ `${task.diff_in_time.d} ngày, ${task.diff_in_time.h} giờ, ${task.diff_in_time.m} phút` }}</div>
      </div>
    </div>

    <div class="section -fit" v-if="task.late_completed">
      <div class="overdue -late">
        <div class="icon">
          <span class="-ap icon-error"></span>
        </div>
        <div class="label">{{ $t('tasks.late completed') }}</div>
      </div>
    </div>

    <div class="section -fit" v-if="task.start_date">
      <div class="start">
        <div class="icon">
          <span class="-ap icon-play_circle_filled"></span>
        </div>
        <div class="label">Task is started {{formatDateFromNow}}</div>
        <div class="info">{{ $t('tasks.this task is assigned to you') }}</div>
      </div>
    </div>

    <!-- <div class="section -fit" v-if="!task.start_date">
      <div class="start">
        <div class="icon anim-showhide-inf">
          <span class="-ap icon-play_circle_filled"></span>
        </div>
        <div class="label">Công việc chưa bắt đầu</div>
        <div class="info">Công việc đang được giao cho bạn</div>
        <div class="ctas clear-fix">
          <div class="cta url" data-url="action/2443022/startnow" data-acl="1">
            <span class="-ap icon-play_arrow"></span> Bắt đầu ngay
          </div>
          <div class="cta-less url" data-url="action/2443022/starttime" data-acl="1">Chọn tgian</div>
        </div>
      </div>
    </div> -->

    <div class="section">
      <div class="title">{{ $t('tasks.assignee') }}</div>
      <div class="assigner body">
        <div class="user">
          <div class="image">
            <img :src="avatar" />
          </div>
          <div class="name">{{ task.created_by.name }}</div>
          <div
            class="info"
          >{{ task.created_by.position ? task.created_by.position : $t('users.no job title') }}</div>
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
            {{ $t('tasks.created time') }}:
            <em>{{ formatDateTime(task.created_at) }}</em>
          </div>
        </div>
        <div class="row">
          <div class="icon">
            <span class="ficon-clock-o"></span>
          </div>
          <div class="label">
            {{ $t('tasks.updated time') }}:
            <em>{{ formatDateTime(task.updated_at) }}</em>
          </div>
        </div>
        <div class="row" v-if="task.start_date">
          <div class="icon">
            <span class="ficon-chevron-circle-right"></span>
          </div>
          <div class="label">
            {{ $t('tasks.started') }}:
            <em>{{ formatDateTime(task.start_date) }}</em>
          </div>
        </div>
        <div class="row" v-if="task.due_on">
          <div class="icon">
            <span class="ficon-clock-o"></span>
          </div>
          <div class="label">
            {{ $t('tasks.deadline') }}:
            <em>{{ formatDateTime(task.due_on) }}</em>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { getAvatar } from "../../../helpers";
import i18n from '../../../lang'
import moment from "moment";
export default {
  name: "task-detail-right-side",
  props: {
    task: { type: Object, default: null }
  },
  methods: {
    formatDateTime(time) {
      if (time) return moment(time).locale(i18n.locale).format("HH:mm L");
    }
  },
  computed: {
    formatDateFromNow() {
      return moment(this.task.start_date).fromNow();
    },
    avatar() {
      return getAvatar(this.task.created_by.avatar);
    }
  }
};
</script>

<style scoped>
.task-display .side-body .overdue .side {
  left: 51px;
  top: 40px;
}
.image img {
  object-fit: cover;
  object-position: center;
}
</style>
