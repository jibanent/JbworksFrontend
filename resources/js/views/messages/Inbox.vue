<template>
  <div id="js-msg-boxes" class="msg-boxes">
    <div
      class="msg-channel is-channel smart-create js-dndcanvas"
      :class="{ collapsed: collapsedInbox }"
      v-if="openInbox"
    >
      <div class="channel-header">
        <div class="title -online" v-if="conversation || receiver">
          <div class="channel-explain" v-if="conversation">
            <div class="cr"></div>
            <div class="cus">
              <div
                class="li -online"
                v-for="user in conversation.users"
                :key="user.id"
              >{{ user.name }}</div>
            </div>
          </div>
          <div class="ap-xdot">
            <span class="url" v-if="conversation">{{ conversation.name }}</span>
            <span class="url" v-if="receiver">{{ receiver.name }}</span>
          </div>
        </div>

        <div class="title" v-else>New message</div>

        <div class="icons">
          <div
            class="icon js-channel-minus"
            @click="toggleCollapseInbox"
            v-if="conversation || receiver"
          >
            <div class="hexp">
              <div class="txt">Thu nhỏ / phóng to</div>
            </div>
            <span class="ficon-minus"></span>
          </div>
          <div
            class="icon js-channel-add-people"
            @click="$store.commit('TOGGLE_ADD_USERS')"
            v-if="conversation && conversation.type=='group'"
          >
            <div class="hexp">
              <div class="txt">Thêm thành viên</div>
            </div>
            <span class="ficon-plus"></span>
          </div>
          <div class="icon js-channel-close" @click="$store.commit('CLOSE_INBOX')">
            <div class="hexp">
              <div class="txt">Đóng</div>
            </div>
            <span class="-ap icon-ion-android-close"></span>
          </div>
        </div>
      </div>
      <div class="channel-create" v-if="!(conversation || receiver)">
        <div class="label">To:</div>
        <div class="input">
          <a-mentions v-model="value" placeholder="Type @ to tag">
            <a-mentions-option v-for="user in listUsers.data" :key="user.id" :value="user.username">
              <img :src="user.avatar" style="width: 20px; margin-right: 8px;" />
              <span style="font-weight: bold">@{{ user.username }}</span> -
              <span>{{ user.name }}</span>
            </a-mentions-option>
          </a-mentions>
        </div>
      </div>
      <div class="channel-useradd" :class="{ active: isAddUser }">
        <a-mentions
          v-model="users"
          placeholder="+ Thêm thành viên để chat"
          class="__autoc __autoresized"
        >
          <a-mentions-option v-for="user in listUsers.data" :key="user.id" :value="user.username">
            <img :src="user.avatar" style="width: 20px; margin-right: 8px;" />
            <span style="font-weight: bold">@{{ user.username }}</span> -
            <span>{{ user.name }}</span>
          </a-mentions-option>
        </a-mentions>
        <div class="submit" @click="handleAddUsersToConversation">Thêm</div>
      </div>
      <div
        id="scrollBox"
        class="channel-body scrollable __set __apscrollbar_parent __inf"
        v-chat-scroll="{ always: false }"
        @v-chat-scroll-top-reached="loadMore"
      >
        <div
          class="scrollin absolute __regular"
          style="right: -17px; top: 0px; left: 0px; bottom: 0px;"
        >
          <div class="__apscrollbar_wrap">
            <div class="channel-messages" v-if="renderMessages">
              <inbox-item v-for="message in renderMessages" :key="message.id" :message="message" />
            </div>
          </div>
        </div>
        <div class="scroller ui-draggable ui-draggable-handle active">
          <div class="sinner" style="height: 66px;"></div>
        </div>
      </div>
      <div class="channel-form">
        <div class="msg-form">
          <div class="wrapper">
            <div class="textarea">
              <div class="inputw">
                <div class="input">
                  <textarea
                    rows="1"
                    class="msg-input __autoc __autoresized __ap_enter_binded"
                    placeholder="Type to send message"
                    style="overflow: hidden; overflow-wrap: break-word; height: 26px;"
                    v-model="message"
                    @keyup.enter="handleSendMessage"
                  ></textarea>
                  <div class="help hidden"></div>
                </div>
              </div>
            </div>
            <div class="smart-send" @click="handleSendMessage">Send</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapState, mapGetters, mapActions } from "vuex";
import InboxItem from "./InboxItem";
import VueCookie from "vue-cookie";

import "ant-design-vue/lib/mentions/style/index.css";
export default {
  name: "inbox",
  data() {
    return {
      value: "",
      page: 1,
      message: "",
      users: "",
    };
  },
  mounted() {
    Echo.connector.options.auth.headers["Authorization"] =
      "Bearer " + VueCookie.get("access_token");

    Echo.private("users." + this.currentUser.id).listen(
      "MessageDelivered",
      (e) => {
        this.$store.commit("SEND_NEW_MESSAGE", e.message);
        if (e.conversation) {
          this.$store.commit("SET_NEW_CONVERSATION", e.conversation);
        }
      }
    );

    Echo.join("user-online")
      .here((users) => {
        this.$store.commit("SET_USERS_ONLINE", users);
      })
      .joining((user) => {
        this.$store.commit("SET_ONLINE", user);
      })
      .listen("UserOnline", (e) => {
        this.$store.commit("SET_ONLINE", e.user);
      })
      .leaving((user) => {
        this.$store.commit("SET_OFFLINE", user);
      });
  },

  computed: {
    ...mapGetters(["renderMessages"]),
    ...mapState({
      currentUser: (state) => state.auth.currentUser,
      collapsedInbox: (state) => state.messages.collapsedInbox,
      openInbox: (state) => state.messages.openInbox,
      conversation: (state) => state.conversations.conversation,
      lastPage: (state) => state.messages.lastPage,
      currentPage: (state) => state.messages.currentPage,
      listUsers: (state) => state.messages.listUsers,
      receiver: (state) => state.conversations.receiver,
      isAddUser: (state) => state.messages.isAddUser,
    }),
  },
  methods: {
    ...mapActions([
      "getMessagesByConversation",
      "sendMessage",
      "storeConversationAndMessages",
      "addUsersToConversation",
    ]),
    toggleCollapseInbox() {
      this.$store.commit("TOGGLE_COLLAPSE_INBOX");
    },
    handleSendMessage(e) {
      e.preventDefault();

      if (this.conversation && this.message.trim().length) {
        const data = {
          conversation_id: this.conversation.id,
          message: this.message,
        };
        this.sendMessage(data);
        this.message = "";
      }

      if (!this.conversation && this.message.trim().length) {
        let users = [];
        if (this.value) {
          users = this.value
            .split(" ")
            .map((item) => item.split(/[^a-zA-Z1-9]/g).pop())
            .filter((item) => item != "");
        } else {
          users.push(this.receiver.username);
        }
        const data = {
          message: this.message,
          users: [...new Set(users)],
        };
        this.storeConversationAndMessages(data).then((response) => {
          if (!response.error) {
            this.$store.commit("SET_RECEIVER");
          }
        });
        this.message = "";
        this.value = "";
      }
    },
    loadMore() {
      if (this.currentPage !== this.lastPage) {
        this.page++;
        this.getMessagesByConversation({
          conversation_id: this.conversation.id,
          page: this.page,
        }).then((response) => {
          if (!response.error) {
            if (this.currentPage === this.lastPage) this.page = 1;
          }
        });
      }
      const scrollBox = document.getElementById("scrollBox");
      if (scrollBox.scrollTop === 0) scrollBox.scrollTop = 2;
    },
    handleAddUsersToConversation() {
      let users = this.users
        .split(" ")
        .map((item) => item.split(/[^a-zA-Z1-9]/g).pop())
        .filter((item) => item != "");
      if (this.users.length) {
        this.addUsersToConversation({
          conversation_id: this.conversation.id,
          users: [...new Set(users)],
        });
        this.users = "";
      }
    },
  },
  destroyed() {
    Echo.leave("user-online");
  },
  components: {
    InboxItem,
  },
};
</script>

<style>
.ant-mentions {
  border: none !important;
}
</style>
