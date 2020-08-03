<template>
  <div class="__fdialog __temp __dialog __canvas_closable __dialog_ontop" v-if="showEditUserDialog">
    <div class="__dialogwrapper" style="top: 50%; left: 50%; transform: translate(-50%, -50%)">
      <div class="__dialogmain">
        <div class="__dialogtitlewrap">
          <div class="left relative">
            <div class="__dialogtitle unselectable ap-xdot">{{ $t("users.edit member") }}</div>
            <div class="__dialogtitlerender tx-fill"></div>
          </div>
          <div class="clear"></div>
        </div>

        <div class="__dialogclose" @click="closeEditUserDialog">
          <span class="-ap icon-close"></span>
        </div>

        <div class="__dialogcontent">
          <div class="__apdialog" style="width: 600px;">
            <div class="form form-dialog form-inline">
              <form @submit.prevent="handleUpdateUser">
                <div class="row -istext">
                  <div class="label">
                    {{ $t("users.full name") }} *
                    <div class="sublabel">{{ $t("users.full name") }}</div>
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
                <div class="row -isfake">
                  <div class="label">
                    {{ $t('users.username') }}
                    <div class="sublabel">{{ $t('users.your username') }}</div>
                  </div>
                  <div class="input data">
                    <div class="input-fake ap-xdot">{{ user.username }}</div>
                  </div>
                  <div class="clear"></div>
                </div>
                <div class="row -isfake">
                  <div class="label">
                    {{ $t('users.email address') }}
                    <div class="sublabel">{{ $t('users.your email') }}</div>
                  </div>
                  <div class="input data">
                    <div class="input-fake ap-xdot">{{ user.email }}</div>
                  </div>
                  <div class="clear"></div>
                </div>
                <div class="row -istext">
                  <div class="label">
                    {{ $t("users.phone") }}
                    <div class="sublabel">{{ $t("users.phone") }}</div>
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
                    {{ $t("users.position") }}
                    <div class="sublabel">{{ $t("users.position") }}</div>
                  </div>
                  <div class="input data">
                    <input
                      type="text"
                      v-model="position"
                      :placeholder="$t('users.position')"
                      class="std"
                    />
                  </div>
                  <div class="clear"></div>
                </div>
                <div class="row -isselect">
                  <div class="label">
                    {{ $t("departments.departments") }} *
                    <div class="sublabel">{{ $t("departments.departments") }}</div>
                  </div>
                  <div class="select data">
                    <treeselect
                      v-model="department_id"
                      :multiple="false"
                      :options="departments.data"
                      :normalizer="normalizer"
                      :placeholder="$t('users.select a department')"
                    />
                    <div
                      class="validate-error"
                      v-for="error in errors.department_id"
                      :key="error.id"
                    >{{ error }}</div>
                  </div>
                </div>
                <div class="row -isselect">
                  <div class="label">
                    {{ $t("users.roles") }}
                    <div class="sublabel">{{ $t("users.roles") }}</div>
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
                  <button class="button ok -success -rounded -bold">{{ $t("common.save") }}</button>
                  <div
                    class="button cancel -passive-2 -rounded"
                    @click="closeEditUserDialog"
                  >{{ $t("common.cancel") }}</div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <loading :class="{ show: isSubmitting }" />
      </div>
    </div>
  </div>
</template>

<script>
import Loading from "../../components/Loading";
import { mapActions } from "vuex";
import { message } from "../../helpers";
import Treeselect from "@riophae/vue-treeselect";
import "@riophae/vue-treeselect/dist/vue-treeselect.css";
export default {
  name: "edit-user-dialog",
  props: {
    showEditUserDialog: { type: Boolean, default: false },
    roles: { type: Array, default: [] },
    departments: { type: Object, default: {} },
    isSubmitting: { type: Boolean, default: false },
    user: { type: Object, default: {} },
  },
  data() {
    return {
      name: "",
      phone: "",
      position: "",
      department_id: null,
      role: "member",
      errors: {},
      normalizer(node) {
        return {
          id: node.id,
          label: node.name,
          children: node.children,
        };
      },
    };
  },
  watch: {
    user(user) {
      this.name = user.name;
      this.phone = user.phone;
      this.position = user.position;
      this.department_id = user.department.id;
      this.role = user.role[0];
    },
  },
  methods: {
    ...mapActions(["updateUser"]),
    closeEditUserDialog() {
      this.$store.commit("TOGGLE_EDIT_USER_DIALOG");
    },
    handleUpdateUser() {
      const { name, phone, position, department_id, role } = this;
      const data = { name, phone, position, department_id, role };
      const { id } = this.user;
      this.updateUser({ data, id }).then((response) => {
        if (!response.error) {
          this.closeEditUserDialog();
          this.$notify(
            message(
              "success",
              this.$t("messages.user has been updated successfully")
            )
          );
        } else {
          this.errors = response.message;
        }
      });
    },
  },
  components: {
    Loading,
    Treeselect,
  },
};
</script>

<style></style>
