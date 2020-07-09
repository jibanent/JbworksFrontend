<template>
  <div class="menuw">
      <div id="menu">
        <div class="list items">
          <div class="top">
            <div class="userinfo ap-xdot">
              <div class="name">{{ currentUser.name }}</div>
              <div
                class="info ap-xdot"
              >@{{ currentUser.username }} &nbsp;·&nbsp; {{ currentUser.email }}</div>
            </div>
          </div>

          <div class="title">{{ $t('account.account information') }}</div>

          <div class="box">
            <div class="li active url">
              <div class="icon">
                <span class="-ap icon-gear"></span>
              </div>
              <div class="text">{{ $t('account.account') }}</div>
            </div>

            <div class="li" @click="$store.commit('TOGGLE_EDIT_MY_PROFILE_DIALOG')">
              <div class="icon">
                <span class="-ap icon-pen"></span>
              </div>
              <div class="text">{{ $t('common.edit') }}</div>
            </div>

            <div class="li" @click="$store.commit('TOGGLE_SELECT_LANGUAGE')">
              <div class="icon">
                <span class="-ap icon-flickr3"></span>
              </div>
              <div class="text">{{ $t('account.language') }}</div>
            </div>

            <div class="li" @click="$store.commit('TOGGLE_CHANGE_PASSWORD_DIALOG')">
              <div class="icon">
                <span class="-ap icon-exclamation"></span>
              </div>
              <div class="text">{{ $t('account.change password') }}</div>
            </div>
          </div>

        </div>
      </div>
    </div>
</template>

<script>
export default {
  name: 'profile-sidebar',
  props: {
    currentUser: { type: Object, default: null}
  }
}
</script>

<style>
#menu {
  position: fixed;
}
</style>
