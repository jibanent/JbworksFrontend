<template>
  <b-tabs class="chat-support-wrap">
    <b-tab>
      <template v-slot:title>
        <i class="zmdi zmdi-comments mr-2 font-lg" /> Chat
      </template>
      <div class="idb-full-block">
        <chat />
      </div>
    </b-tab>
    <b-tab>
      <template v-slot:title>
        <i class="zmdi zmdi-headset-mic mr-2 font-lg" /> Support
      </template>
      <div class="support-block">
        <vue-perfect-scrollbar :settings="settings" style="height:495px">
          <b-list-group>
            <template v-for="(request, index) in supportRequest">
              <b-list-group-item :key="index" class="d-flex align-items-center">
                <div class="avatar-wrap mr-15">
                  <img :src="request.userAvatar" class="rounded-circle" alt="user" width="40" height="40">
                </div>
                <div>
                  <p class="font-sm mb-2">{{ request.title }}</p>
                  <div class="d-flex justify-content-between">
                    <span class="fs-12">By {{ request.userName }}</span>
                    <span class="fs-12">{{ request.post }}</span>
                  </div>
                </div>
              </b-list-group-item>
            </template>
          </b-list-group>
        </vue-perfect-scrollbar>
      </div>
    </b-tab>
  </b-tabs>
</template>

<script>
import Chat from './Chat'

export default {
  components: {
    Chat
  },
  data() {
    return {
      supportRequest: [
        {
          id: 1,
          userAvatar: '/static/img/user-1.jpg',
          title:
							'Is this theme support server side rendering? I want to use server side rendering.',
          userName: 'JohnDoe212',
          post: '21 hours ago',
          badge: 'success'
        },
        {
          id: 2,
          userAvatar: '/static/img/user-2.jpg',
          title:
							'Hey! I like this template. I want to purchase this theme but i have a question i.e., Is this theme have html template?',
          userName: 'JohnDoe212',
          post: '21 hours ago',
          badge: 'danger'
        },
        {
          id: 3,
          userAvatar: '/static/img/user-3.jpg',
          title:
							'Hey! I like this template. I want to purchase this theme but i have a question i.e., Is this theme have html template?',
          userName: 'JohnDoe212',
          post: '21 hours ago',
          badge: 'warning'
        },
        {
          id: 4,
          userAvatar: '/static/img/user-4.jpg',
          title:
							'Hey! I like this template. I want to purchase this theme but i have a question i.e., Is this theme have html template?',
          userName: 'JohnDoe212',
          post: '21 hours ago',
          badge: 'danger'
        },
        {
          id: 5,
          userAvatar: '/static/img/user-5.jpg',
          title:
							'Hey! I like this template. I want to purchase this theme but i have a question i.e., Is this theme have html template?',
          userName: 'JohnDoe212',
          post: '21 hours ago',
          badge: 'warning'
        },
        {
          id: 6,
          userAvatar: '/static/img/user-6.jpg',
          title:
							'Hey! I like this template. I want to purchase this theme but i have a question i.e., Is this theme have html template?',
          userName: 'JohnDoe212',
          post: '21 hours ago',
          badge: 'danger'
        },
        {
          id: 2,
          userAvatar: '/static/img/user-7.jpg',
          title:
							'Hey! I like this template. I want to purchase this theme but i have a question i.e., Is this theme have html template?',
          userName: 'JohnDoe212',
          post: '21 hours ago',
          badge: 'danger'
        }
      ],
      settings: {
        maxScrollbarLength: 100
      }
    }
  }
}
</script>
