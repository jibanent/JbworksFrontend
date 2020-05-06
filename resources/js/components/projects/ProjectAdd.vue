<template>
  <div id="apdialogs" style="width: 1937px; display: block;" v-if="showProjectAdd">
    <div class="__fdialog __temp __dialog __dialog_ontop">
      <div class="__fdialogwrapper scroll-y forced-scroll">
        <div class="__dialogwrapper" style="top: 72px; left: 700px;">
          <div class="__dialogwrapper-inner">
            <div class="__dialogmain">
              <div class="__dialogtitlewrap">
                <div class="left relative">
                  <div class="__dialogtitle unselectable ap-xdot">Tạo dự án mới</div>
                  <div class="__dialogtitlerender tx-fill"></div>
                </div>
                <div class="clear"></div>
              </div>
              <div class="__dialogclose" @click="closeProjectAdd">
                <span class="-ap icon-close"></span>
              </div>
              <div class="__dialogcontent">
                <div class="__apdialog" style="width: 480px;">
                  <div class="form form-dialog -flat">
                    <form method="post">
                      <div class="row -istext -big -active">
                        <div class="label">Tên dự án</div>
                        <div class="input data">
                          <input type="text" placeholder="Tên dự án" class="std"/>
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="row -istext -big -active">
                        <div class="label">Thành viên quản trị dự án</div>
                        <div class="input data">
                          <input type="text" placeholder="Sử dụng @ để tag người quản trị" class="std __autoc __autoresized"/>
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="row -istext -big -active">
                        <div class="label">Thành viên thực hiện dự án</div>
                        <div class="input data">
                          <input type="text" placeholder="Thành viên làm việc trong dự án, sử dụng @ để tag thành viên" class="std __autoc __autoresized" />
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="row -istext hidden -big -active">
                        <div class="label">Thêm nhanh thành viên theo teams</div>
                        <div class="input data">
                          <input type="text" placeholder="Nhập để chọn tất cả các thành viên và các nhóm" class="std ui-autocomplete-input" />
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="row -isselect -active">
                        <div class="label">Phòng ban</div>
                        <div class="select data">
                          <select name="dept_id">
                            <option value="0">Chưa chọn</option>
                            <option value="1336">Marketing</option>
                          </select>
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="row -islist -active">
                        <div class="label">Phân loại dự án</div>
                        <div class="list-radio data" >
                          <div style="display:none">
                            <input style="display:none" name="external" />
                          </div>
                          <div class="options">
                            <div class="opt selected">
                              <div class="circle">
                                <div class="cin"></div>
                              </div>Dự án nội bộ
                              <div class="sublabel">Dự án nội bộ công ty</div>
                            </div>
                            <div class="opt">
                              <div class="circle">
                                <div class="cin"></div>
                              </div>Dự án làm việc với khách hàng
                              <div class="sublabel">Bạn có thể thêm tài khoản khách hàng vào dự án</div>
                            </div>
                          </div>
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="wrapper hidden" style="display: block;">
                        <div class="wtitle">Tùy chọn nâng cao</div>
                        <div class="__ph"></div>
                        <div class="row -istext -active">
                          <div class="label">Ngày bắt đầu</div>
                          <div class="input data">
                            <span
                              class="-ap icon-uniF1072"
                              style="position: absolute; right:10px; top:10px; color:#aaa; font-size:16px;"
                            ></span>
                            <input type="text" placeholder="Chọn ngày bắt đầu" class="std hasDatepicker"/>
                          </div>
                          <div class="clear"></div>
                        </div>
                        <div class="row -istext -active">
                          <div class="label">Ngày kết thúc</div>
                          <div class="input data">
                            <span class="-ap icon-uniF1072" style="position: absolute; right:10px; top:10px; color:#aaa; font-size:16px;"></span>
                            <input type="text" placeholder="Chọn ngày kết thúc" class="std hasDatepicker"/>
                          </div>
                          <div class="clear"></div>
                        </div>
                        <div class="row -isselect -active" id="_uuid32700_20072_1588727525">
                          <div class="label">Trạng thái hiện tại</div>
                          <div class="select data">
                            <select>
                              <option value="ontrack">Đúng tiến độ</option>
                              <option value="offtrack">Chậm tiến độ</option>
                              <option value="atrisk">Có rủi ro cao</option>
                            </select>
                          </div>
                          <div class="clear"></div>
                        </div>
                        <div class="row -istextarea -active">
                          <div class="label">Mô tả dự án</div>
                          <div class="input data">
                            <textarea name="content" placeholder="Mô tả ngắn gọn về dự án"></textarea>
                          </div>
                          <div class="clear"></div>
                        </div>
                      </div>
                      <div class="row -html">
                        <span class="link">+ Thêm lựa chọn nâng cao</span>
                      </div>
                      <div class="form-buttons -two">
                        <div class="button ok -success -rounded bold">Tạo dự án mới</div>
                        <div class="button cancel -passive-2 -rounded" @click="closeProjectAdd">Huỷ</div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex';
export default {
  name: 'project-add',
  props: {
    showProjectAdd: { type: Boolean, default: false}
  },
  methods: {
    closeProjectAdd(){
      this.$store.commit("TOGGLE_PROJECT_ADD");
    }
  }
};
</script>

<style>
</style>
