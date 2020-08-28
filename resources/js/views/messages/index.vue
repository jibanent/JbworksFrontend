<template>
  <div id="msg-root" :class="{ collapsed: collapsedMessages }">
    <channels :collapsedMessages="collapsedMessages" />
    <inbox  />
  </div>
</template>

<script>
import Channels from "./Channels";
import Inbox from "./Inbox";
import { mapState } from "vuex";
export default {
  name: "messages",
  computed: {
    ...mapState({
      collapsedMessages: state => state.messages.collapsedMessages,
    })
  },
  components: {
    Channels,
    Inbox
  }
};
</script>

<style></style>
