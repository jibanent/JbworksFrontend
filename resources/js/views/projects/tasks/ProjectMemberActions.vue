<template>
  <div id="context-menu" style="right: -17px;display: block;" v-if="showProjectMemberActions">
    <div id="context-menu-close" @click="hideProjectMemberActions"></div>
    <div class="context-canvas-slider">
      <div
        id="context-menu-main"
        class
        :style="`top: ${coordinatesShowProjectMemberActions.y}px; left: ${coordinatesShowProjectMemberActions.x}px; width: 300px;`"
      >
        <div class="header hidden"></div>
        <div class="menu">
          <div class="items">
            <div class="item" @click="removeMembersFromProject">
              <span class="icon">
                <span class="-ap icon-uniF11F"></span>
              </span>
              {{ $t('projects.remove someone from project', {name: projectMemberSelected.member.name }) }}
            </div>
          </div>
        </div>
        <div class="footer"></div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions } from "vuex";
import { message } from "../../../helpers";
export default {
  name: "project-member-actions",
  props: {
    showProjectMemberActions: { type: Boolean, default: false },
    projectMemberSelected: { type: Object, default: null },
    coordinatesShowProjectMemberActions: { type: Object, default: null },
    project: { type: Object, default: null }
  },
  methods: {
    ...mapActions(["removeMemberFromProject"]),
    hideProjectMemberActions() {
      this.$store.commit("TOGGLE_PROJECT_MEMBER_ACTIONS");
    },
    removeMembersFromProject() {
      const { project, member } = this.projectMemberSelected;
      this.removeMemberFromProject({
        project_id: project.id,
        user_id: member.id
      }).then(response => {
        if (!response.error) {
          this.hideProjectMemberActions();
          this.$notify(
            message(
              "success",
              this.$t(
                "messages.member has been removed from project successfully"
              )
            )
          );
        }
      });
    }
  },
  components: {}
};
</script>

<style>
</style>
