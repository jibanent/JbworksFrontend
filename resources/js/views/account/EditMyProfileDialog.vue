<template>
  <div id="apdialogs" style="display: block;" v-if="showEditMyProfileDialog">
    <div class="__fdialog __temp __dialog __canvas_closable __dialog_ontop">
      <div class="__closable"></div>
      <div class="__fdialogwrapper scroll-y forced-scroll">
        <div class="__dialogwrapper" style="top: 50%; left: 50%; transform: translate(-50%, -50%)">
          <div class="__dialogwrapper-inner">
            <div class="__dialogmain">
              <div class="__dialogtitlewrap">
                <div class="left relative">
                  <div
                    class="__dialogtitle unselectable ap-xdot"
                    onclick="AP.dialog(&quot;#edit-fx-dx&quot;).balance();"
                  >Chỉnh sửa thông tin cá nhân</div>
                  <div class="__dialogtitlerender tx-fill"></div>
                </div>
                <div class="clear"></div>
              </div>
              <div class="__dialogclose" @click="hideEditUserDialog">
                <span class="-ap icon-close"></span>
              </div>
              <div class="__dialogcontent">
                <div id="edit-fx-dx" class="__apdialog" title style="width: 720px;">
                  <div class="form form-dialog form-inline">
                    <form @submit.prevent="handleUpdateMyProfile">
                      <div class="row -istext">
                        <div class="label">
                          Họ và tên
                          <div class="sublabel">Họ và tên</div>
                        </div>
                        <div class="input data">
                          <input type="text" placeholder="Họ của bạn" class="std" v-model="name" />
                          <div
                            class="validate-error"
                            v-for="error in errors.name"
                            :key="error.id"
                          >{{ error }}</div>
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="row -isfake">
                        <div class="label">
                          Email
                          <div class="sublabel">Email của bạn</div>
                        </div>
                        <div class="input data">
                          <div class="input-fake ap-xdot">{{ currentUser.email }}</div>
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="row -isfake">
                        <div class="label">
                          Username
                          <div class="sublabel">Username của bạn</div>
                        </div>
                        <div class="input data">
                          <div class="input-fake ap-xdot">
                            @
                            <b>{{ currentUser.username }}</b>
                          </div>
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="row -istext">
                        <div class="label">
                          Vị trí công việc
                          <div class="sublabel">Vị trí công việc</div>
                        </div>
                        <div class="input data">
                          <input
                            type="text"
                            placeholder="Vị trí công việc"
                            class="std"
                            v-model="position"
                          />
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="row -isfile">
                        <div class="label">
                          Ảnh đại diện
                          <div class="sublabel">Ảnh đại diện</div>
                        </div>
                        <div class="input data">
                          <img :src="getAvatar" class="avatar-reader" />
                          <input type="file" name="avatar" @change="upLoadAvatar" />
                          <div
                            class="validate-error"
                            v-for="error in errors.avatar"
                            :key="error.id"
                          >{{ error }}</div>
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="row -isbase">
                        <div class="label">
                          Ngày tháng năm sinh
                          <div class="sublabel">Ngày tháng năm sinh</div>
                        </div>
                        <div class="input-group -count-3">
                          <date-picker
                            v-model="birthday"
                            :input-props="{
                                        placeholder: 'Ngày tháng năm sinh'
                                      }"
                            :masks="masks"
                            :popover="popover"
                          />
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="row -istext">
                        <div class="label">
                          Số điện thoại
                          <div class="sublabel">Số điện thoại</div>
                        </div>
                        <div class="input data">
                          <input
                            type="text"
                            placeholder="Số điện thoại"
                            class="std"
                            v-model="phone"
                          />
                          <div
                            class="validate-error"
                            v-for="error in errors.phone"
                            :key="error.id"
                          >{{ error }}</div>
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="row -istextarea">
                        <div class="label">
                          Chỗ ở hiện nay
                          <div class="sublabel">Chỗ ở hiện nay</div>
                        </div>
                        <div class="input data">
                          <textarea placeholder="Chỗ ở hiện nay" v-model="address"></textarea>
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="form-buttons -two">
                        <button class="button ok -success -rounded bold">Cập nhật</button>
                        <div
                          class="button cancel -passive-2 -rounded"
                          @click="hideEditUserDialog"
                        >Bỏ qua</div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <loading :class="{show: isSubmitting}" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import DatePicker from "v-calendar/lib/components/date-picker.umd";
import Loading from "../../components/Loading";
import { viDateFormat } from "../../constants";
import { mapActions } from "vuex";
import moment from "moment";
export default {
  name: "edit-user-dialog",
  props: {
    showEditMyProfileDialog: { type: Boolean, default: false },
    currentUser: { type: Object, default: null },
    isSubmitting: { type: Boolean, default: false }
  },
  data() {
    return {
      name: "edit-my-profile",
      position: "",
      avatar: {
        objFile: null,
        base64URL: ""
      },
      birthday: "",
      phone: "",
      address: "",
      masks: {
        input: viDateFormat
      },
      popover: {
        visibility: "focus"
      },
      errors: {}
    };
  },
  watch: {
    currentUser(currentUser) {
      if (currentUser) {
        this.name = currentUser.name;
        this.position = currentUser.position;
        this.birthday = currentUser.birthday
          ? new Date(currentUser.birthday)
          : "";
        this.phone = currentUser.phone;
        this.address = currentUser.address;
      }
    }
  },
  computed: {
    getAvatar() {
      if (this.currentUser && this.avatar.base64URL === "") {
        return this.currentUser.avatar;
      } else {
        return this.avatar.base64URL;
      }
    }
  },
  methods: {
    ...mapActions(["updateMyProfile"]),
    hideEditUserDialog() {
      this.$store.commit("TOGGLE_EDIT_MY_PROFILE_DIALOG");
      this.name = this.currentUser.name;
      this.position = this.currentUser.position;
      this.birthday = this.currentUser.birthday
        ? new Date(this.currentUser.birthday)
        : "";
      this.phone = this.currentUser.phone;
      this.address = this.currentUser.address;
      this.errors = {};
    },
    handleUpdateMyProfile() {
      const data = {
        name: this.name ? this.name : "",
        position: this.position ? this.position : "",
        birthday: this.birthday
          ? moment(this.birthday).format("YYYY-MM-DD")
          : "",
        phone: this.phone ? this.phone : "",
        address: this.address ? this.address : "",
        avatar: this.avatar.objFile ? this.avatar.objFile : null
      };

      this.updateMyProfile(data).then(response => {
        if (!response.error) {
          this.hideEditUserDialog();
          this.$notify({
            group: "notify",
            type: "success",
            text: "Cập nhật tài khoản thành công!"
          });
        } else {
          this.errors = response.message;
        }
      });
    },
    upLoadAvatar(e) {
      if (e.target.files && e.target.files.length) {
        const fileAvatar = e.target.files[0];
        const reader = new FileReader();
        reader.addEventListener(
          "load",
          () => {
            // convert image file to base64 string
            const previewAvatar = reader.result;
            this.avatar.base64URL = previewAvatar;
            this.avatar.objFile = fileAvatar;
          },
          false
        );

        if (fileAvatar) {
          reader.readAsDataURL(fileAvatar);
        }
      }
    }
  },
  components: { DatePicker, Loading }
};
</script>

<style scoped>
.avatar-reader {
  width: 100px;
  height: 100px;
  box-sizing: border-box;
  object-fit: cover;
  object-position: center;
  margin-bottom: 5px;
}
</style>
