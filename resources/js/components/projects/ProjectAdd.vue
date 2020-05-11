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
                    <form method="post" @submit.prevent="handleCreateProject">
                      <div class="row -istext -big -active">
                        <div class="label">Tên dự án</div>
                        <div class="input data">
                          <input type="text" placeholder="Tên dự án" class="std" v-model="name" />
                        </div>
                        <div
                          class="validate-error"
                          v-for="error in errors.name"
                          :key="error.id"
                        >{{ error }}</div>
                        <div class="clear"></div>
                      </div>
                      <div class="row -istext -big -active">
                        <div class="label">Thành viên quản trị dự án</div>
                        <div class="input data">
                          <multiselect
                            v-model="manager"
                            label="name"
                            track-by="id"
                            placeholder="Type to search"
                            open-direction="bottom"
                            :options="users"
                            :searchable="true"
                            :internal-search="true"
                            :clear-on-select="true"
                            :close-on-select="true"
                            :options-limit="300"
                            :limit="10"
                            :max-height="600"
                            :custom-label="customLabel"
                          >
                            <template slot="option" slot-scope="props">
                              <img class="option__image" :src="props.option.avatar" />
                              <div class="option__desc">
                                <span class="option__title">
                                  {{
                                  props.option.name
                                  }}
                                </span>
                                <span>-</span>
                                <span class="option__small">
                                  {{
                                  props.option.position
                                  }}
                                </span>
                              </div>
                            </template>
                          </multiselect>
                        </div>
                        <div
                          class="validate-error"
                          v-for="error in errors.manager_id"
                          :key="error.manager_id"
                        >{{ error }}</div>
                        <div class="clear"></div>
                      </div>
                      <div class="row -istext -big -active">
                        <div class="label">Thành viên thực hiện dự án</div>
                        <div class="input data">
                          <multiselect
                            v-model="followers"
                            label="name"
                            track-by="id"
                            placeholder="Type to search"
                            open-direction="bottom"
                            :options="users"
                            :multiple="true"
                            :searchable="true"
                            :internal-search="true"
                            :clear-on-select="true"
                            :close-on-select="true"
                            :options-limit="300"
                            :limit="10"
                            :max-height="600"
                            :custom-label="customLabel"
                          >
                            <template slot="option" slot-scope="props">
                              <img class="option__image" :src="props.option.avatar" />
                              <div class="option__desc">
                                <span class="option__title">
                                  {{
                                  props.option.name
                                  }}
                                </span>
                                <span>-</span>
                                <span class="option__small">
                                  {{
                                  props.option.position
                                  }}
                                </span>
                              </div>
                            </template>
                          </multiselect>
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="row -isselect -active">
                        <div class="label">Phòng ban</div>
                        <div class="input data">
                          <multiselect
                            v-model="department"
                            label="name"
                            track-by="id"
                            placeholder="Type to search"
                            open-direction="bottom"
                            :options="departments"
                            :searchable="true"
                            :internal-search="true"
                            :clear-on-select="true"
                            :close-on-select="true"
                            :options-limit="300"
                            :limit="10"
                            :max-height="600"
                            :custom-label="customLabel"
                          >
                            <template slot="option" slot-scope="props">
                              <span class="option__title">{{ props.option.name }}</span>
                            </template>
                          </multiselect>
                        </div>
                        <div
                          class="validate-error"
                          v-for="error in errors.department_id"
                          :key="error.department_id"
                        >{{ error }}</div>
                        <div class="clear"></div>
                      </div>
                      <div class="row -islist -active">
                        <div class="label">Phân loại dự án</div>
                        <div class="list-radio data">
                          <div style="display:none">
                            <input style="display:none" name="external" />
                          </div>
                          <div class="options">
                            <div
                              class="opt"
                              :class="{ selected: isInternal === 1 }"
                              @click="checkIsInternal(1)"
                            >
                              <div class="circle">
                                <div class="cin"></div>
                              </div>Dự án nội bộ
                              <div class="sublabel">Dự án nội bộ công ty</div>
                            </div>
                            <div
                              class="opt"
                              :class="{ selected: isInternal === 0 }"
                              @click="checkIsInternal(0)"
                            >
                              <div class="circle">
                                <div class="cin"></div>
                              </div>Dự án làm việc với khách hàng
                              <div class="sublabel">Bạn có thể thêm tài khoản khách hàng vào dự án</div>
                            </div>
                          </div>
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div
                        class="wrapper hidden"
                        style="display: block;"
                        v-if="showAdvancedOptions"
                      >
                        <div class="wtitle">Tùy chọn nâng cao</div>
                        <div class="__ph"></div>
                        <div class="row -istext -active">
                          <div class="label">Ngày bắt đầu</div>
                          <div class="input data">
                            <span
                              class="-ap icon-uniF1072"
                              style="position: absolute; right:10px; top:10px; color:#aaa; font-size:16px;"
                            ></span>
                            <date-picker
                              v-model="startDateValue"
                              :input-props="{
                                class: 'std hasDatepicker',
                                placeholder: 'Chọn ngày bắt đầu'
                              }"
                              :masks="masks"
                              :popover="popover"
                            />
                          </div>
                          <div class="clear"></div>
                        </div>
                        <div class="row -istext -active">
                          <div class="label">Ngày kết thúc</div>
                          <div class="input data">
                            <span
                              class="-ap icon-uniF1072"
                              style="position: absolute; right:10px; top:10px; color:#aaa; font-size:16px;"
                            ></span>
                            <date-picker
                              v-model="finishDateValue"
                              :input-props="{
                                class: 'std hasDatepicker',
                                placeholder: 'Chọn ngày kết thúc'
                              }"
                              :masks="masks"
                              :popover="popover"
                            />
                          </div>
                          <div
                            class="validate-error"
                            v-for="error in errors.finish_date"
                            :key="error.finish_date"
                          >{{ error }}</div>
                          <div class="clear"></div>
                        </div>
                        <div class="row">
                          <div class="label">Trạng thái hiện tại</div>
                          <div class="select data">
                            <select v-model.number="statusId">
                              <option value="1">Đúng tiến độ</option>
                              <option value="2">Chậm tiến độ</option>
                              <option value="3">Có rủi ro cao</option>
                            </select>
                          </div>
                          <div class="clear"></div>
                        </div>
                        <div class="row -istextarea -active">
                          <div class="label">Mô tả dự án</div>
                          <div class="input data">
                            <textarea
                              name="content"
                              placeholder="Mô tả ngắn gọn về dự án"
                              v-model="description"
                            ></textarea>
                          </div>
                          <div class="clear"></div>
                        </div>
                      </div>
                      <div class="row -html">
                        <span class="link" @click="showAdvancedOptions = !showAdvancedOptions">
                          {{
                          !showAdvancedOptions
                          ? "+ Thêm lựa chọn nâng cao"
                          : "- Ẩn lựa chọn nâng cao"
                          }}
                        </span>
                      </div>
                      <div class="form-buttons -two">
                        <button class="button ok -success -rounded bold">Tạo dự án mới</button>
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
import { mapState, mapActions } from "vuex";
import DatePicker from "v-calendar/lib/components/date-picker.umd";
import moment from "moment";
import { viDateFormat } from "../../constants";
import Multiselect from "vue-multiselect";

export default {
  name: "project-add",
  props: {
    showProjectAdd: { type: Boolean, default: false },
    departments: { type: Array, default: [] },
    users: { type: Array, default: [] },
    currentUser: { type: Object, default: null }
  },
  data() {
    return {
      name: "",
      manager: null,
      followers: [],
      department: null,
      isInternal: 1,
      startDate: "",
      finishDate: "",
      statusId: 1,
      description: "",
      masks: {
        input: viDateFormat
      },
      popover: {
        visibility: "focus"
      },
      showAdvancedOptions: false,
      errors: {}
    };
  },
  computed: {
    startDateValue: {
      get() {
        return;
      },
      set(val) {
        this.startDate = val ? moment(val).format("YYYY-MM-DD") : "";
      }
    },
    finishDateValue: {
      get() {
        return;
      },
      set(val) {
        this.finishDate = val ? moment(val).format("YYYY-MM-DD") : "";
      }
    }
  },
  methods: {
    ...mapActions(["createProject"]),
    closeProjectAdd() {
      this.$store.commit("TOGGLE_PROJECT_ADD");
      this.errors = {};
      this.name = "";
      this.manager = null;
      this.followers = [];
      this.department = null;
      this.isInternal = 1;
      this.startDate = "";
      this.finishDate = "";
      this.statusId = 1;
      this.description = "";
    },
    checkIsInternal(value) {
      this.isInternal = value;
    },
    customLabel({ name, position }) {
      return `${name}`;
    },
    handleCreateProject(event) {
      const data = {
        name: this.name,
        manager_id: this.manager ? this.manager.id : null,
        followers: this.followers.map(follower => {
          return follower.id;
        }),
        department_id: this.department ? this.department.id : null,
        is_internal: this.isInternal,
        start_date: this.startDate,
        finish_date: this.finishDate,
        status_id: this.statusId,
        description: this.description
      };

      let currentUserId = this.currentUser.id;
      if (this.$route.name === "projects-admin") currentUserId = null;

      this.createProject({ data, currentUserId }).then(response => {
        if (!response.error) {
          this.closeProjectAdd();
          this.$notify({
            group: "notify",
            type: "success",
            text: "Thêm mới dự án nhật thành công!"
          });
        } else {
          this.errors = response.message;
        }
      });
      event.target.reset();
    }
  },
  components: {
    DatePicker,
    Multiselect
  }
};
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style scoped>
.option__image {
  width: 24px;
  height: 24px;
  border-radius: 3px;
  object-fit: cover;
  object-position: center;
  float: left;
}
.option__desc {
  margin-left: 30px;
}
.option__title {
  font-size: 12px;
  font-weight: bold;
}
.option__small {
  font-size: 12px;
  font-weight: normal;
  opacity: 0.8;
}
</style>
