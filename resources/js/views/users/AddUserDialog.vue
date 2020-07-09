<template>
  <div class="__fdialog __temp __dialog __canvas_closable __dialog_ontop" v-if="showAddUserDialog">
    <div class="__dialogwrapper" style="top: 50%; left: 50%; transform: translate(-50%, -50%)">
      <div class="__dialogmain">
        <div class="__dialogtitlewrap">
          <div class="left relative">
            <div class="__dialogtitle unselectable ap-xdot">{{ $t('users.create a new account') }}</div>
            <div class="__dialogtitlerender tx-fill"></div>
          </div>
          <div class="clear"></div>
        </div>

        <div class="__dialogclose" @click="closeAddUserDialog">
          <span class="-ap icon-close"></span>
        </div>

        <div class="__dialogcontent">
          <div class="__apdialog" style="width: 600px;">
            <div class="form form-dialog form-inline">
              <form @submit.prevent="handleCreateUser">
                <div class="row -istext">
                  <div class="label">
                    {{ $t('users.full name') }} *
                    <div class="sublabel">{{ $t('users.full name') }}</div>
                  </div>
                  <div class="input data">
                    <input
                      type="text"
                      v-model.number="name"
                      :placeholder="$t('users.full name')"
                      class="std"
                    />
                    <div
                      class="validate-error"
                      v-for="error in errors.name"
                      :key="error.id"
                    >{{ error }}</div>
                  </div>
                  <div class="clear"></div>
                </div>
                <div class="row -istext">
                  <div class="label">
                    {{ $t('users.username') }} *
                    <div class="sublabel">
                      <span
                        class="red"
                      >{{ $t('users.the username is unique and cannot be changed') }}</span>
                    </div>
                  </div>
                  <div class="input data">
                    <input
                      type="text"
                      v-model.number="username"
                      :placeholder="$t('users.only contain letters, numbers, dashes and underscores')"
                      class="std"
                    />
                    <div
                      class="validate-error"
                      v-for="error in errors.username"
                      :key="error.id"
                    >{{ error }}</div>
                  </div>
                  <div class="clear"></div>
                </div>
                <div class="row -istext">
                  <div class="label">
                    {{ $t('users.email address') }} *
                    <div class="sublabel">{{ $t('users.password will be sent to this email') }}</div>
                  </div>
                  <div class="input data">
                    <input
                      type="text"
                      v-model="email"
                      :placeholder="$t('users.email address')"
                      class="std"
                    />
                    <div
                      class="validate-error"
                      v-for="error in errors.email"
                      :key="error.id"
                    >{{ error }}</div>
                  </div>
                  <div class="clear"></div>
                </div>
                <div class="row -istext">
                  <div class="label">
                    {{ $t('users.phone') }}
                    <div class="sublabel">{{ $t('users.phone') }}</div>
                  </div>
                  <div class="input data">
                    <input type="text" v-model="phone" :placeholder="$t('users.phone')" class="std" />
                    <div
                      class="validate-error"
                      v-for="error in errors.phone"
                      :key="error.id"
                    >{{ error }}</div>
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
                      v-model="position"
                      :placeholder="$t('users.position') "
                      class="std"
                    />
                  </div>
                  <div class="clear"></div>
                </div>
                <div class="row -isselect" :class="{hidden: !$auth.isAdmin()}">
                  <div class="label">
                    {{ $t('departments.departments') }} *
                    <div class="sublabel">{{ $t('departments.departments') }}</div>
                  </div>
                  <div class="select data">
                    <select v-model="department_id">
                      <option :value="null">-- {{ $t('users.select a department') }} --</option>
                      <option
                        v-for="department in departments"
                        :key="department.id"
                        :value="department.id"
                      >{{ department.name }}</option>
                    </select>
                    <div
                      class="validate-error"
                      v-for="error in errors.department_id"
                      :key="error.id"
                    >{{ error }}</div>
                  </div>
                </div>
                <div class="row -isselect">
                  <div class="label">
                    {{ $t('users.roles') }}
                    <div class="sublabel">{{ $t('users.roles') }}</div>
                  </div>
                  <div class="select data">
                    <select v-model="role">
                      <option
                        v-for="role in roles"
                        :key="role.id"
                        :value="role.name"
                      >{{ role.name }}</option>
                    </select>
                  </div>
                  <div class="clear"></div>
                </div>
                <div class="form-buttons -two">
                  <button class="button ok -success -rounded -bold">{{ $t('common.save') }}</button>
                  <div
                    class="button cancel -passive-2 -rounded"
                    @click="closeAddUserDialog"
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
</template>

<script>
import Loading from "../../components/Loading";
import { mapActions } from "vuex";
import { message } from "../../helpers";
export default {
  name: "add-user-dialog",
  props: {
    showAddUserDialog: { type: Boolean, default: false },
    roles: { type: Array, default: [] },
    departments: { type: Array, default: [] },
    isSubmitting: { type: Boolean, default: false }
  },
  updated() {
    if (this.departments[0] && !this.$auth.isAdmin()) this.department_id = this.departments[0].id;
  },
  data() {
    return {
      name: "",
      username: "",
      email: "",
      phone: "",
      position: "",
      department_id: null,
      role: "member",
      errors: {}
    };
  },
  methods: {
    ...mapActions(["createUser"]),
    closeAddUserDialog() {
      this.$store.commit("TOGGLE_ADD_USER_DIALOG");
      this.name = "";
      this.username = "";
      this.email = "";
      this.phone = "";
      this.position = "";
      this.department_id = null;
      this.role = "Member";
      this.errors = {};
    },
    handleCreateUser() {
      const {
        name,
        username,
        email,
        phone,
        position,
        department_id,
        role
      } = this;
      const data = {
        name,
        username,
        email,
        phone,
        position,
        department_id,
        role
      };
      this.createUser(data).then(response => {
        if (!response.error) {
          this.closeAddUserDialog();
          this.$notify(
            message(
              "success",
              this.$t("messages.new user has been created successfully")
            )
          );
        } else {
          this.errors = response.message;
        }
      });
    }
  },
  components: {
    Loading
  }
};
</script>

<style>
</style>
