<template>
  <div class="__fdialog __temp __dialog __canvas_closable __dialog_ontop">
    <div class="__dialogwrapper" style="top: 50%; left: 50%; transform: translate(-50%, -50%)">
      <div class="__dialogmain">
        <div class="__dialogtitlewrap">
          <div class="left relative">
            <div class="__dialogtitle unselectable ap-xdot">Tạo tài khoản mới</div>
            <div class="__dialogtitlerender tx-fill"></div>
          </div>
          <div class="clear"></div>
        </div>

        <div class="__dialogclose" @click="$emit('closeModal')">
          <span class="-ap icon-close"></span>
        </div>

        <div class="__dialogcontent">
          <div id="create-team-fx-dx" class="__apdialog" title style="width: 600px;">
            <div class="form form-dialog form-inline">
              <form>
                <div class="row -istext">
                  <div class="label">
                    Họ và tên *
                    <div class="sublabel">Họ và tên</div>
                  </div>
                  <div class="input data">
                    <input name="name" placeholder="Họ và tên" class="std" />
                  </div>
                  <div class="clear"></div>
                </div>
                <div class="row -istext" id="_uuid51482_70678_1585194789">
                  <div class="label">
                    Email tài khoản *
                    <div class="sublabel">Một mật khẩu tạm thời sẽ được gửi đến email này.</div>
                  </div>
                  <div class="input data">
                    <input type="text" placeholder="Email tài khoản" class="std" />
                  </div>
                  <div class="clear"></div>
                </div>
                <div class="row -istext">
                  <div class="label">
                    Chức danh
                    <div class="sublabel">Chức danh, chức vụ hoặc vị trí trong công ty</div>
                  </div>
                  <div class="input data">
                    <input type="text" placeholder="Chức danh" class="std" />
                  </div>
                  <div class="clear"></div>
                </div>
                <div class="row -isselect">
                  <div class="label">
                    Phân quyền sử dụng
                    <div class="sublabel">Phân quyền sử dụng</div>
                  </div>
                  <div class="select data">
                    <select name="priv">
                      <option value>Thành viên thông thường</option>
                      <option value="admin">Admin</option>
                      <option value="owner">System owner (super admin)</option>
                    </select>
                  </div>
                  <div class="clear"></div>
                </div>
                <div class="form-buttons -two">
                  <div class="button ok -success -rounded -bold">Tạo tài khoản mới</div>
                  <div class="button cancel -passive-2 -rounded" @click="$emit('closeModal')">Cancel</div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'user-form-modal',
  data() {
    return {

    }
  },
};
</script>

<style>
</style>
