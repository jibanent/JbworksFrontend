<template>
  <div class="channel-form">
    <div id="msg-form-24973" class="msg-form">
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
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions } from "vuex";
export default {
  name: "inbox-form",
  props: {
    receiver: { type: Object, default: null }
  },
  data() {
    return {
      message: ""
    };
  },
  methods: {
    ...mapActions(["sendMessage"]),
    handleSendMessage() {
      if (this.message != "") {
        const data = { receiver_id: this.receiver.id, message: this.message };
        this.sendMessage(data);
        this.message = "";
      }
    }
  }
};
</script>

<style></style>
