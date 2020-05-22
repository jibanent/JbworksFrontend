<template>
  <div id="apdialogs" style="display: block;">
    <div class="__fdialog __temp __dialog __canvas_closable __dialog_ontop">
      <div class="__closable"></div>
      <div class="__fdialogwrapper scroll-y forced-scroll">
        <div class="__dialogwrapper" style="top: 50%; left: 50%; transform: translate(-50%, -50%)">
          <div class="__dialogwrapper-inner">
            <div class="__dialogmain">
              <div class="__dialogtitlewrap">
                <div class="left relative">
                  <div class="__dialogtitle unselectable ap-xdot">Sửa thời gian thực hiện dự án</div>
                  <div class="__dialogtitlerender tx-fill"></div>
                </div>
                <div class="clear"></div>
              </div>
              <div class="__dialogclose" @click="closeEditProjectDurationDialog">
                <span class="-ap icon-close"></span>
              </div>
              <div class="__dialogcontent">
                <div id="popform" class="__apdialog" title style="width: 420px;">
                  <div class="form form-dialog -flat">
                    <form @submit.prevent="handleUpdateProjectDuration">
                      <div class="row -istext -active" id="_uuid34568_44517_1590138434">
                        <div class="label">Ngày bắt đầu</div>
                        <div class="input data">
                          <span
                            class="-ap icon-uniF1072"
                            style="position: absolute; right:10px; top:10px; color:#aaa; font-size:16px;"
                          ></span>
                          <date-picker
                            v-model="start_date"
                            :input-props="{placeholder: 'Ngày bắt đầu'}"
                            :masks="masks"
                            :popover="popover"
                          />
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="row -istext -active" id="_uuid9771_37242_1590138434">
                        <div class="label">Ngày kết thúc</div>
                        <div class="input data">
                          <span
                            class="-ap icon-uniF1072"
                            style="position: absolute; right:10px; top:10px; color:#aaa; font-size:16px;"
                          ></span>
                          <date-picker
                            v-model="finish_date"
                            :input-props="{placeholder: 'Ngày kết thúc'}"
                            :masks="masks"
                            :popover="popover"
                          />
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="form-buttons -two">
                        <button class="button ok -success -rounded bold">Cập nhật</button>
                        <div
                          class="button cancel -passive-2 -rounded"
                          @click="closeEditProjectDurationDialog"
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
import Loading from "../../common/Loading";
import DatePicker from "v-calendar/lib/components/date-picker.umd";
import { viDateFormat } from "../../../constants";
import moment from "moment";
import { mapActions } from "vuex";
export default {
  name: "edit-project-duration-dialog",
  props: {
    project: { type: Object, default: null },
    isSubmitting: { type: Boolean, default: false }
  },
  data() {
    return {
      start_date: this.project.start_date
        ? new Date(this.project.start_date)
        : "",
      finish_date: this.project.finish_date
        ? new Date(this.project.finish_date)
        : "",
      masks: {
        input: viDateFormat
      },
      popover: {
        visibility: "focus"
      }
    };
  },
  methods: {
    ...mapActions(["updateProjectDuration"]),
    closeEditProjectDurationDialog() {
      this.$store.commit("TOGGLE_EDIT_PROJECT_DURATION_DIALOG");
    },
    handleUpdateProjectDuration() {
      const { start_date, finish_date } = this;
      const data = {
        start_date: start_date ? moment(start_date).format("YYYY-MM-DD") : "",
        finish_date: finish_date ? moment(finish_date).format("YYYY-MM-DD") : ""
      };
      const projectId = this.project.id;
      this.updateProjectDuration({ data, projectId }).then(response => {
         if (!response.error) {
            this.closeEditProjectDurationDialog()
            this.$notify({
              group: "notify",
              type: "success",
              text: "Cập nhật dự án thành công!"
            });
          }
      });
    }
  },
  components: {
    DatePicker,
    Loading
  }
};
</script>

<style>
</style>
