<template>
  <div class="box std" style="width: 20%;">
    <div class="inner">
      <div class="header">
        {{ $t('report.most works ahead') }}
        <div class="side"></div>
      </div>
      <div class="body -fit">
        <div class="scrollbox scroll-y -smaller">
          <div class="list">
            <div class="item" v-for="item in mostTasksAhead" :key="item.id">
              <div class="icon">
                <div class="avatar">
                  <img :src="avatar(item.assigned_to.avatar)" />
                </div>
              </div>
              <div class="name">
                <span class="url">{{ item.assigned_to.name }}</span>
              </div>
              <div class="info">
                <em>{{ $t('report.number active tasks', {number: item.incomplete + '/' + item.total}) }}</em>
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
  name: "report-member-most-tasks-ahead",
  props: {
    mostTasksAhead: { type: Array, default: [] }
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
