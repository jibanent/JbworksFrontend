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

            <div class="li" onclick="Me.chooseColor();">
              <div class="icon">
                <span class="-ap icon-palette"></span>
              </div>
              <div class="text">Đổi màu hiển thị</div>
            </div>
            <div class="li url" data-url="2factor">
              <div class="icon">
                <span class="-ap icon-shield"></span>
              </div>
              <div class="text">Bảo mật hai lớp</div>
            </div>
          </div>

          <div class="title">Ứng dụng - Bảo mật</div>

          <div class="box">
            <div class="li url" onclick="Admin.sa.setIPRange()">
              <div class="icon">
                <span class="-ap icon-shield"></span>
              </div>
              <div class="text">Bảo mật theo dải IP</div>
            </div>

            <div class="li url" onclick="Admin.editCompany()">
              <div class="icon">
                <span class="-ap icon-cog3"></span>
              </div>
              <div class="text">Chỉnh sửa công ty</div>
            </div>

            <div class="li" onclick="Admin.sa.setPrivacy();">
              <div class="icon">
                <span class="-ap icon-eye"></span>
              </div>
              <div class="text">Quyền xem thông tin</div>
            </div>

            <div class="li url" data-url="account/apps" style="display:none">
              <div class="icon">
                <span class="-ap icon-dashboard"></span>
              </div>
              <div class="text">Quản lý ứng dụng</div>
            </div>

            <a class="li" href="//apps.base.vn" target="_blank" style="display:none">
              <span class="icon">
                <span class="-ap icon-arrow-right3"></span>
              </span>
              <span class="text">Kho ứng dụng Base</span>
            </a>

            <div class="li url" data-url="syslogs">
              <div class="icon">
                <span class="-ap icon-flag"></span>
              </div>
              <div class="text">Logs hệ thống</div>
            </div>

            <div class="li" onclick="Admin.sa.setAppUser();">
              <div class="icon">
                <span class="-ap icon-unlock-stroke"></span>
              </div>
              <div class="text">Quyền admin theo ứng dụng</div>
            </div>

            <div class="li url" data-url="tokens">
              <div class="icon">
                <span class="-ap icon-earth"></span>
              </div>
              <div class="text">Tích hợp với bên thứ ba</div>
            </div>

            <div class="li url" onclick="SAML.init()">
              <div class="icon">
                <span class="-ap icon-unlock-stroke"></span>
              </div>
              <div class="text">SAML Single SignOn</div>
            </div>
          </div>

          <div class="title">Tùy chỉnh nâng cao</div>

          <div class="box">
            <div class="li url" data-url="account/logins">
              <div class="icon">
                <span class="-ap icon-clock2"></span>
              </div>
              <div class="text">Lịch sử đăng nhập</div>
            </div>

            <div class="li url" data-url="account/devices">
              <div class="icon">
                <span class="-ap icon-screen2"></span>
              </div>
              <div class="text">Quản lý thiết bị</div>
            </div>

            <div class="li" onclick="Base.notis_opt.settings();">
              <div class="icon">
                <span class="-ap icon-envelope2"></span>
              </div>
              <div class="text">Tùy chỉnh email thông báo</div>
            </div>

            <div class="li" onclick="Me.info.editTimezone();">
              <div class="icon">
                <span class="-ap icon-access_time"></span>
              </div>
              <div class="text">Chỉnh sửa múi giờ</div>
            </div>

            <div class="li" onclick="Me.delegate();">
              <div class="icon">
                <span class="-ap icon-share5"></span>
              </div>
              <div class="text">Ủy quyền tạm thời</div>
            </div>

            <div class="li" onclick="Admin.sa.permissionEditEmail();">
              <div class="icon">
                <span class="-ap icon-shield"></span>
              </div>
              <div class="text">Quyền sửa email</div>
            </div>

            <div class="li url" data-url="media">
              <div class="icon">
                <span class="-ap icon-image3"></span>
              </div>
              <div class="text">Logo &amp; thương hiệu</div>
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

</style>
