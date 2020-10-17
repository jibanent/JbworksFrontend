<template>
  <div id="apdialogs" v-if="showAddNewFolderDialog">
    <div class="__fdialog __temp __dialog __dialog_ontop __canvas_closable">
      <div class="__closable"></div>
      <div class="__fdialogwrapper scroll-y forced-scroll">
        <div class="__dialogwrapper">
          <div class="__dialogwrapper-inner">
            <div class="__dialogmain">
              <div class="__dialogtitlewrap">
                <div class="left relative">
                  <div class="__dialogtitle unselectable ap-xdot">
                    Add new folder
                  </div>
                  <div class="__dialogtitlerender tx-fill"></div>
                </div>
                <div class="clear"></div>
              </div>
              <div
                class="__dialogclose"
                @click="$store.commit('TOGGLE_ADD_NEW_FOLDER_DIALOG')"
              >
                <span class="-ap icon-close"></span>
              </div>
              <div class="__dialogcontent">
                <div class="__apdialog" style="width: 480px">
                  <div class="form form-dialog -flat">
                    <form @submit.prevent="handleCreateNewFolder">
                      <div class="form-rows">
                        <div class="row -istext -active">
                          <div class="label">Folder name</div>
                          <div class="input data">
                            <input
                              type="text"
                              placeholder="Folder name"
                              class="std __ap_enter_binded"
                              v-model="name"
                            />
                          </div>
                          <div class="clear"></div>
                        </div>
                      </div>
                      <div class="form-buttons -two">
                        <button
                          type="submit"
                          class="button ok -success -rounded bold"
                        >
                          Add new folder
                        </button>
                        <div
                          class="button cancel -passive-2 -rounded"
                          @click="$store.commit('TOGGLE_ADD_NEW_FOLDER_DIALOG')"
                        >
                          Cancel
                        </div>
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
import { mapActions, mapState } from "vuex";
import Loading from '../../../components/Loading'
export default {
  name: "add-new-folder-dialog",
  data() {
    return {
      name: "",
    };
  },
  computed: {
    ...mapState({
      showAddNewFolderDialog: (state) => state.documents.showAddNewFolderDialog,
      project: (state) => state.projects.project,
      isSubmitting: state => state.isSubmitting
    }),
  },
  methods: {
    ...mapActions(["createNewFolder"]),
    handleCreateNewFolder() {
      let basename = this.$route.params.basename
        ? this.$route.params.basename
        : this.project.google_drive_folder_id;
      this.createNewFolder({
        name: this.name,
        basename: basename,
        projectId: this.project.id
      }).then((response) => {
        if (!response.error) {
          this.$store.commit("CLOSE_ADD_NEW_FOLDER_DIALOG");
        }
      });
    },
  },
  components: {
    Loading
  }
};
</script>

<style></style>
