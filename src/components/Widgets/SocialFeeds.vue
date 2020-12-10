<template>
  <div>
    <span :class="type" class="social-icon d-flex align-items-center rounded-circle">
      <i :class="socialIcon" />
    </span>
    <span>
      <span class="d-block fw-bold">{{ followers }}</span>
      <span class="d-block">{{ $t('message.followers') }}</span>
    </span>
    <span>
      <span class="d-block fw-bold">{{ likes }}</span>
      <span class="d-block">{{ $t('message.likes') }}</span>
    </span>
  </div>
</template>
<script>
export default {
  props: ['socialIcon', 'followers', 'type', 'likes']
}
</script>
