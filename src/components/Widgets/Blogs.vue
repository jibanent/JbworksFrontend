<template>
  <app-card custom-classes="blogs grid-b-space" :heading="$t('message.recentPosts')" :full-block="true">
    <b-list-group>
      <b-list-group-item v-for="blog in blogs" :key="blog.id" class="d-sm-flex py-15 px-20 list-item-wrap">
        <div class="d-sm-flex list-wrap">
          <div class="avatar-wrap mb-sm-0 mb-3">
            <img :src="blog.thumbnail" alt="blog gallery" class="img-fluid" width="220" height="170">
          </div>
          <div class="content-wrap">
            <span class="font-xs d-block mb-2 meta-info">Share Public Post - {{ blog.date }}</span>
            <p class="fs-14 text-muted mb-2">{{ blog.content }}</p>
            <div class="post-actions">
              <a href="javascript:;" class="font-xs text-muted"><i
                class="zmdi zmdi-comment font-sm text-success"
              />{{ blog.comments }} Comments</a>
              <a href="javascript:;" class="font-xs text-muted"><i
                class="zmdi zmdi-thumb-up font-sm text-primary"
              />{{ blog.likes }} Likes</a>
            </div>
          </div>
        </div>
        <div class="btn-wrap d-xl-flex">
          <a href="javascript:;" class="icon-btn text-primary mb-md-0 mb-2"><i class="zmdi zmdi-edit" /></a>
          <a href="javascript:;" class="icon-btn text-danger "><i class="zmdi zmdi-delete" /></a>
        </div>
      </b-list-group-item>
    </b-list-group>
  </app-card>
</template>

<script>
import { blogs } from 'Assets/data/blogs.js'

export default {
  data() {
    return {
      blogs
    }
  }
}
</script>
