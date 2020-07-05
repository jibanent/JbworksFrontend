<template>
  <div id="apdialogs" style="display: block;" v-if="showEditProjectStatusDialog">
    <div class="__fdialog __temp __dialog __dialog_ontop">
      <div class="__fdialogwrapper scroll-y forced-scroll">
        <div class="__dialogwrapper" style="top: 50%; left: 50%; transform: translate(-50%, -50%)">
          <div class="__dialogwrapper-inner">
            <div class="__dialogmain">
              <div class="__dialogtitlewrap">
                <div class="left relative">
                  <div class="__dialogtitle unselectable ap-xdot">{{ $t('projects.update status') }}</div>
                  <div class="__dialogtitlerender tx-fill"></div>
                </div>
                <div class="clear"></div>
              </div>
              <div class="__dialogclose" @click="closeEditProjectStatusDialog">
                <span class="-ap icon-close"></span>
              </div>
              <div class="__dialogcontent">
                <div id="fly-tasklist-dx" class="__apdialog" title style="width: 480px;">
                  <div class="form form-dialog -flat">
                    <form @submit.prevent="handleUpdateProjectStatus">
                      <div class="row -isbase -active">
                        <div class="label">{{ $t('projects.projects') }}*</div>
                        <div class="input-group -count-1">
                          <div class="gi" style="width: 100%">
                            <div class="input data">
                              <div class="input-fake ap-xdot">{{ projectEditing.name }}</div>
                            </div>
                          </div>
                          <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="row -isselect -active">
                        <div class="label">{{ $t('projects.status') }}</div>
                        <div class="select data">
                          <select v-model="open_status" v-if="projectEditing.active">
                            <option
                              :value="item.value.replace(' ', '_')"
                              v-for="item in projectStatuses.open"
                              :key="item.id"
                            >{{ $t(`projects.${item.value}`) }}</option>
                          </select>
                          <select v-model="close_status" v-else>
                            <option
                              :value="item.value.replace(' ', '_')"
                              v-for="item in projectStatuses.close"
                              :key="item.id"
                            >{{ $t(`projects.${item.value}`) }}</option>
                          </select>
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="form-buttons -two">
                        <button
                          type="submit"
                          class="button ok -success -rounded bold"
                        >{{ $t('common.save') }}</button>
                        <div
                          class="button cancel -passive-2 -rounded"
                          @click="closeEditProjectStatusDialog"
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
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions } from "vuex";
import Loading from "../../components/Loading";
import { projectStatuses } from "../../config/status";
import { message } from "../../helpers";
export default {
  name: "edit-project-status-dialog",
  props: {
    showEditProjectStatusDialog: { type: Boolean, default: false },
    projectEditing: { type: Object, default: null },
    isSubmitting: { type: Boolean, default: false }
  },
  data() {
    return {
      open_status: "",
      close_status: "",
      projectStatuses
    };
  },
  watch: {
    projectEditing(projectEditing) {
      this.open_status = projectEditing.open_status;
      this.close_status = projectEditing.close_status;
    }
  },
  methods: {
    ...mapActions(["updateProjectStatus"]),
    closeEditProjectStatusDialog() {
      this.open_status = this.projectEditing.open_status;
      this.$store.commit("SET_PROJECT_STATUS_EDITING");
    },
    handleUpdateProjectStatus() {
      const { open_status, close_status } = this;
      const projectId = this.projectEditing.id;
      this.updateProjectStatus({ open_status, close_status, projectId }).then(
        response => {
          if (!response.error) {
            this.closeEditProjectStatusDialog();
            this.$notify(
              message(
                "success",
                this.$t("messages.project has been updated successfully")
              )
            );
          } else {
            this.errors = response.message;
          }
        }
      );
    }
  },
  components: {
    Loading
  }
};
</script>

<style>
</style>
