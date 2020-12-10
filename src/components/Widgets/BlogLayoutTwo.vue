<template>
  <app-card
    app-card-class="h-100 d-flex justify-content-between flex-column"
    custom-classes="blog-layout two  blog-layout-two h-100"
    :full-block="true"
    :enable-footer="true"
  >
    <div class="media p-20">
      <div class="img-wrap">
        <img src="/static/img/user-2.jpg" class="rounded-circle" width="65" height="65" alt="author">
      </div>
      <div class="media-body pt-15">
        <h5>Alejandro Garza</h5>
        <span class="font-xs text-muted">Share Public Post- a hours ago</span>
      </div>
    </div>
    <div class="gradient-primary pos-relative">
      <a href="javascript:;" class="icon-btn top"><i class="zmdi zmdi-share" /></a>
      <div class="py-50 px-20">
        <h2 class="mb-0">Technology Tools: Web 2.0 in the Classroom</h2>
      </div>
    </div>
    <div class="card-body">
      <div class="blog-content">
        <div class="custom-p-lh">
          <p class="font-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, dolores facilis
            maiores minus itaque excepturi.</p>
          <p class="font-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, dolores facilis
            maiores minus itaque excepturi. Review the document and start development. Complete all pending points
            of the theme.Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        </div>
        <div class="post-actions">
          <a href="javascript:;" class="font-xs text-muted"><i
            class="zmdi zmdi-comment font-sm text-success"
          />21 Comments</a>
          <a href="javascript:;" class="font-xs text-muted"><i
            class="zmdi zmdi-thumb-up font-sm text-primary"
          />16 Likes</a>
        </div>
      </div>
    </div>
    <div slot="footer" class="d-flex justify-content-between align-items-center">
      <b-button size="sm" variant="primary" class="text-capitalize">
        {{ $t('message.reply') }}
      </b-button>
      <div class="footer-action d-flex">
        <a href="javascript:;" class="icon-btn text-primary"><i class="zmdi zmdi-edit" /></a>
        <a href="javascript:;" class="icon-btn text-danger "><i class="zmdi zmdi-delete" /></a>
      </div>
    </div>
  </app-card>
</template>
