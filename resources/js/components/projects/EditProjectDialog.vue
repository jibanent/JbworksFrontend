<template>
  <div id="apdialogs" style=" display: block;" v-if="showEditProjectDialog">
    <div class="__fdialog __temp __dialog __dialog_ontop __canvas_closable">
      <div class="__closable"></div>
      <div class="__fdialogwrapper scroll-y forced-scroll">
        <div class="__dialogwrapper" style="top: 50%; left: 50%; transform: translate(-50%, -50%)">
          <div class="__dialogwrapper-inner">
            <div class="__dialogmain">
              <div class="__dialogtitlewrap">
                <div class="left relative">
                  <div class="__dialogtitle unselectable ap-xdot">Edit: {{ projectEditing.name }}</div>
                  <div class="__dialogtitlerender tx-fill"></div>
                </div>
                <div class="clear"></div>
              </div>
              <div class="__dialogclose" @click="closeEditProjectDialog">
                <span class="-ap icon-close"></span>
              </div>
              <div class="__dialogcontent">
                <div class="__apdialog" style="width: 480px;">
                  <div class="form form-dialog -flat">
                    <form @submit.prevent="handleUpdateProject">
                      <div class="row -istext -active">
                        <div class="label">Tên dự án</div>
                        <div class="input data">
                          <input
                            type="text"
                            placeholder="Tên dự án/phòng ban"
                            class="std"
                            v-model="name"
                          />
                        </div>
                        <div
                          class="validate-error"
                          v-for="error in errors.name"
                          :key="error.id"
                        >{{ error }}</div>
                        <div class="clear"></div>
                      </div>
                      <div class="row -isselect -active">
                        <div class="label">Phòng ban</div>
                        <div class="select data js-improved-select">
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
                              :allow-empty="false"
                              deselect-label="Can't remove this value"
                              :options-limit="300"
                              :limit="10"
                              :max-height="600"
                              :custom-label="customLabel"
                            >
                              <template slot="option" slot-scope="props">
                                <span class="option__title">
                                  {{
                                  props.option.name
                                  }}
                                </span>
                              </template>
                            </multiselect>
                          </div>
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="row -istext -active">
                        <div class="label">Người quản trị</div>
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
                            :allow-empty="false"
                            deselect-label="Can't remove this value"
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

                      <div class="row -isbase -active">
                        <div class="label">Ngày bắt đầu và kết thúc</div>
                        <div class="input-group -count-2">
                          <div class="gi" style="width: 50%">
                            <div class="input data">
                              <span
                                class="-ap icon-uniF1072"
                                style="position: absolute; right:10px; top:10px; color:#aaa; font-size:16px;"
                              ></span>
                              <date-picker
                                v-model="start_date"
                                :input-props="{
                                  class: 'std hasDatepicker',
                                  placeholder: 'Chọn ngày bắt đầu'
                                }"
                                :masks="masks"
                                :popover="popover"
                              />
                            </div>
                          </div>
                          <div class="gi" style="width: 50%">
                            <div class="input data">
                              <span
                                class="-ap icon-uniF1072"
                                style="position: absolute; right:10px; top:10px; color:#aaa; font-size:16px;"
                              ></span>
                              <date-picker
                                v-model="finish_date"
                                :input-props="{
                                  class: 'std hasDatepicker',
                                  placeholder: 'Chọn ngày kết thúc'
                                }"
                                :masks="masks"
                                :popover="popover"
                              />
                            </div>
                          </div>
                          <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="row -istextarea -active">
                        <div class="label">Mô tả dự án/phòng ban</div>
                        <div class="input data">
                          <textarea
                            name="content"
                            placeholder="Mô tả ngắn gọn về dự án"
                            v-model="description"
                          ></textarea>
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="form-buttons -two">
                        <button type="submit" class="button ok -success -rounded bold">Save</button>
                        <div
                          class="button cancel -passive-2 -rounded"
                          @click="closeEditProjectDialog"
                        >Huỷ</div>
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
import Multiselect from "vue-multiselect";
import DatePicker from "v-calendar/lib/components/date-picker.umd";
import { viDateFormat } from "../../constants";
import moment from "moment";
import { mapActions } from "vuex";
import Loading from '../common/Loading'
export default {
  name: "edit-project-dialog",
  props: {
    departments: { type: Array, default: [] },
    users: { type: Array, default: [] },
    showEditProjectDialog: { type: Boolean, default: false },
    projectEditing: { type: Object, default: null },
    isSubmitting: { type: Boolean, default: false}
  },
  data() {
    return {
      name: "",
      department: null,
      manager: null,
      start_date: "",
      finish_date: "",
      description: "",
      errors: {},
      masks: {
        input: viDateFormat
      },
      popover: {
        visibility: "focus"
      }
    };
  },
  watch: {
    projectEditing: function(projectEditing) {
      this.resetForm(projectEditing);
    }
  },
  methods: {
    ...mapActions(["updateProjectQuickly"]),
    customLabel({ name, position }) {
      return `${name}`;
    },
    resetForm(projectEditing) {
      this.name = projectEditing.name;
      this.department = this.departments.find(
        department => department.id === projectEditing.department_id
      );
      this.manager = this.users.find(
        user => user.id === projectEditing.manager.id
      );
      this.description = projectEditing.description;
      this.start_date = projectEditing.start_date
        ? new Date(projectEditing.start_date)
        : "";
      this.finish_date = projectEditing.finish_date
        ? new Date(projectEditing.finish_date)
        : "";
    },
    closeEditProjectDialog() {
      this.resetForm(this.projectEditing);
      this.errors = {};
      this.$store.commit("SET_PROJECT_EDITING");
    },
    handleUpdateProject() {
      const data = {
        name: this.name ? this.name : "",
        department_id: this.department ? this.department.id : null,
        manager_id: this.manager ? this.manager.id : null,
        start_date: this.start_date
          ? moment(this.start_date).format("YYYY-MM-DD")
          : "",
        finish_date: this.finish_date
          ? moment(this.finish_date).format("YYYY-MM-DD")
          : "",
        description: this.description ? this.description : ""
      };
      const projectId = this.projectEditing.id;
      this.updateProjectQuickly({ data, projectId }).then(response => {
        if (!response.error) {
          this.closeEditProjectDialog();
          this.$notify({
            group: "notify",
            type: "success",
            text: "Cập nhật dự án thành công!"
          });
        } else {
          this.errors = response.message;
        }
      });
    }
  },
  components: {
    Multiselect,
    DatePicker,
    Loading
  }
};
</script>

<style></style>
