<template>
  <div class="box std" style="width: 20%;">
    <div class="inner">
      <div class="header">
        Còn nhiều việc nhất
        <div class="side"></div>
      </div>
      <div class="body -fit">
        <div class="scrollbox scroll-y -smaller">
          <!--begin bao cao-->
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
                <em>{{ item.incomplete }}</em>
                /{{ item.total }} active tasks
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
