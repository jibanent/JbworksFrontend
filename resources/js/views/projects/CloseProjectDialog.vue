<template>
  <div id="apdialogs" v-if="showCloseProjectDialog">
    <div class="__fdialog __temp __dialog __dialog_ontop __canvas_closable">
      <div class="__closable"></div>
      <div class="__fdialogwrapper scroll-y forced-scroll">
        <div class="__dialogwrapper">
          <div class="__dialogwrapper-inner">
            <div class="__dialogmain">
              <div class="__dialogtitlewrap">
                <div class="left relative">
                  <div
                    class="__dialogtitle unselectable ap-xdot"
                  >{{ projectEditing.active ? $t('projects.close project') : $t('projects.reopen project') }}</div>
                  <div class="__dialogtitlerender tx-fill"></div>
                </div>
                <div class="clear"></div>
              </div>
              <div class="__dialogclose" @click="hideCloseProjectDialog">
                <span class="-ap icon-close"></span>
              </div>
              <div class="__dialogcontent">
                <div id="popform" class="__apdialog" style="width: 520px;">
                  <div class="form form-dialog form-inline">
                    <form @submit.prevent="handleCloseOrReopenProject">
                      <div class="row -isfake">
                        <div class="label">{{ $t('projects.project name') }}</div>
                        <div class="input data">
                          <div class="input-fake ap-xdot">{{ projectEditing.name }}</div>
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="row -isselect" id="_uuid74649_81845_1591693549">
                        <div class="label">
                          {{ $t('projects.status') }}
                          <div class="sublabel">{{ $t('projects.update status') }}</div>
                        </div>
                        <div class="select data">
                          <select v-model="open_status" v-if="!projectEditing.active">
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
                          @click="hideCloseProjectDialog"
                        >{{ $t('common.cancel') }}</div>
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
import { projectStatuses } from "../../config/status";
import { mapActions } from "vuex";
import { message } from "../../helpers";
export default {
  name: "close-project-dialog",
  props: {
    showCloseProjectDialog: { type: Boolean, default: false },
    projectEditing: { type: Object, default: null }
  },
  watch: {
    projectEditing(project) {
      console.log("watch", project);
      this.open_status = project.open_status ? project.open_status : "on_track";
      this.close_status = project.close_status
        ? project.close_status
        : "success";
    }
  },
  data() {
    return {
      open_status: "on_track",
      close_status: "success",
      projectStatuses
    };
  },
  methods: {
    ...mapActions(["closeOrReopenProject"]),
    hideCloseProjectDialog() {
      this.$store.commit("SET_PROJECT_CLOSING_OR_REOPENING");
    },
    handleCloseOrReopenProject() {
      const projectId = this.projectEditing.id;
      const data = {
        open_status: this.open_status,
        close_status: this.close_status,
        active: !this.projectEditing.active
      };
      this.closeOrReopenProject({ data, projectId }).then(response => {
        if (!response.error) {
          this.hideCloseProjectDialog();
          this.$notify(
            message("success", this.$t("messages.updated successfully"))
          );
        }
      });
    }
  }
};
</script>

<style>
</style>
