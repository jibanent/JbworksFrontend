<template>
  <div id="apdialogs" style="display: block;" v-if="openImportTasksDialog">
    <div class="__fdialog __temp __dialog __dialog_ontop">
      <div class="__fdialogwrapper scroll-y forced-scroll">
        <div class="__dialogwrapper">
          <div class="__dialogwrapper-inner">
            <div class="__dialogmain">
              <div class="__dialogtitlewrap">
                <div class="left relative">
                  <div class="__dialogtitle unselectable ap-xdot">Import tasks</div>
                  <div class="__dialogtitlerender tx-fill"></div>
                </div>
                <div class="clear"></div>
              </div>
              <div class="__dialogclose" @click="closeImportTasksDialog">
                <span class="-ap icon-close"></span>
              </div>
              <div class="__dialogcontent">
                <div id="dialog-excel-dx" class="__apdialog" title style="width: 600px;">
                  <div class="form form-dialog -flat">
                    <form @submit.prevent="handleImportTasks">
                      <div class="form-rows">
                        <div class="row -isplaceholder -active">
                          <div class="label">Choose Excel file</div>
                          <div class="ui-placeholder" id="internal-excel">
                            <div class="input data">
                              <input
                                type="file"
                                name="file"
                                @change="onFileChange"
                                v-if="uploadReady"
                              />
                            </div>
                            <div
                              class="col-note warning-excel"
                              v-if="errors.length > 0"
                            >The given data was invalid.</div>
                            <div
                              class="excel-inline-wrapper scroll-y warning-excel-wrapper"
                              v-if="errors.length > 0"
                            >
                              <div class="ui-sortable">
                                <div class="ui-col" v-for="error in errors" :key="error.id">
                                  <div class="sicon ui-sortable-handle">Row {{ error.row }}.</div>
                                  <div class="col-label">{{ error.message }}</div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="form-buttons -two">
                        <button type="submit" class="button ok -success -rounded -bold">Continue</button>
                        <div
                          class="button cancel -passive-2 -rounded"
                          @click="closeImportTasksDialog"
                        >Cancel</div>
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
import { mapActions, mapState } from "vuex";
import { message } from "../../../../helpers";
import Loading from "../../../../components/Loading";
export default {
  name: "import-tasks-dialog",
  data() {
    return {
      file: "",
      errors: [],
      uploadReady: true,
    };
  },
  computed: {
    ...mapState({
      openImportTasksDialog: (state) => state.projects.openImportTasksDialog,
      isSubmitting: (state) => state.isSubmitting,
    }),
  },
  methods: {
    ...mapActions(["importTasks"]),
    closeImportTasksDialog() {
      this.errors = [];
      this.$store.commit("TOGGLE_IMPORT_TASKS_DIALOG");
    },
    handleImportTasks({ target }) {
      const data = { file: this.file };
      const projectId = this.$route.params.id;
      this.importTasks({ data, projectId }).then((response) => {
        if (!response.error) {
          this.closeImportTasksDialog();
          this.$notify(
            message("success", this.$t("messages.data imported successfully"))
          );
        } else {
          this.errors = response.messages;
          this.uploadReady = false;
          this.$nextTick(() => {
            this.uploadReady = true;
          });
        }
      });
    },
    onFileChange(e) {
      this.file = e.target.files[0];
    },
  },
  components: { Loading },
};
</script>

<style lang="scss">
.warning-excel {
  background-color: rgb(253 1 1 / 40%) !important;
  color: #793030 !important;
}
.warning-excel-wrapper {
  .ui-col {
    .sicon {
      cursor: normal !important;
      color: #fc2d42 !important;
    }
    .col-label {
      color: #fc2d42 !important;
    }
  }
}
</style>
