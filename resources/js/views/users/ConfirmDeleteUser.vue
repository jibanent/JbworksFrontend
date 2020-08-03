<template>
  <div id="apdialogs" v-if="showConfirmDeleteUser">
    <div class="__wtdialog __apalert __dialog __dialog_ontop">
      <div class="__dialogwrapper">
        <div class="__dialogwrapper-inner">
          <div class="__dialogmain">
            <div class="__dialogclose" @click="hideConfirmDeleteUser">
              <span class="-ap icon-close"></span>
            </div>
            <div class="__dialogcontent">
              <div class="__apdialog">
                <table>
                  <tbody>
                    <tr>
                      <td class="icon">
                        <span
                          class="ficon ficon-exclamation-circle"
                          style="font-size:42px; color:#c65144"
                        ></span>
                      </td>
                      <td class="text">{{ $t('users.please confirm to remove this member') }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="__dialogbuttons unselectable">
              <div
                class="button er confirm-button"
                @click="hideConfirmDeleteUser"
              >{{ $t('common.close') }}</div>
              <div class="button ss confirm-button" @click="handleDeleteUser">{{ $t('common.ok') }}</div>
            </div>
            <loading :class="{ show: isSubmitting }" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Loading from "../../components/Loading";
import { mapActions, mapState } from "vuex";
import { message } from "../../helpers";
export default {
  name: "confirm-delete-user",
  props: {
    showConfirmDeleteUser: { type: Boolean, default: false },
    isSubmitting: { type: Boolean, default: false },
  },
  computed: {
    ...mapState({
      user: (state) => state.users.user,
    }),
  },
  methods: {
    ...mapActions(["deleteUser"]),
    hideConfirmDeleteUser() {
      this.$store.commit("TOGGLE_CONFIRM_DELETE_USER");
    },
    handleDeleteUser() {
      this.deleteUser(this.user).then((response) => {
        if (!response.error) {
          this.hideConfirmDeleteUser();
          if (response.status === "success") {
            this.$notify(
              message("success", this.$t("messages.delete completed"))
            );
          }
          if (response.status === "warning") {
            this.$notify(
              message(
                "warn",
                this.$t("users.you are not allowed to delete this member")
              )
            );
          }
        }
      });
    },
  },
  components: {
    Loading,
  },
};
</script>

<style>
</style>
