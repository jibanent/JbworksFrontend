<template>
  <div id="apdialogs" style="display: block;" v-if="showChangePasswordDialog">
    <div class="__fdialog __temp __dialog __canvas_closable __dialog_ontop">
      <div class="__closable"></div>
      <div class="__fdialogwrapper scroll-y forced-scroll">
        <div class="__dialogwrapper" style="top: 50%; left: 50%; transform: translate(-50%, -50%)">
          <div class="__dialogwrapper-inner">
            <div class="__dialogmain">
              <div class="__dialogtitlewrap">
                <div class="left relative">
                  <div class="__dialogtitle unselectable ap-xdot">Đổi mật khẩu</div>
                  <div class="__dialogtitlerender tx-fill"></div>
                </div>
                <div class="clear"></div>
              </div>
              <div class="__dialogclose" @click="hideChangePasswordDialog">
                <span class="-ap icon-close"></span>
              </div>
              <div class="__dialogcontent">
                <div id="edit-fx-dx" class="__apdialog" title style="width: 480px;">
                  <div class="form form-dialog form-inline">
                    <form @submit.prevent="handleChangePassword">
                      <div class="row -ispassword">
                        <div class="label">
                          Mật khẩu hiện tại
                          <div class="sublabel">Mật khẩu hiện tại</div>
                        </div>
                        <div class="input data">
                          <input
                            class="std"
                            type="password"
                            placeholder="Mật khẩu hiện tại"
                            v-model="current_password"
                          />
                           <div
                            class="validate-error"
                            v-for="error in errors.current_password"
                            :key="error.id"
                          >{{ error }}</div>
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="row -ispassword">
                        <div class="label">
                          Mật khẩu mới
                          <div class="sublabel">Mật khẩu mới</div>
                        </div>
                        <div class="input data">
                          <input
                            class="std"
                            type="password"
                            placeholder="Mật khẩu mới"
                            v-model="new_password"
                          />
                           <div
                            class="validate-error"
                            v-for="error in errors.new_password"
                            :key="error.id"
                          >{{ error }}</div>
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="row -ispassword">
                        <div class="label">
                          Nhập lại mật khẩu mới
                          <div class="sublabel">Nhập lại mật khẩu mới</div>
                        </div>
                        <div class="input data">
                          <input
                            class="std"
                            type="password"
                            placeholder="Nhập lại mật khẩu mới"
                            v-model="confirm_password"
                          />
                           <div
                            class="validate-error"
                            v-for="error in errors.confirm_password"
                            :key="error.id"
                          >{{ error }}</div>
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="form-buttons -two">
                        <button type="submit" class="button ok -success -rounded bold">Đổi mật khẩu</button>
                        <div
                          class="button cancel -passive-2 -rounded"
                          @click="hideChangePasswordDialog"
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
import { mapActions } from "vuex";
import Loading from '../../components/Loading'
export default {
  name: "change-password-dialog",
  props: {
    showChangePasswordDialog: { type: Boolean, default: false },
    isSubmitting: { type: Boolean, default: false }
  },
  data() {
    return {
      current_password: "",
      new_password: "",
      confirm_password: "",
      errors: {}
    };
  },
  methods: {
    ...mapActions(["changePassword"]),
    hideChangePasswordDialog() {
      this.$store.commit("TOGGLE_CHANGE_PASSWORD_DIALOG");
      this.current_password = "";
      this.new_password = "";
      this.confirm_password = "";
      this.errors = {}
    },
    handleChangePassword() {
      const { current_password, new_password, confirm_password } = this;
      const data = { current_password, new_password, confirm_password };
      this.changePassword(data).then(response => {
        if (!response.error) {
          this.hideChangePasswordDialog();
          this.$notify({
            group: "notify",
            type: "success",
            text: "Đổi mật khẩu thành công!"
          });
        } else {
          this.errors = response.message;
        }
      });
    }
  },
  components: {Loading}
};
</script>

<style></style>
