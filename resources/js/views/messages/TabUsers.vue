
<template>
  <div class="section section-people" :class="{active: openTabUsers}">
    <div class="panel-search">
      <input type="text" placeholder="Tìm nhanh thành viên" name="search" id="js-panel-psearch" />
    </div>
    <div
      class="item js-person"
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
      <div class="signal -online"></div>
    </div>
  </div>
</template>

<script>
import { mapState, mapActions } from "vuex";
import { getAvatar } from "../../helpers";
export default {
  name: "tab-users",
  props: {
    openTabUsers: { type: Boolean, default: false },
  },
  computed: {
    ...mapState({
      listUsers: (state) => state.messages.listUsers,
    }),
  },
  methods: {
    ...mapActions(["getMessagesByConversation"]),
    avatar(url) {
      return getAvatar(url);
    },
    selectReciever(user) {
      console.log('user', user);
      this.$store.commit("OPEN_INBOX");
      this.$store.commit("SET_CONVERSATION");
      this.$store.commit("SET_RECEIVER", user);
      this.getMessagesByConversation({ receiver_id: user.id });
    },
  },
};
</script>

<style scoped>
.single img {
  object-fit: cover;
  object-position: center;
}
</style>
