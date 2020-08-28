<template>
  <div class="item is-channel conversation" @click="handleGetMessages">
    <div class="channel-image" v-if="conversation.users.length > 2">
      <div class="avatars" :class="usersInConversation(conversation.users)">
        <div
          class="avatar"
          :class="`avatar-${index + 1}`"
          v-for="(user, index) in conversation.users.slice(0, 4)"
          :key="user.id"
        >
          <img :src="user.avatar" />
        </div>
      </div>
    </div>
    <div class="channel-image" v-else>
      <div class="image" v-for="user in conversation.users.slice(1)" :key="user.id">
        <div class="single">
          <img :src="user.avatar" />
        </div>
      </div>
    </div>
    <div class="name ap-xdot">{{ conversation.name }}</div>
    <div class="channel-lm">
      <div class="msg">
        <div
          class="ap-xdot"
          v-if="conversation.latest_messages"
        >{{ conversation.latest_messages.message }}</div>
      </div>
    </div>
    <div class="unread-count">0</div>
  </div>
</template>

<script>
import { mapActions } from "vuex";
export default {
  name: "conversation-item",
  props: {
    conversation: { type: Object, default: null },
  },
  methods: {
    ...mapActions(["getMessagesByConversation"]),
    usersInConversation(users) {
      if (users.length === 3) return "-three";
      if (users.length > 3) return "-four";
    },
    handleGetMessages() {
      this.$store.commit("OPEN_INBOX");
      this.$store.commit("SET_CONVERSATION", this.conversation);
      this.$store.commit("SET_RECEIVER");
      this.getMessagesByConversation({ conversation_id: this.conversation.id });
    },
  },
};
</script>

<style scoped lang="scss">
.avatar {
  width: 18px;
  height: 18px;
}
.avatar img, .single img {
  object-fit: cover;
  object-position: center;
}

.avatars.-four {
  .avatar-1 {
    top: 0px;
    left: 0px;
  }
  .avatar-2 {
    top: 0px;
    left: 18px;
    z-index: 100;
  }
  .avatar-3 {
    top: 18px;
    left: 18px;
    z-index: 101;
  }
  .avatar-4 {
    top: 18px;
    left: 0px;
    z-index: 101;
  }
}

.avatars.-three {
  .avatar-1 {
    width: 36px;
    height: 36px;
    top: 0px;
    left: 0px;
  }
  .avatar-2 {
    top: 0px;
    left: 18px;
    z-index: 100;
  }
  .avatar-3 {
    top: 18px;
    left: 18px;
    z-index: 101;
  }
}
</style>
