<template>
  <app-card
    custom-classes="h-100 recent-comment"
    :heading="$t('message.recentComments')"
    :heading-menu="true"
    :full-block="true"
  >
    <vue-perfect-scrollbar :settings="settings" class="scroll-length">
      <b-list-group>
        <b-list-group-item
          v-for="(comment, index) in recentComments"
          :key="index"
          class="recent-commment-item d-flex py-15 px-20"
        >
          <div class="avatar-wrap">
            <img :src="comment.img" alt="user" class="rounded-circle" width="45" height="45">
          </div>
          <div>
            <div class="d-flex justify-content-between">
              <h5 class="mb-2">{{ comment.name }}</h5>
              <span class="text-muted fs-12">{{ comment.date }}</span>
            </div>
            <p class="font-sm mb-10 text-muted">{{ comment.description }}</p>
            <b-badge class="badge-md" :variant="comment.color">{{ comment.status }}</b-badge>
          </div>
        </b-list-group-item>
      </b-list-group>
    </vue-perfect-scrollbar>
  </app-card>
</template>

<script>
import { recentComments } from 'Assets/data/recentComments.js'

export default {
  data() {
    return {
      recentComments,
      settings: {
        maxScrollbarLength: 160
      },
      settings: {
        maxScrollbarLength: 100
      }
    }
  },
  methods: {
    onDeleteComment(comment) {
      const indexOfComment = this.recentComments.indexOf(comment)
      this.recentComments.splice(indexOfComment, 1)
      this.showCommentDeletedMessage()
    },
    approveComment(comment) {
      const indexOfComment = this.recentComments.indexOf(comment)
      this.recentComments[indexOfComment].approved = 1
      this.showCommentAprovedMessage()
    }
  },
  notifications: {
    showCommentAprovedMessage: {
      message: 'Comment has beed approved.',
      type: 'success'
    },
    showCommentDeletedMessage: {
      message: 'Comment has beed deleted.',
      type: 'success'
    }
  }
}
</script>
