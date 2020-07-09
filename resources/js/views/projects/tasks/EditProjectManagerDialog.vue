<template>
  <div id="apdialogs" style="display: block;" v-if="showEditProjectManagerDialog">
    <div class="__fdialog __temp __dialog __canvas_closable __dialog_ontop">
      <div class="__closable"></div>
      <div class="__fdialogwrapper scroll-y forced-scroll">
        <div class="__dialogwrapper" style="top: 50%; left: 50%; transform: translate(-50%, -50%)">
          <div class="__dialogwrapper-inner">
            <div class="__dialogmain">
              <div class="__dialogtitlewrap">
                <div class="left relative">
                  <div class="__dialogtitle unselectable ap-xdot">Thay đổi quản lý dự án</div>
                  <div class="__dialogtitlerender tx-fill"></div>
                </div>
                <div class="clear"></div>
              </div>
              <div class="__dialogclose" @click="closeEditProjectManagerDialog">
                <span class="-ap icon-close"></span>
              </div>
              <div class="__dialogcontent">
                <div id="fly-edititem-dx" class="__apdialog" title style="width: 450px;">
                  <div class="form form-dialog -flat">
                    <form @submit.prevent="handleAddMembersToProject">
                      <div class="row -istextarea -big -active">
                        <div class="label">Chọn quản lý dự án</div>
                        <select-box
                          :options="myMembers.data"
                          placeholder="Type to search"
                          :value="manager"
                          @input="onChange"
                        />
                        <div class="clear"></div>
                      </div>
                      <div class="form-buttons -two">
                        <button type="submit" class="button ok -success -rounded bold">Lưu</button>
                        <div
                          class="button cancel -passive-2 -rounded"
                          @click="closeEditProjectManagerDialog"
                        >Huỷ</div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <loading :class="{ show: isSubmitting }" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import SelectBox from "../../../components/SelectBox";
import Loading from "../../../components/Loading";
import { mapActions } from "vuex";
import { message } from "../../../helpers";
export default {
  name: "edit-project-manager-dialog",
  props: {
    myMembers: { type: Object, default: {} },
    showEditProjectManagerDialog: { type: Boolean, default: false },
    projectMemberSelected: { type: Object, default: null },
    isSubmitting: { type: Boolean, default: false }
  },
  data() {
    return {
      manager: null
    };
  },
  watch: {
    projectMemberSelected(projectMemberSelected) {
      this.manager = projectMemberSelected.project.manager;
    }
  },
  methods: {
    ...mapActions(["changeProjectManager"]),
    closeEditProjectManagerDialog() {
      this.$store.commit("TOGGLE_EDIT_PROJECT_MANAGER_DIALOG");
      this.members = null;
    },
    handleAddMembersToProject() {
      const project = this.projectMemberSelected.project;
      const { manager } = this;
      if (this.manager) {
        this.changeProjectManager({ project, manager }).then(response => {
          if (!response.error) {
            this.closeEditProjectManagerDialog();
            this.$notify(
              message("success", this.$t("messages.updated successfully"))
            );
          }
        });
      }
    },
    onChange(selected) {
      this.manager = selected;
    }
  },
  components: {
    SelectBox,
    Loading
  }
};
</script>

<style></style>
