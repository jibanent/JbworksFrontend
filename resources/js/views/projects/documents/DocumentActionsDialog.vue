<template>
  <div id="apdialogs" style="display: block" v-if="showDocumentActionsDialog">
    <div
      class="__customdialog -full selection-list __temp __dialog __dialog_ontop __canvas_closable"
      id="__apdialog_custom-selection"
      style="right: 17px"
    >
      <div class="__closable"></div>
      <div class="__dialogwrapperscroller scroll-y forced-scroll">
        <div class="full-mask" @click="hideDocumentActionsDialog"></div>
        <div class="__dialogwrapper">
          <div class="__dialogwrapper-inner">
            <div class="__dialogmain">
              <div class="__dialogcontent simple-form">
                <div
                  id="custom-selection"
                  class="__apdialog"
                  title=""
                  style="width: 400px"
                >
                  <div class="list list-actions -border">
                    <div class="li item unselectable">
                      <span class="-icon"
                        ><span class="-ap icon-uniF116"></span></span
                      >Edit this folder
                      <div class="-ricon">
                        <span class="ficon-angle-right"></span>
                      </div>
                    </div>
                    <div class="li item unselectable" @click="handleDelete">
                      <span class="-icon"
                        ><span class="-ap icon-uniF11F"></span
                      ></span>
                      Delete this folder
                      <div class="-ricon">
                        <span class="ficon-angle-right"></span>
                      </div>
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
export default {
  name: "document-actions-dialog",
  computed: {
    ...mapState({
      showDocumentActionsDialog: (state) =>
        state.documents.showDocumentActionsDialog,
      document: (state) => state.documents.document,
      project: (state) => state.projects.project,
    }),
  },
  methods: {
    ...mapActions(["deleteDocument"]),
    hideDocumentActionsDialog() {
      this.$store.commit("HIDE_DOCUMENT_ACTIONS_DIALOG");
    },
    handleDelete() {
      this.deleteDocument({
        project: this.project,
        document: this.document,
      }).then((response) => {
        if (!response.error) {
          
        }
      });
    },
  },
};
</script>

<style></style>
