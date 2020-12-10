<template>
  <div class="chat2-wrap">
    <div>
      <vue-perfect-scrollbar id="chat-scroll" style="height:375px" :settings="settings">
        <div class="chat2-listing">
          <template v-for="(chat, index) in chats">
            <div :key="index" class="d-flex align-items-center border-bottom">
              <template v-if="chat.isAdmin">
                <div class="mr-3 thumb-wrap">
                  <img
                    src="/static/img/user-13.jpg"
                    alt="user-profile"
                    width="64"
                    height="64"
                    class="rounded-circle"
                  >
                </div>
                <div class="chat-content">
                  <div>
                    <h5 class="d-inline-block mr-2">{{ chat.adminName }}</h5>
                    <span class="d-inline-block text-muted fs-14">{{ chat.time }}</span>
                  </div>
                  <div>
                    <p class="mb-0">{{ chat.body }}</p>
                  </div>
                </div>
              </template>
              <template v-else>
                <div class="mr-3 thumb-wrap">
                  <img
                    src="/static/img/user-9.jpg"
                    alt="user-profile"
                    width="64"
                    height="64"
                    class="rounded-circle"
                  >
                </div>
                <div class="chat-content">
                  <div>
                    <h5 class="d-inline-block mr-2">{{ chat.userName }}</h5>
                    <span class="d-inline-block text-muted fs-14">{{ chat.time }}</span>
                  </div>
                  <div>
                    <p class="mb-0">{{ chat.body }}</p>
                  </div>
                </div>
              </template>
            </div>
          </template>
          <div v-if="typing" class="d-flex align-items-center">
            <div class="mr-3 thumb-wrap">
              <img src="/static/img/user-9.jpg" alt="user-profile" width="64" height="64" class="rounded-circle">
            </div>
            <div class="chat-content">
              <div class="animated bounce text-primary fw-semi-bold">Typing . . .</div>
            </div>
          </div>
        </div>
      </vue-perfect-scrollbar>
    </div>
    <div slot="footer" class="send-message-box pt-3">
      <div class="d-flex align-items-center">
        <input
          id="sendMessage"
          v-model="newMessage"
          class="chat-input form-control border-bottom rounded-0"
          name="send-message"
          solo
          label="Send Message"
          @keyup.enter="sendMessage"
        >
        <b-btn class="ml-3 btn-icon rounded-circle gradient-primary" @click="sendMessage">
          <i class="zmdi zmdi-mail-send pl-1" />
        </b-btn>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      chats: [
        {
          id: 1,
          body: 'Hi There! Recently I updated the latest version of your app, it crashed every time when i open.Please help me out as soon as possible.....Thanks',
          isAdmin: false,
          userName: 'Max Wells',
          time: '10 Min Ago'
        },
        {
          id: 2,
          body: 'Hi There! Recently I updated the latest version of your app, it crashed every time when i open.Please help me out as soon as possible.....Thanks',
          isAdmin: true,
          adminName: 'Andre Adkins',
          time: '8 Min Ago'
        },
        {
          id: 3,
          body: 'Hi There! Recently I updated the latest version of your app, it crashed every time when i open.Please help me out as soon as possible.....Thanks',
          isAdmin: false,
          userName: 'Max Wells',
          time: '7 Min Ago'
        },
        {
          id: 4,
          body: 'Hi There! Recently I updated the latest version of your app, it crashed every time when i open.Please help me out as soon as possible.....Thanks',
          isAdmin: true,
          adminName: 'Andre Adkins',
          time: '5 Min Ago'
        }
      ],
      settings: {
        maxScrollbarLength: 160
      },
      newMessage: '',
      typing: false,
      randomMessages: [
        'How are you?',
        'We are glad to know',
        'How can I help you?',
        'We are happy to help you'
      ]
    }
  },
  updated() {
    if (this.newMessage == '') {
      this.scrollToEnd()
    }
  },
  methods: {
    sendMessage() {
      if (this.newMessage !== '') {
        const newMessage = {
          id: new Date().getTime(),
          body: this.newMessage,
          avatar: '/static/img/user-12.jpg',
          isAdmin: true,
          adminName: 'Andre Adkins',
          time: 'Just Now'
        }
        this.chats.push(newMessage)
        this.newMessage = ''
        this.scrollToEnd()
        setTimeout(() => {
          this.typing = true
          this.getReply()
        }, 3000)
      }
    },
    getReply() {
      const randomMessage = Math.floor(
        Math.random() * this.randomMessages.length
      )
      const reply = {
        id: new Date().getTime(),
        body: this.randomMessages[randomMessage],
        avatar: '/static/avatars/user-14.jpg',
        isAdmin: false,
        userName: 'Max Wells',
        time: 'Just Now'
      }
      setTimeout(() => {
        this.typing = false
        setTimeout(() => {
          this.chats.push(reply)
        }, 200)
      }, 3000)
    },
    scrollToEnd() {
      var container = document.getElementById('chat-scroll')
      if (container !== null) {
        var scrollHeight = container.scrollHeight
        container.scrollTop = scrollHeight
      }
    }
  }
}
</script>
