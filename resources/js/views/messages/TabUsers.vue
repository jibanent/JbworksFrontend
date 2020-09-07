
<template>
  <div class="section section-people" :class="{active: openTabUsers}">
    <div class="panel-search">
      <input type="text" placeholder="Tìm nhanh thành viên" name="search" id="js-panel-psearch" />
    </div>
    <div id="list-user">
      <div class="sep">Offline</div>
      <div
        class="item js-person"
        :class="online(user)"
        v-for="user in listUsers.data"
        :key="user.id"
        @click="selectReciever(user)"
      >
        <div class="channel-image">
          <div class="image">
            <div class="single">
              <img :src="avatar(user.avatar)" />
            </div>
          </div>
        </div>
        <div class="name ap-xdot">{{ user.name }}</div>
        <div class="signal" :class="online(user)"></div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapState, mapActions } from "vuex";
import { getAvatar } from "../../helpers";
import $ from "jquery";
export default {
  name: "tab-users",
  props: {
    openTabUsers: { type: Boolean, default: false },
  },
  computed: {
    ...mapState({
      listUsers: (state) => state.messages.listUsers,
      usersOnline: (state) => state.messages.usersOnline,
    }),
  },
  updated() {
    $(".js-person.-online").prependTo("#list-user");
    $(".js-person.-offline").appendTo("#list-user");
  },
  methods: {
    ...mapActions(["getMessagesByConversation"]),
    avatar(url) {
      return getAvatar(url);
    },
    selectReciever(user) {
      this.$store.commit("OPEN_INBOX");
      this.$store.commit("SET_CONVERSATION");
      this.$store.commit("SET_RECEIVER", user);
      this.getMessagesByConversation({ receiver_id: user.id });
    },
    online(user) {
      const found = this.usersOnline.findIndex((item) => item.id === user.id);
      if (found === -1) return "-offline";
      return "-online";
    },
  },
};
</script>

<style scoped>
.single img {
  object-fit: cover;
  object-position: center;
}
#list-user {
  padding-right: 10px
}
</style>
