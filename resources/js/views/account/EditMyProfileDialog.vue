<template>
  <div id="apdialogs" v-if="showEditMyProfileDialog">
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
                  >{{ $t('account.edit personal profile') }}</div>
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
                          {{ $t('users.full name') }}
                          <div class="sublabel">{{ $t('users.your full name') }}</div>
                        </div>
                        <div class="input data">
                          <input
                            type="text"
                            :placeholder="$t('users.your full name')"
                            class="std"
                            v-model="name"
                          />
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
                          {{ $t('users.email address') }}
                          <div class="sublabel">{{ $t('users.your email') }}</div>
                        </div>
                        <div class="input data">
                          <div class="input-fake ap-xdot">{{ currentUser.email }}</div>
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="row -isfake">
                        <div class="label">
                          {{ $t('users.username') }}
                          <div class="sublabel">{{ $t('users.your username') }}</div>
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
                          {{ $t('users.position') }}
                          <div class="sublabel">{{ $t('users.position') }}</div>
                        </div>
                        <div class="input data">
                          <input
                            type="text"
                            :placeholder="$t('users.position')"
                            class="std"
                            v-model="position"
                          />
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="row -isfile">
                        <div class="label">
                          {{ $t('users.avatar') }}
                          <div class="sublabel">{{ $t('users.avatar') }}</div>
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
                          {{ $t('users.your birthday') }}
                          <div class="sublabel">{{ $t('users.your birthday') }}</div>
                        </div>
                        <div class="input-group -count-3">
                          <date-picker
                            v-model="birthday"
                            :input-props="{
                                        placeholder: $t('users.your birthday')
                                      }"
                            :masks="masks"
                            :popover="popover"
                          />
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="row -istext">
                        <div class="label">
                          {{ $t('users.phone') }}
                          <div class="sublabel">{{ $t('users.your phone number') }}</div>
                        </div>
                        <div class="input data">
                          <input
                            type="text"
                            :placeholder="$t('users.your phone number')"
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
                          {{ $t('users.current address') }}
                          <div class="sublabel">{{ $t('users.current address') }}</div>
                        </div>
                        <div class="input data">
                          <textarea :placeholder="$t('users.current address')" v-model="address"></textarea>
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="form-buttons -two">
                        <button class="button ok -success -rounded bold">{{ $t('common.save') }}</button>
                        <div
                          class="button cancel -passive-2 -rounded"
                          @click="hideEditUserDialog"
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
import DatePicker from "v-calendar/lib/components/date-picker.umd";
import Loading from "../../components/Loading";
import { viDateFormat } from "../../constants";
import { mapActions } from "vuex";
import moment from "moment";
import {message, masks} from '../../helpers'
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
    },
    masks() {
      return masks();
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
          this.$notify(
            message(
              "success",
              this.$t("messages.user information has been updated successfully")
            )
          );
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
