<template>
  <div class="msg-channel" :class="{collapsed: collapsedMessages}" id="msg-panel">
    <div class="channel-header">
      <div class="channel-gsearch hidden">
        <div class="input apcomplete">
          <input
            placeholder="Find chat groups"
            id="js-channel-gsearch"
            class="__apcomplete_marked marked"
            style="display: none;"
          />
          <input
            type="text"
            class="temp disabled __apc_marked_class ui-autocomplete-input"
            placeholder="Find chat groups"
          />
        </div>
        <div class="close">
          <span class="-ap icon-uniF108"></span>
        </div>
      </div>
      <div class="title ap-xdot" @click="toggleMessagesBox">
        <div class="channel-explain -on-collapsed">
          <div class="cr"></div>
          <div class="cus">
            <div class="cx">Mở rộng</div>
          </div>
        </div>
        <span class="count js-total-unread-count" style="display: none;">0</span>TACE COMPANY
      </div>
      <div class="icons">
        <div class="icon js-channel-minus" @click="toggleMessagesBox">
          <div class="hexp">
            <div class="txt">Phóng to / Thu nhỏ</div>
          </div>
          <span class="ficon-minus"></span>
        </div>
        <div class="icon js-channel-search">
          <div class="hexp">
            <div class="txt">Tìm nhóm chat</div>
          </div>
          <span class="ficon-search"></span>
        </div>
        <div class="icon js-channel-expand url">
          <div class="hexp">
            <div class="txt">Chuyển đến trang Message</div>
          </div>
          <span class="-ap icon-open"></span>
        </div>
      </div>
    </div>
    <div class="tabs">
      <div
        class="tab js-tab js-tab-messages"
        :class="{active: openTabConversations}"
        @click="$store.commit('OPEN_TAB_CONVERSATIONS')"
      >Messages</div>
      <div
        class="tab js-tab js-tab-people"
        :class="{active: openTabUsers}"
        @click="$store.commit('OPEN_TAB_USERS')"
      >
        <span class="-ap icon-controller-record text-success"></span>&nbsp; Online
      </div>
      <div class="tab js-tab-create" @click="openNewInbox">+ New</div>
    </div>
    <div class="sections scrollable __set __apscrollbar_parent">
      <div
        class="scrollin absolute __regular"
        style="right: -17px; top: 0px; left: 0px; bottom: 0px;"
      >
        <div class="__apscrollbar_wrap">
          <conversations :openTabConversations="openTabConversations" />
          <tab-users :openTabUsers="openTabUsers" @online="online" />
        </div>
      </div>
      <!-- <div class="__apscrollbar"> -->
        <div class="scroller ui-draggable ui-draggable-handle active">
          <div class="sinner" style="height: 49px;"></div>
        </div>
      <!-- </div> -->
    </div>
  </div>
</template>

<script>
import Conversations from "../conversations";
import TabUsers from "./TabUsers";
import { mapActions, mapState } from "vuex";
export default {
  name: "channels",
  props: {
    collapsedMessages: { type: Boolean, default: false },
  },
  computed: {
    ...mapState({
      openTabConversations: (state) => state.conversations.openTabConversations,
      openTabUsers: (state) => state.conversations.openTabUsers,
    }),
  },
  methods: {
    ...mapActions(["getListUsers", "getSingleUserConversations"]),
    toggleMessagesBox() {
      this.getListUsers();
      if (this.collapsedMessages) {
        this.getSingleUserConversations();
      }
      this.$store.commit("TOGGLE_COLLAPSE_MESSAGES");
    },
    openNewInbox() {
      this.$store.commit("OPEN_INBOX");
      this.$store.commit("SET_CONVERSATION", null);
      this.$store.commit("SET_RECEIVER", null);
      this.$store.commit("SET_MESSAGES");
    },
    online(e) {
      this.$emit("online", e);
    },
  },
  components: {
    Conversations,
    TabUsers,
  },
};
</script>

<style>

</style>
