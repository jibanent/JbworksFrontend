<template>
  <div class="__fdialog __temp __dialog __canvas_closable __dialog_ontop" v-if="showAddUserDialog">
    <div class="__dialogwrapper" style="top: 50%; left: 50%; transform: translate(-50%, -50%)">
      <div class="__dialogmain">
        <div class="__dialogtitlewrap">
          <div class="left relative">
            <div class="__dialogtitle unselectable ap-xdot">Tạo tài khoản mới</div>
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
                    Họ và tên *
                    <div class="sublabel">Họ và tên</div>
                  </div>
                  <div class="input data">
                    <input type="text" v-model.number="name" placeholder="Họ và tên" class="std" />
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
                    Username *
                    <div class="sublabel">
                      <span
                        class="red"
                      >Username của tài khoản là duy nhất và sẽ không thể thay đổi sau khi được tạo - vui lòng lựa chọn username phù hợp.</span>
                    </div>
                  </div>
                  <div class="input data">
                    <input
                      type="text"
                      v-model.number="username"
                      placeholder="Chỉ gồm các ký tự thông thường, không có dấu"
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
                    Email tài khoản *
                    <div class="sublabel">Một mật khẩu tạm thời sẽ được gửi đến email này.</div>
                  </div>
                  <div class="input data">
                    <input type="text" v-model="email" placeholder="Email tài khoản" class="std" />
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
                    Số điện thoại
                    <div class="sublabel">Số điện thoại</div>
                  </div>
                  <div class="input data">
                    <input type="text" v-model="phone" placeholder="Số điện thoại" class="std" />
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
                    Chức danh
                    <div class="sublabel">Chức danh, chức vụ hoặc vị trí trong công ty</div>
                  </div>
                  <div class="input data">
                    <input type="text" v-model="position" placeholder="Chức danh" class="std" />
                  </div>
                  <div class="clear"></div>
                </div>
                <div class="row -isselect">
                  <div class="label">
                    Phòng ban *
                    <div class="sublabel">Phòng ban</div>
                  </div>
                  <div class="select data">
                    <select v-model="department_id">
                      <option :value="null">-- Chọn phòng ban --</option>
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
                    Phân quyền sử dụng
                    <div class="sublabel">Phân quyền sử dụng</div>
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
                  <button class="button ok -success -rounded -bold">Tạo tài khoản mới</button>
                  <div class="button cancel -passive-2 -rounded" @click="closeAddUserDialog">Cancel</div>
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
import Loading from "../common/Loading";
import { mapActions } from "vuex";
export default {
  name: "add-user-dialog",
  props: {
    showAddUserDialog: { type: Boolean, default: false },
    roles: { type: Array, default: [] },
    departments: { type: Array, default: [] },
    isSubmitting: { type: Boolean, default: false }
  },
  data() {
    return {
      name: "",
      username: "",
      email: "",
      phone: "",
      position: "",
      department_id: null,
      role: "Member",
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
          this.$notify({
            group: "notify",
            type: "success",
            text: "Tạo tài khoản thành công!"
          });
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
