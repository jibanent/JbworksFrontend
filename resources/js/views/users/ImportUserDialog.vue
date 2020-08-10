<template>
  <div id="apdialogs" style=" display: block;" v-if="showImportUserDialog">
    <div class="__fdialog __temp __dialog __dialog_ontop">
      <div class="__fdialogwrapper scroll-y forced-scroll">
        <div class="__dialogwrapper">
          <div class="__dialogwrapper-inner">
            <div class="__dialogmain">
              <div class="__dialogtitlewrap">
                <div class="left relative">
                  <div class="__dialogtitle unselectable ap-xdot">Import users</div>
                  <div class="__dialogtitlerender tx-fill"></div>
                </div>
                <div class="clear"></div>
              </div>
              <div class="__dialogclose" @click="$store.commit('TOGGLE_IMPORT_USERS_DIALOG')">
                <span class="-ap icon-close"></span>
              </div>
              <div class="__dialogcontent">
                <div id="dialog-excel-dx" class="__apdialog" style="width: 600px;">
                  <div class="form form-dialog -flat">
                    <form @submit.prevent="handleImportUsers">
                      <div class="form-rows">
                        <div class="row -isplaceholder -active">
                          <div class="label">Choose Excel file</div>
                          <div class="ui-placeholder">
                            <div class="input data">
                              <input type="file" name="file" @change="onFileChange" />
                            </div>
                          </div>
                          <div class="clear"></div>
                        </div>
                      </div>
                      <div class="form-buttons -two">
                        <button
                          type="submit"
                          class="button ok -success -rounded -bold"
                        >{{ $t('common.continue') }}</button>
                        <div
                          class="button cancel -passive-2 -rounded"
                          @click="$store.commit('TOGGLE_IMPORT_USERS_DIALOG')"
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
import { mapState, mapActions } from "vuex";
import { message } from "../../helpers";
export default {
  name: "import-user-dialog",
  data() {
    return {
      import_file: "",
    };
  },
  computed: {
    ...mapState({
      showImportUserDialog: (state) => state.users.showImportUserDialog,
    }),
  },
  methods: {
    ...mapActions(["importUsers"]),
    onFileChange(e) {
      this.import_file = e.target.files[0];
    },
    handleImportUsers() {
      const data = { import_file: this.import_file };
      this.importUsers(data).then((response) => {
        if (!response.error) {
          this.$store.commit("TOGGLE_IMPORT_USERS_DIALOG");
          this.$notify(
            message(
              "success",
              this.$t("messages.imported data successfully")
            )
          );
        } else {
          this.errors = response.message;
        }
      });
    },
  },
};
</script>

<style>
</style>
