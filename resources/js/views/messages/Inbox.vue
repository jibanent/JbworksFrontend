<template>
  <div id="js-msg-boxes" class="msg-boxes">
    <div
      class="msg-channel is-channel smart-create js-dndcanvas"
      :class="{ collapsed: collapsedInbox }"
      v-if="openInbox"
    >
      <div class="channel-header">
        <div class="title" :class="{'-online': isOnline}" v-if="conversation || receiver">
          <div class="channel-explain" v-if="conversation">
            <div class="cr"></div>
            <div class="cus">
              <div
                class="li"
                :class="online(user)"
                v-for="user in conversation.users"
                :key="user.id"
              >{{ user.name }}</div>
            </div>
          </div>
          <div class="ap-xdot">
            <span class="url" @click="$store.commit('TOGGLE_EDIT_CONVERSATION')">{{ titleInbox }}</span>
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
          class="scrollin absolute __regular __scrolled"
          style="right: -17px; top: 0px; left: 0px; bottom: 0px;"
        >
          <div class="__apscrollbar_wrap">
            <div class="channel-messages" v-if="renderMessages">
              <inbox-item
                v-for="message in renderMessages"
                :key="message.id"
                :message="message"
                :currentUser="currentUser"
              />
            </div>
            <div class="channel-seens">
              <div
                class="avatars"
                v-if="renderMessages[renderMessages.length - 1] && renderMessages[renderMessages.length - 1].readers"
              >
                <div
                  class="avatar"
                  :title="`Seen by ${user.name} (@${user.username})`"
                  v-for="user in renderMessages[renderMessages.length - 1].readers"
                  :key="user.id"
                >
                  <img :src="user.avatar" />
                </div>
              </div>
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
                    @focus="handleMarkRead"
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

    Echo.private("users." + this.currentUser.id)
      .listen("MessageDelivered", (e) => {
        if (e.conversation.id === this.conversation.id) {
          this.$store.commit("SEND_NEW_MESSAGE", e.message);
        }

        if (e.conversation) {
          console.log("MessageDelivered", e);
          this.$store.commit("SET_NEW_CONVERSATION", e.conversation);
        }
      })
      .listen("MarkMessageAsRead", (e) => {
        console.log('MarkMessageAsRead', e);
        if (e.conversation.id === this.conversation.id) {
          this.$store.commit("SET_READER", e.reader);
        }
      });

    Echo.join("user-online")
      .here((users) => {
        this.$store.commit("SET_USERS_ONLINE", users);
      })
      .joining((user) => {
        this.$store.commit("SET_ONLINE", user);
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
      usersOnline: (state) => state.messages.usersOnline,
    }),
    titleInbox() {
      if (this.conversation && this.conversation.users.length === 2) {
        const user = this.conversation.users.filter((item) => {
          return item.id !== this.currentUser.id;
        });
        return user[0].name;
      }
      if (this.conversation && this.conversation.users.length > 2)
        return this.conversation.name;

      if (!this.conversation && this.receiver) return this.receiver.name;
    },
    isOnline() {
      if (this.conversation) {
        const users = this.conversation.users.filter((item) => {
          return item.id !== this.currentUser.id;
        });

        const hasUserOnline = this.usersOnline.some((r) =>
          users.find((u) => {
            return r.id === u.id;
          })
        );

        return hasUserOnline;
      }

      if (this.receiver) {
        const found = this.usersOnline.findIndex(
          (item) => item.id === this.receiver.id
        );
        if (found === -1) return false;
        else return true;
      }
    },
  },
  methods: {
    ...mapActions([
      "getMessagesByConversation",
      "sendMessage",
      "storeConversationAndMessages",
      "addUsersToConversation",
      "markRead",
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
        this.storeConversationAndMessages(data);
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
    online(user) {
      const found = this.usersOnline.findIndex((item) => item.id === user.id);
      if (found === -1) return "-offline";
      return "-online";
    },
    handleMarkRead() {
      if(!this.conversation && !this.receiver) return false;
      if (this.receiver) {
        this.markRead({
          receiver_id: this.receiver.id,
        });
      } else {
        this.markRead({
          conversation_id: this.conversation.id,
        });
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
