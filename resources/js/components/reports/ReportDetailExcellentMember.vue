<template>
  <div class="box std" style="width: 33.33%;">
    <div class="inner">
      <div class="header">
        Thành viên xuất sắc
        <div class="side"></div>
      </div>
      <div class="body -fit">
        <div class="scrollbox scroll-y -smaller">
          <div class="list" id="js-top-performers">
            <div class="item" v-for="item in excellentMember" :key="item.id">
              <div class="icon">
                <div class="avatar">
                  <img
                    :src="avatar(item.assigned_to.avatar)"
                  />
                </div>
              </div>
              <div class="name">
                <span class="url" data-username="giangle">{{ item.assigned_to.name }}</span>
              </div>
              <div class="info">
                <em>{{ item.completed }}</em>/{{ item.total }} completed tasks
              </div>
              <div class="side">
                <div class="bar">
                  <div class="c" :style="`width: ${(item.completed/item.total) * 100}%`"></div>
                  <div class="txt">{{ (item.completed/item.total) * 100 }}%</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="s" style="padding-bottom:112.5%"></div>
  </div>
</template>

<script>
import {getAvatar} from '../../helpers'
export default {
  name: "report-detail-excellent-member",
  props: {
    excellentMember: { type: Array, default: [] }
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
