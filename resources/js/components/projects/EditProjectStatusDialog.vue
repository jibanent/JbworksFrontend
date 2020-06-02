<template>
  <div id="apdialogs" style="display: block;" v-if="showEditProjectStatusDialog">
    <div class="__fdialog __temp __dialog __dialog_ontop">
      <div class="__fdialogwrapper scroll-y forced-scroll">
        <div class="__dialogwrapper" style="top: 50%; left: 50%; transform: translate(-50%, -50%)">
          <div class="__dialogwrapper-inner">
            <div class="__dialogmain">
              <div class="__dialogtitlewrap">
                <div class="left relative">
                  <div class="__dialogtitle unselectable ap-xdot">Status update</div>
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
                        <div class="label">Dự án*</div>
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
                        <div class="label">Stage</div>
                        <div class="select data">
                          <select v-model="status_id">
                            <option value="1">Đúng tiến độ</option>
                            <option value="2">Chậm tiến độ</option>
                            <option value="3">Có rủi ro cao</option>
                          </select>
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="form-buttons -two">
                        <button type="submit" class="button ok -success -rounded bold">Cập nhật</button>
                        <div
                          class="button cancel -passive-2 -rounded"
                          @click="closeEditProjectStatusDialog"
                        >Huỷ bỏ</div>
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
import { mapActions } from 'vuex';
export default {
  name: "edit-project-status-dialog",
  props: {
    showEditProjectStatusDialog: { type: Boolean, default: false },
    projectEditing: { type: Object, default: null }
  },
  data() {
    return {
      status_id: null
    };
  },
  watch: {
    projectEditing(projectEditing) {
      this.status_id = projectEditing.status.id;
    }
  },
  methods: {
    ...mapActions(['updateProjectStatus']),
    closeEditProjectStatusDialog() {
      this.status_id = this.projectEditing.status.id;
      this.$store.commit("SET_PROJECT_STATUS_EDITING");
    },
    handleUpdateProjectStatus() {
      const { status_id } = this;
      const projectId = this.projectEditing.id;
      this.updateProjectStatus({ status_id, projectId }).then(
        response => {
          if (!response.error) {
            this.closeEditProjectStatusDialog();
            this.$notify({
              group: "notify",
              type: "success",
              text: "Cập nhật dự án thành công!"
            });
          } else {
            this.errors = response.message;
          }
        }
      );
    }
  }
};
</script>

<style>
</style>
