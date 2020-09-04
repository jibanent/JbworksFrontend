<template>
  <div id="msg-root" :class="{ collapsed: collapsedMessages }">
    <channels :collapsedMessages="collapsedMessages" @online="online" />
    <inbox :online="className"/>
  </div>
</template>

<script>
import Channels from "./Channels";
import Inbox from "./Inbox";
import { mapState } from "vuex";
export default {
  name: "messages",
  data() {
    return {
      className: ''
    }
  },
  computed: {
    ...mapState({
      collapsedMessages: (state) => state.messages.collapsedMessages,
    }),
  },
  methods: {
    online(e) {
      this.className = e
    },
  },
  components: {
    Channels,
    Inbox,
  },
};
</script>

<style></style>
