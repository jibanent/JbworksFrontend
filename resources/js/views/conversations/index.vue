<template>
  <div class="section section-messages" :class="{active: openTabConversations}">
    <conversation-item
      v-for="conversation in conversations"
      :conversation="conversation"
      :key="conversation.id"
    />
  </div>
</template>

<script>
import { mapState } from "vuex";
import ConversationItem from "./ConversationItem";
export default {
  name: "conversations",
  props: {
    openTabConversations: { type: Boolean, default: true },
  },
  computed: {
    ...mapState({
      conversations: (state) => state.conversations.conversations,
    }),
  },
  components: { ConversationItem },
};
</script>

<style>
</style>
