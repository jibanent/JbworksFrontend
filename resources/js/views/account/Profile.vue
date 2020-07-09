<template>
  <div id="pagew" class="scroll-y forced-scroll" v-if="currentUser">
    <profile-sidebar :currentUser="currentUser" />

    <div id="main">
      <div class="apptitle" id="mngheader">
        <div class="cta url" @click="showEditMyProfileDialog">
          <span class="-ap icon-arrow_upward"></span> &nbsp; {{ $t('account.edit my account') }}
        </div>

        <div class="back url" data-url="company">
          <div class="label">{{ $t('account.account') }}</div>
          <div class="title">{{ currentUser.name }} · {{ currentUser.position }}</div>
        </div>
      </div>

      <div id="profile">
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
            <div class="title">{{ currentUser.name }}</div>

            <div class="subtitle">{{ currentUser.position }}</div>

            <div class="info">
              <b>{{ $t('users.email address') }}:</b>
              {{ currentUser.email }}
            </div>

            <div class="info">
              <b>{{ $t('users.phone') }}:</b>
              {{ currentUser.phone }}
            </div>
            <div class="info">
              <b>{{ $t('users.date of birth') }}:</b>
              {{ formatBirthday}}
            </div>
            <div class="info" v-if="currentUser.address">
              <b>{{ $t('users.current address') }}:</b>
              {{ currentUser.address }}
            </div>
          </div>
        </div>
        <div class="sep-20"></div>
      </div>
    </div>
  </div>
</template>

<script>
import ProfileSidebar from "./ProfileSidebar";
import { mapState, mapActions } from "vuex";
import { getAvatar } from "../../helpers";
import i18n from '../../lang'
import moment from "moment";
export default {
  name: "profile",

  methods: {
    ...mapActions(["getMyProfile"]),
    showEditMyProfileDialog() {
      this.$store.commit("TOGGLE_EDIT_MY_PROFILE_DIALOG");
    }
  },
  computed: {
    ...mapState({
      currentUser: state => state.auth.currentUser
    }),
    avatar() {
      return getAvatar(this.currentUser.avatar);
    },
    createdAt() {
      return moment(this.currentUser.created_at).format("DD-MM-YYYY");
    },
    formatBirthday() {
      return moment(this.currentUser.birthday).locale(i18n.locale).format("L")
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
