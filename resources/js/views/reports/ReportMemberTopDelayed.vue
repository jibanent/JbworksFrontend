<template>
  <div class="box std" style="width: 20%;">
    <div class="inner">
      <div class="header">
        {{ $t('report.top delayed') }}
        <div class="side"></div>
      </div>
      <div class="body -fit">
        <div class="scrollbox xo">
          <div class="list" v-for="item in topDelayed" :key="item.id">
            <div class="item">
              <div class="icon">
                <div class="avatar">
                  <img :src="avatar(item.assigned_to.avatar)" />
                </div>
              </div>
              <div class="name">
                <span class="url red">{{ item.assigned_to.name }}</span>
              </div>
              <div class="info">
                <em>{{ $t('tasks.number of tasks overdue', {number: item.overdue}) }} . {{ $t('tasks.number of tasks done late', {number: item.completed_late}) }}</em>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="s" style="padding-bottom:250%"></div>
  </div>
</template>

<script>
import { getAvatar } from "../../helpers";
export default {
  name: "report-member-top-delayed",
  props: {
    topDelayed: { type: Array, default: [] }
  },
  methods: {
    avatar(url) {
      return getAvatar(url);
    }
  }
};
</script>

<style>
</style>
