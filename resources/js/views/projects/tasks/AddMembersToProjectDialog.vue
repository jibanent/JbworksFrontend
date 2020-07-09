<template>
  <div id="apdialogs" style="display: block;" v-if="showAddMembersToProjectDialog">
    <div class="__fdialog __temp __dialog __canvas_closable __dialog_ontop">
      <div class="__closable"></div>
      <div class="__fdialogwrapper scroll-y forced-scroll">
        <div class="__dialogwrapper" style="top: 50%; left: 50%; transform: translate(-50%, -50%)">
          <div class="__dialogwrapper-inner">
            <div class="__dialogmain">
              <div class="__dialogtitlewrap">
                <div class="left relative">
                  <div class="__dialogtitle unselectable ap-xdot">Thêm nhiều thành viên</div>
                  <div class="__dialogtitlerender tx-fill"></div>
                </div>
                <div class="clear"></div>
              </div>
              <div class="__dialogclose" @click="closeAddMembersToProjectDialog">
                <span class="-ap icon-close"></span>
              </div>
              <div class="__dialogcontent">
                <div id="fly-edititem-dx" class="__apdialog" title style="width: 450px;">
                  <div class="form form-dialog -flat">
                    <form @submit.prevent="handleAddMembersToProject">
                      <div class="row -istextarea -big -active">
                        <div class="label">Thêm nhiều thành viên</div>
                        <select-box
                          :options="myMembers.data"
                          placeholder="Type to search"
                          :multiple="true"
                          @input="onChange"
                        />
                        <div class="clear"></div>
                      </div>
                      <div class="form-buttons -two">
                        <button type="submit" class="button ok -success -rounded bold">Thêm</button>
                        <div
                          class="button cancel -passive-2 -rounded"
                          @click="closeAddMembersToProjectDialog"
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
import { message } from "../../../helpers";
import { mapActions } from "vuex";
export default {
  name: "add-members-to-project-dialog",
  props: {
    myMembers: { type: Object, default: {} },
    showAddMembersToProjectDialog: { type: Boolean, default: false },
    projectMemberSelected: { type: Object, default: null },
    isSubmitting: { type: Boolean, default: false }
  },
  data() {
    return {
      members: null
    };
  },
  methods: {
    ...mapActions(["addMembersToProject"]),
    closeAddMembersToProjectDialog() {
      this.$store.commit("TOGGLE_ADD_MEMBERS_TO_PROJECT_DIALOG");
      this.members = null;
    },
    handleAddMembersToProject() {
      const project = this.projectMemberSelected.project;
      const { members } = this;
      if (this.members) {
        this.addMembersToProject({ project, members }).then(response => {
          if (!response.error) {
            this.closeAddMembersToProjectDialog();
            this.$notify(
              message(
                "success",
                this.$t(
                  "messages.member has been added to project successfully"
                )
              )
            );
          }
        });
      }
    },
    onChange(selected) {
      this.members = selected;
    }
  },
  components: {
    SelectBox,
    Loading
  }
};
</script>

<style></style>
