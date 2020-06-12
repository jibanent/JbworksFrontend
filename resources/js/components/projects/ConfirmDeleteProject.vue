<template>
  <div id="apdialogs" style="display: block;" v-if="showConfirmDeleteProject">
    <div class="__customdialog -full -strong-alert __temp __dialog __dialog_ontop">
      <div class="__dialogwrapperscroller scroll-y forced-scroll">
        <div class="full-mask"></div>
        <div class="__dialogwrapper" style="top: 50%; left: 50%; transform: translate(-50%, -50%)">
          <div class="__dialogwrapper-inner">
            <div class="__dialogmain">
              <div class="__dialogtitle ap-xdot">Untitled</div>
              <div class="__dialogcontent simple-form">
                <div id="confirm-delete" class="__apdialog" title style="width: 600px;">
                  <div id="confirm-delete-box">
                    <div class="icon">
                      <img src="https://share-gcdn.basecdn.net/svgs/alert.svg" />
                    </div>
                    <div class="cd-title">Dangerous Action</div>
                    <div class="cd-explain">
                      If you decide and confirm to delete, the data (and several linked data) WILL BE REMOVED
                    </div>
                    <div
                      class="cd-explain-more"
                    >Bạn có chắc muốn xoá dự án này? Các công việc liên quan cũng sẽ bị xoá</div>
                    <div class="buttons">
                      <div class="button cancel left" @click="hideConfirmDeleteProject">Cancel</div>
                      <div
                        class="button delete right"
                        @click="handleDeleteProject"
                      >Confirm to delete</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="clear"></div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions } from "vuex";
export default {
  name: "confirm-delete-project",
  props: {
    showConfirmDeleteProject: { type: Boolean, default: false },
    projectSelected: { type: Object, default: null }
  },
  methods: {
    ...mapActions(["deleteProject"]),
    hideConfirmDeleteProject() {
      this.$store.commit("TOGGLE_CONFIRM_DELETE_PROJECT");
    },
    handleDeleteProject() {
      this.deleteProject(this.projectSelected).then(response => {
        if (!response.error) {
          this.hideConfirmDeleteProject();
          this.$notify({
            group: "notify",
            type: "success",
            text: "Xóa dự án thành công!"
          });
          if (this.$route.name === "tasks-by-project") {
            this.$router.push("/projects");
          }
        }
      });
    }
  }
};
</script>

<style scoped>
.button.delete {
  border: 2px solid #fff !important;
  color: #fff;
  font-weight: 500;
  border: 2px solid #fff;
  opacity: 0.4;
}
.button.delete:hover {
  opacity: 1;
}
</style>
