<template>
  <vue-perfect-scrollbar :settings="settings" class="scroll-length">
    <b-list-group>
      <b-list-group-item
        v-for="article in newArticle"
        :key="article.id"
        class="d-sm-flex align-items-center article-item"
      >
        <div class="img-wrap mb-sm-0 mb-4">
          <img :src="article.thumbnail" width="80" height="80" alt="post" class="rounded-circle">
        </div>
        <div class="article-text-wrap pr-sm-3 mb-sm-0 mb-4">
          <h5>{{ article.title }}</h5>
          <p class="fs-14 artical-author mb-2">{{ $t('message.by') }}: {{ article.authorName }}</p>
          <div class="post-actions mb-20">
            <a href="javascript:;" class="font-xs"><i
              class="zmdi zmdi-edit text-muted font-sm"
            />{{ $t('message.editPost') }}</a>
            <a href="javascript:;" class="font-xs"><i
              class="zmdi zmdi-delete text-muted font-sm"
            />{{ $t('message.deletePost') }}</a>
          </div>
          <b-button size="sm" class="text-capitalize" :variant="article.btnColor">{{ article.btnText }}</b-button>
        </div>
        <img class="rounded" :src="article.sideImg" width="150" height="100" alt="post">
      </b-list-group-item>
    </b-list-group>
  </vue-perfect-scrollbar>
</template>

<script>
import { newArticle } from 'Assets/data/newArticle.js'

export default {
  data() {
    return {
      newArticle,
      settings: {
        maxScrollbarLength: 120
      },
      dialog: false,
      newArticleS: {
        title: '',
        authorName: ''
      },
      modal: '',
      snackbar: false,
      snackbarMessage: '',
      timeout: 2000,
      y: 'top'
    }
  },
  methods: {
    showModal() {
      this.$refs.myModalRef.show()
    },
    hideModal() {
      this.$refs.myModalRef.hide()
    }
  }
}
</script>
