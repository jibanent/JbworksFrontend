<template>
  <div id="apdialogs" style="display: block;" v-if="showCloseProjectDialog">
    <div class="__fdialog __temp __dialog __dialog_ontop __canvas_closable">
      <div class="__closable"></div>
      <div class="__fdialogwrapper scroll-y forced-scroll">
        <div class="__dialogwrapper" style="top: 50%; left: 50%; transform: translate(-50%, -50%)">
          <div class="__dialogwrapper-inner">
            <div class="__dialogmain">
              <div class="__dialogtitlewrap">
                <div class="left relative">
                  <div
                    class="__dialogtitle unselectable ap-xdot"
                  >{{ projectEditing.active ? 'Close project' : 'Open project' }}</div>
                  <div class="__dialogtitlerender tx-fill"></div>
                </div>
                <div class="clear"></div>
              </div>
              <div class="__dialogclose" @click="hideCloseProjectDialog">
                <span class="-ap icon-close"></span>
              </div>
              <div class="__dialogcontent">
                <div id="popform" class="__apdialog" title style="width: 520px;">
                  <div class="form form-dialog form-inline">
                    <form @submit.prevent="handleCloseOrReopenProject">
                      <div
                        class="warning"
                        v-if="projectEditing.active"
                      >If you close this project/team, no new task could be added</div>
                      <div class="row -isfake" id="_uuid94618_58449_1591693549">
                        <div class="label">Project/team name</div>
                        <div class="input data">
                          <div class="input-fake ap-xdot">{{ projectEditing.name }}</div>
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="row -isselect" id="_uuid74649_81845_1591693549">
                        <div class="label">
                          {{ projectEditing.active ? 'Close' : 'Open' }} status
                          <div class="sublabel">Update status</div>
                        </div>
                        <div class="select data">
                          <select v-model="open_status" v-if="!projectEditing.active">
                            <option
                              :value="item.value"
                              v-for="item in projectStatuses.open"
                              :key="item.id"
                            >{{ item.name }}</option>
                          </select>
                          <select v-model="close_status" v-else>
                            <option
                              :value="item.value"
                              v-for="item in projectStatuses.close"
                              :key="item.id"
                            >{{ item.name }}</option>
                          </select>
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="form-buttons -two">
                        <button type="submit" class="button ok -success -rounded bold">Cập nhật</button>
                        <div
                          class="button cancel -passive-2 -rounded"
                          @click="hideCloseProjectDialog"
                        >Bỏ qua</div>
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
      this.closeOrReopenProject({data, projectId}).then(response => {
        if (!response.error) {
          this.hideCloseProjectDialog();
          this.$notify({
            group: "notify",
            type: "success",
            text: "Cập nhật dự án thành công!"
          });
        }
      });
    }
  }
};
</script>

<style>
</style>
