<template>
  <div id="apdialogs" v-if="showChangePassword">
    <div class="__fdialog __temp __dialog __canvas_closable __dialog_ontop">
      <div class="__closable"></div>
      <div class="__fdialogwrapper scroll-y forced-scroll">
        <div class="__dialogwrapper">
          <div class="__dialogwrapper-inner">
            <div class="__dialogmain">
              <div class="__dialogtitlewrap">
                <div class="left relative">
                  <div
                    class="__dialogtitle unselectable ap-xdot"
                  >{{ $t('account.change password') }}</div>
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
                          {{ $t('account.current password') }}
                          <div class="sublabel">{{ $t('account.current password') }}</div>
                        </div>
                        <div class="input data">
                          <input
                            class="std"
                            type="password"
                            :placeholder="$t('account.current password')"
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
                          {{ $t('account.new password') }}
                          <div class="sublabel">{{ $t('account.new password') }}</div>
                        </div>
                        <div class="input data">
                          <input
                            class="std"
                            type="password"
                            :placeholder="$t('account.new password')"
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
                          {{ $t('account.retype new password') }}
                          <div class="sublabel">{{ $t('account.retype new password') }}</div>
                        </div>
                        <div class="input data">
                          <input
                            class="std"
                            type="password"
                            :placeholder="$t('account.retype new password')"
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
                        <button
                          type="submit"
                          class="button ok -success -rounded bold"
                        >{{ $t('account.change password') }}</button>
                        <div
                          class="button cancel -passive-2 -rounded"
                          @click="hideChangePasswordDialog"
                        >{{ $t('common.cancel') }}</div>
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
import Loading from "../../components/Loading";
import { message } from "../../helpers";
export default {
  name: "change-password-dialog",
  props: {
    showChangePassword: { type: Boolean, default: false },
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
      this.errors = {};
    },
    handleChangePassword() {
      const { current_password, new_password, confirm_password } = this;
      const data = { current_password, new_password, confirm_password };
      this.changePassword(data).then(response => {
        if (!response.error) {
          this.hideChangePasswordDialog();
          this.$notify(
            message(
              "success",
              this.$t("messages.your password has been changed successfully")
            )
          );
        } else {
          this.errors = response.message;
        }
      });
    }
  },
  components: { Loading }
};
</script>

<style></style>
