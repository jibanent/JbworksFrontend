<template>
  <div class="item">
    <div class="icon">
      <div class="avatar">
        <img :src="avatar" />
      </div>
    </div>
    <div class="name">
      <span class="url">{{ stats.assigned_to.name }}</span>
    </div>
    <div class="info">
      <em>{{ stats.total }}</em> công việc được giao
    </div>
    <div class="side">
      <div class="col" style="width:100px;">
        <div class="mbar clear-fix">
          <div
            class="b -infow"
            :style="percentWidth(stats.completed_ontime)"
            style="background-color: #14cc3f"
          >
            <span class="-infobox -up -w200">
              <span class="-box block normal">Hoàn thành đúng hạn: {{ stats.completed_ontime }}</span>
            </span>
          </div>
          <div
            class="b -infow"
            :style="percentWidth(stats.completed_late)"
            style="background-color:#f7e015;"
          >
            <span class="-infobox -up -w200">
              <span class="-box block normal">Hoàn thành muộn: {{ stats.completed_late }}</span>
            </span>
          </div>
          <div
            class="b -infow"
            :style="percentWidth(stats.overdue)"
            style="background-color:#f54e3b;"
          >
            <span class="-infobox -up -w200">
              <span class="-box block normal">Quá hạn: {{ stats.overdue }}</span>
            </span>
          </div>
          <div
            class="b -infow"
            :style="percentWidth(stats.processing)"
            style="background-color:#389dd9;"
          >
            <span class="-infobox -up -w200">
              <span class="-box block normal">Đang thực hiện: {{ stats.processing }}</span>
            </span>
          </div>
        </div>
      </div>
      <div class="col" style="width: 60px; padding:2px 0">
        <em style="color:#14cc3f">{{ stats.completed_ontime }}</em>
      </div>
      <div class="col" style="width: 60px; padding:2px 0">
        <em style="color:#f7e015">{{ stats.completed_late }}</em>
      </div>
      <div class="col" style="width: 60px; padding:2px 0">
        <em style="color:#f54e3b">{{ stats.overdue }}</em>
      </div>
      <div class="col" style="width: 60px; padding:2px 0">
        <em style="color:#389dd9">{{ stats.processing }}</em>
      </div>
    </div>
  </div>
</template>

<script>
import { getAvatar } from "../../helpers";
export default {
  name: "report-member-detail-item",
  props: {
    stats: { type: Object, default: null }
  },
  methods: {
    percentWidth(value) {
      return `width: ${(value / this.stats.total) * 100}%`;
    }
  },
  computed: {
    avatar() {
      return getAvatar(this.stats.assigned_to.avatar);
    }
  }
};
</script>

<style>
</style>
