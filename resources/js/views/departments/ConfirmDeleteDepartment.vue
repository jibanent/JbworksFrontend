<template>
  <div id="apdialogs" style="display: block;" v-if="showConfirmDeleteDepartment">
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
                    <div
                      class="cd-explain"
                    >If you decide and confirm to delete, the data (and several linked data) WILL BE REMOVED</div>
                    <div
                      class="cd-explain-more"
                    >{{ $t('departments.are you sure you want to delete this department, the data and several linked data will be remove') }}</div>
                    <div class="buttons">
                      <div
                        class="button cancel left"
                        @click="hideConfirmDeleteDepartment"
                      >{{ $t('common.cancel') }}</div>
                      <div
                        class="button delete right"
                        @click="handleDeleteDepartment"
                      >{{ $t('common.confirm to delete') }}</div>
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
import { mapActions, mapState } from "vuex";
import { message } from "../../helpers";
export default {
  name: "confirm-delete-department",
  props: {
    showConfirmDeleteDepartment: { type: Boolean, default: false },
  },
  computed: {
    ...mapState({
      department: (state) => state.departments.department,
    }),
  },
  methods: {
    ...mapActions(["deleteDepartment"]),
    hideConfirmDeleteDepartment() {
      this.$store.commit("TOGGLE_CONFIRM_DELETE_DEPARTMENT");
    },
    handleDeleteDepartment() {
      this.deleteDepartment(this.department).then((response) => {
        if (!response.error) {
          this.hideConfirmDeleteDepartment();
          if (response.status === "success") {
            this.$notify(
              message("success", this.$t("messages.delete completed"))
            );
          }
          if (response.status === "warning") {
            this.$notify(
              message(
                "warn",
                this.$t(
                  "departments.you are not allowed to delete this department"
                )
              )
            );
          }
        }
      });
    },
  },
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
