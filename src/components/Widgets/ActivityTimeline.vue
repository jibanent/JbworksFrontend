<template>
  <div class="timeline-wrap">
    <div class="activity-meta-info">
      <span class="text-muted fs-12 mb-10 d-block">{{ $t('message.today') }}</span>
    </div>
    <ul class="list-unstyled">
      <li class="media mb-20">
        <div class="img-wrap">
          <img src="/static/img/user-5.jpg" alt="user" class="rounded-circle" width="45" height="45">
        </div>
        <div class="media-body">
          <div class="mb-20 order-view activity-meta-info">
            <h6 class="fs-14">John S. Added a review about last order <span
              class="text-primary d-inline-block fs-14"
            >#148855</span></h6>
            <p class="text-muted fs-12">10 min ago</p>
          </div>
          <div class="border p-10">
            <ul class="list-inline mb-2">
              <li v-for="(stars, index) in 5" :key="index" class="list-inline-item">
                <a href="javascript:;" class="text-warning"><i class="zmdi zmdi-star" /></a>
              </li>
            </ul>
            <h6 class="fs-12 mb-0">Received product and it was awesome as per described. Thank you team adminify.
            </h6>
          </div>
        </div>
      </li>
      <li class="media mb-20">
        <img src="/static/img/user-6.jpg" class="mr-20 rounded-circle" alt="user" width="45" height="45">
        <div class="media-body">
          <div class="mb-20 activity-meta-info">
            <h6 class="fs-14"><span class="text-primary d-inline-block">Kendal Bing</span> Added New Products</h6>
            <p class="text-muted fs-12">1 hour ago</p>
          </div>
          <ul class="list-inline">
            <li v-for="(activity, index) in activityTimeline" :key="index" class="list-inline-item mt-1 mb-xs-2">
              <img :src="activity.img" alt="product" width="130" height="100" class="img-fluid mb-1">
              <h5 class="fs-14 m-0">{{ activity.name }}</h5>
              <span class="fs-12 text-muted">{{ activity.price }}</span>
            </li>
          </ul>
        </div>
      </li>
      <li class="media">
        <img src="/static/img/user-13.jpg" alt="user" class="mr-20 rounded-circle" width="45" height="45">
        <div class="media-body activity-meta-info">
          <h6 class="fs-14"><span class="text-primary  d-inline-block ">Bonnie Bennet</span> Posted Blog</h6>
          <p class="text-muted fs-12">10 min ago</p>
          <div class="d-md-flex">
            <div class="img-wrap mb-2">
              <img src="/static/img/post-1.jpg" alt="post" class="img-fluid" width="151" height="100">
            </div>
            <div>
              <h6>How to setup your estore in 10 min.</h6>
              <p class="fs-12">Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh
                elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper
              </p>
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
        </div>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  data() {
    return {
      activityTimeline: [
        {
          name: 'Garden sprinkler',
          price: '$152.00',
          img: '/static/img/10.jpg'
        },
        {
          name: 'Portable Invoice',
          price: '$152.00',
          img: '/static/img/4.jpg'
        },
        {
          name: 'Walkytalky phones',
          price: '$152.00',
          img: '/static/img/3.jpg'
        }
      ]
    }
  }
}
</script>
