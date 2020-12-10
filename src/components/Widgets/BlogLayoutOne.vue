<template>
  <app-card custom-classes="blog-layout one overflow-hide blog-layout-one h-100" :full-block="true">
    <div class="card-thumbnail">
      <img class="img-fluid" src="/static/img/post-1.jpg" height="400" alt="blog">
    </div>
    <div class="card-body pos-relative">
      <a href="javascript:;" class="icon-btn top"><i class="zmdi zmdi-share" /></a>
      <div class="media mb-15 align-items-center">
        <div class="img-wrap">
          <img src="/static/img/user-1.jpg" class="rounded-circle" width="65" height="65" alt="author">
        </div>
        <div class="media-body">
          <h5>Alejandro Garza</h5>
          <span class="font-xs text-muted">Share Public Post- a hours ago</span>
        </div>
      </div>
      <div class="blog-content">
        <div class="custom-p-lh">
          <p class="font-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, dolores facilis
            maiores minus itaque excepturi.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, dolores
            facilis maiores minus itaque excepturi. Review the document and start development.</p>
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
  </app-card>
</template>
