<template>
  <div id="apdialogs" style="display: block;" v-if="openExportTasksDialog">
    <div class="__fdialog __temp __dialog __dialog_ontop __canvas_closable">
      <div class="__closable"></div>
      <div class="__fdialogwrapper scroll-y forced-scroll">
        <div class="__dialogwrapper">
          <div class="__dialogwrapper-inner">
            <div class="__dialogmain">
              <div class="__dialogtitlewrap">
                <div class="left relative">
                  <div class="__dialogtitle unselectable ap-xdot">
                    Trích xuất công việc
                  </div>
                  <div class="__dialogtitlerender tx-fill"></div>
                </div>
                <div class="clear"></div>
              </div>
              <div class="__dialogclose" @click="closeExportTasksDialog">
                <span class="-ap icon-close"></span>
              </div>
              <div class="__dialogcontent">
                <div
                  id="popform"
                  class="__apdialog"
                  title
                  style="width: 480px;"
                >
                  <div class="form form-dialog -flat">
                    <form @submit.prevent="handleExportTasks">
                      <div class="form-rows">
                        <div class="row -istext -active">
                          <div class="label">Từ ngày</div>
                          <div class="input data">
                            <span
                              class="-ap icon-uniF1072"
                              style="position: absolute; right:10px; top:10px; color:#aaa; font-size:16px;"
                            ></span>
                            <date-picker
                              v-model="from"
                              :input-props="{
                                class: 'std hasDatepicker',
                                placeholder:
                                  'Ngày bắt đầu mặc định là ngày tạo dự án'
                              }"
                              :masks="masks"
                              :popover="popover"
                            />
                          </div>
                          <div class="clear"></div>
                        </div>
                        <div class="row -istext -active">
                          <div class="label">Tới ngày</div>
                          <div class="input data">
                            <span
                              class="-ap icon-uniF1072"
                              style="position: absolute; right:10px; top:10px; color:#aaa; font-size:16px;"
                            ></span>
                            <date-picker
                              v-model="to"
                              :input-props="{
                                class: 'std hasDatepicker',
                                placeholder: 'Ngày kết thúc mặc định là hôm nay'
                              }"
                              :masks="masks"
                              :popover="popover"
                            />
                          </div>
                          <div class="clear"></div>
                        </div>
                      </div>
                      <div class="form-buttons -two">
                        <button
                          type="submit"
                          class="button ok -success -rounded bold"
                        >
                          Export
                        </button>
                        <div
                          class="button cancel -passive-2 -rounded"
                          @click="closeExportTasksDialog"
                        >
                          Huỷ
                        </div>
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
import { masks } from "../../../../helpers";
import moment from "moment";
import { mapActions, mapState } from "vuex";
import Loading from "../../../../components/Loading";
export default {
  name: "export-tasks-dialog",
  data() {
    return {
      from: new Date(moment().subtract(1, "month")),
      to: new Date(moment()),
      popover: {
        visibility: "focus"
      }
    };
  },
  computed: {
    ...mapState({
      openExportTasksDialog: state => state.projects.openExportTasksDialog,
      isSubmitting: state => state.isSubmitting,
      project: state => state.projects.project
    }),
    masks() {
      return masks();
    }
  },
  methods: {
    ...mapActions(["exportTasks"]),
    closeExportTasksDialog() {
      this.$store.commit("TOGGLE_EXPORT_TASKS_DIALOG");
    },
    handleExportTasks() {
      const data = {
        project_id: this.$route.params.id,
        from: moment(this.from).format("YYYY-MM-DD"),
        to: moment(this.to).format("YYYY-MM-DD")
      };
      this.exportTasks(data).then(response => {
        if (!response.error) {
          console.log('response', response.data);
          var fileURL = window.URL.createObjectURL(new Blob([response.data]));
          var fileLink = document.createElement("a");
          fileLink.href = fileURL;
          fileLink.setAttribute("download", this.project.name + '.xlsx');
          document.body.appendChild(fileLink);

          fileLink.click();
          document.body.removeChild(fileLink);
          this.closeExportTasksDialog()
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

<style></style>
