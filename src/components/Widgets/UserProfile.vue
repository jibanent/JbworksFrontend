<!-- User Profile Widget -->
<template>
  <app-card
    content-custom-class="h-100 d-flex flex-column justify-content-between"
    app-card-class="h-100"
    custom-classes="card-height user-profile-widget h-100"
    :full-block="true"
  >
    <div class="avatar-wrap mb-15 pos-relative">
      <span class="overlay-content" />
      <div class="user-avatar">
        <img
          src="/static/img/user-1.jpg"
          alt="reviwers"
          width="95"
          height="95"
          class="img-responsive rounded-circle mr-3"
        >
        <div class="text-white pt-4">
          <h5 class="mb-0 fw-semi-bold">Phoebe Henderson</h5>
          <span class="fs-14">CEO</span>
        </div>
      </div>
    </div>
    <div class="user-detail-wrap px-25">
      <div class="py-25 user-info">
        <ul class="list-unstyled user-contact-info">
          <li>
            <span><i class="zmdi zmdi-phone-msg" /></span>
            <a href="tel:123456" class="fs-14">+2347637684</a>
          </li>
          <li>
            <span><i class="zmdi zmdi-email" /></span>
            <a href="mailto:joan_parisian@gmail.com" class="fs-14">abc@example.com</a>
          </li>
          <li>
            <span><i class="zmdi zmdi-pin" /></span>
            <span class="fs-14">Mohali,India</span>
          </li>
        </ul>
        <ul class="d-flex social-info list-unstyled mb-0 pt-4">
          <li><a class="facebook icon-btn" href="https://www.facebook.com" target="_blank"><i
            class="zmdi zmdi-facebook"
          /></a></li>
          <li><a class="twitter icon-btn" href="https://www.twitter.com" target="_blank"><i
            class="zmdi zmdi-twitter"
          /></a></li>
          <li><a class="google icon-btn" href="https://www.googleplus.com" target="_blank"><i
            class="zmdi zmdi-google-plus"
          /></a></li>
          <li><a class="linkedin icon-btn" href="https://www.linkedin.com" target="_blank"><i
            class="zmdi zmdi-linkedin"
          /></a></li>
          <li><a class="instagram icon-btn" href="https://www.instagram.com" target="_blank"><i
            class="zmdi zmdi-instagram"
          /></a></li>
        </ul>
      </div>
      <div class="d-flex align-items-center  pb-15">
        <b-button size="sm" variant="primary" class="text-capitalize">
          {{ $t('message.viewProfile') }}
        </b-button>
        <b-button size="sm" variant="warning" class="text-capitalize">
          {{ $t('message.sendMessage') }}
        </b-button>
      </div>
    </div>
    <ul class="footer-border">
      <li class="w-33">
        <h4 class="mb-0 fw-bold text-center">80</h4>
        <span class="font-xs text-muted">{{ $t('message.articles') }}</span>
      </li>
      <li class="w-33">
        <h4 class="mb-0 fw-bold text-center">150</h4>
        <span class="font-xs text-muted">{{ $t('message.followers') }}</span>
      </li>
      <li class="w-33">
        <h4 class="mb-0 fw-bold text-center">2k</h4>
        <span class="font-xs text-muted">{{ $t('message.likes') }}</span>
      </li>
    </ul>
  </app-card>
</template>
