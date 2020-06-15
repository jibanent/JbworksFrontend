<template>
  <div class="menuw">
      <div id="menu">
        <div class="list items">
          <div class="top">
            <div class="userinfo ap-xdot">
              <div class="name">{{ currentUser.name }}</div>
              <div
                class="info ap-xdot"
                title="thuytrangenglish@gmail.com"
              >@{{ currentUser.username }} &nbsp;·&nbsp; {{ currentUser.email }}</div>
            </div>
          </div>

          <div class="title">Thông tin tài khoản</div>

          <div class="box">
            <div class="li active url">
              <div class="icon">
                <span class="-ap icon-gear"></span>
              </div>
              <div class="text">Tài khoản</div>
            </div>

            <div class="li" @click="$store.commit('TOGGLE_EDIT_MY_PROFILE_DIALOG')">
              <div class="icon">
                <span class="-ap icon-pen"></span>
              </div>
              <div class="text">Chỉnh sửa</div>
            </div>

            <div class="li" onclick="Me.info.editLanguage();">
              <div class="icon">
                <span class="-ap icon-flickr3"></span>
              </div>
              <div class="text">Ngôn ngữ</div>
            </div>

            <div class="li" @click="$store.commit('TOGGLE_CHANGE_PASSWORD_DIALOG')">
              <div class="icon">
                <span class="-ap icon-exclamation"></span>
              </div>
              <div class="text">Đổi mật khẩu</div>
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
