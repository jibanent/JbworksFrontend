<template>
  <div id="base-notis" style="display: block;" v-if="showNotifications">
    <div class="full-mask" @click="$store.commit('TOGGLE_NOTIFICATIONS')"></div>

    <div class="close"></div>

    <div class="list list-notis">
      <div class="-arrow"></div>

      <div class="-title">Thông báo</div>

      <div id="notis-items-w" class="notis-items-w">
        <div id="base-notis-scroll" class="notis-scroll __set __apscrollbar_parent">
          <div
            class="scrollin absolute __apscrollbar_target __regular __scrolled"
            id="_uuid13134_61501_1590635691"
            style="right: -17px; top: 0px; left: 0px; bottom: 0px;"
          >
            <div class="__apscrollbar_wrap">
              <notifications-group-by-created-at v-for="item in notifications" :key="item.id" :notifications="item" />
            </div>
          </div>
          <div id="_uuid13134_61501_1590635691__apscrollbar" class="__apscrollbar" style>
            <div
              class="scroller ui-draggable ui-draggable-handle active"
              style="top: 0px; height: 86px;"
            >
              <div class="sinner" style="height: 85px;"></div>
            </div>
          </div>
        </div>
      </div>

      <div class="-more std" onclick="N.ui.loadMore();">View more notifications</div>
    </div>
  </div>
</template>

<script>
import NotificationsGroupByCreatedAt from './NotificationsGroupByCreatedAt'
export default {
  name: "notifications",
  props: {
    notifications: { type: Array, default: [] },
    showNotifications: { type: Boolean, default: false}
  },
  components: {
    NotificationsGroupByCreatedAt
  }
};
</script>

<style>
</style>
