<template>
  <div id="pagew" class="scroll-y forced-scroll" v-if="myProfile">
    <profile-sidebar :myProfile="myProfile" />

    <div id="main">
      <div class="apptitle" id="mngheader">
        <div class="cta url" @click="showEditUserDialog">
          <span class="-ap icon-arrow_upward"></span> &nbsp; Chỉnh sửa tài khoản
        </div>

        <div class="back url" data-url="company">
          <div class="label">Tài khoản</div>
          <div class="title">{{ myProfile.name }} · {{ myProfile.position }}</div>
        </div>
      </div>

      <div id="profile">
        <div class="account-edit -cmenuw">
          <span class="-ap icon-keyboard_arrow_down"></span>

          <div class="-cmenu -no-icon -padding" style="width:250px; right:0px; top:30px;">
            <div class="-item">Chỉnh sửa: Thông tin cơ bản</div>
            <div class="-item">Chỉnh sửa: Thông tin liên lạc</div>
            <div class="-item">Chỉnh sửa: Liên kết mạng xã hội</div>
          </div>
        </div>

        <div class="main">
          <div class="image uploadable">
            <img :src="avatar" />
            <div class="upload-form">
              <form>
                <input type="file" name="image" />
              </form>
            </div>
          </div>
          <div class="text">
            <div class="title">{{ myProfile.name }}</div>

            <div class="subtitle">{{ myProfile.position }}</div>

            <div class="info">
              <b>Địa chỉ email</b>
              {{ myProfile.email }}
            </div>

            <div class="info">
              <b>Số điện thoại</b>
              0{{ myProfile.name }}
            </div>
          </div>
        </div>

        <div class="list">
          <div class="title">Thông tin liên hệ</div>
        </div>

        <div class="list">
          <div class="title">Phòng ban</div>
          <div class="item url" data-url="company/g/admin">
            <div class="name">{{ myProfile.department.name }}</div>
            <div
              class="info"
            >{{ myProfile.department.membership }} thành viên · Tham gia ngày {{ createdAt }}</div>

            <div class="icon">
              <span class="-ap icon-keyboard_arrow_right"></span>
            </div>
          </div>
        </div>

        <div class="list">
          <div class="title">
            Học vấn
            <div class="add" onclick="Profile.cv.add('education');">
              <span class="-ap icon-plus-circle"></span>
            </div>
          </div>

          <div class="item-none">Không có thông tin.</div>
        </div>

        <div class="list">
          <div class="title">
            Kinh nghiệm làm việc
            <div class="add" onclick="Profile.cv.add('work');">
              <span class="-ap icon-plus-circle"></span>
            </div>
          </div>

          <div class="item-none">Không có thông tin.</div>
        </div>

        <div class="list">
          <div class="title">
            Giải thưởng &amp; thành tích
            <div class="add" onclick="Profile.cv.add('award');">
              <span class="-ap icon-plus-circle"></span>
            </div>
          </div>

          <div class="item-none">Không có thông tin.</div>
        </div>

        <div class="sep-20"></div>
        <div class="sep-20"></div>
        <div class="sep-20"></div>
      </div>
    </div>
  </div>
</template>

<script>
import ProfileSidebar from './ProfileSidebar'
import { mapState, mapActions } from "vuex";
import { getAvatar } from "../../helpers";
import moment from "moment";
export default {
  name: "profile",
  created() {
    this.getMyProfile();
  },
  methods: {
    ...mapActions(["getMyProfile"]),
    showEditUserDialog() {
      this.$store.commit('TOGGLE_EDIT_USER_DIALOG');
    }
  },
  computed: {
    ...mapState({
      myProfile: state => state.users.myProfile
    }),
    avatar() {
      return getAvatar(this.myProfile.avatar);
    },
    createdAt() {
      return moment(this.myProfile.created_at).format("DD-MM-YYYY");
    }
  },
  components: {
    ProfileSidebar
  }
};
</script>

<style scoped>
#main {
  margin-right: 270px;
  position: relative;
  min-height: 1300px;
}
#menu {
  position: fixed !important;
}
.image img {
  object-fit: cover;
  object-position: center;
}
</style>
