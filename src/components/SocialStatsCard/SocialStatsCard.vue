<template>
  <app-card>
    <div class="media">
      <div class="d-flex mr-30">
        <i :class="`fa fa-${icon} font-5x ${type}-color`" />
      </div>
      <div class="media-body py-10">
        <h3>#{{ hashtag }}</h3>
        <p class="m-0">{{ followers }} {{ $t('message.followers') }} - {{ likes }} {{ $t('message.likes') }}</p>
      </div>
    </div>
  </app-card>
</template>

<script>
export default {
  props: ['hashtag', 'type', 'followers', 'likes', 'icon']
}
</script>
