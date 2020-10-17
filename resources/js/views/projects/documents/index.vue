<template>
  <div>
    <tasks-by-project-header :project="project" />

    <div id="project-master" class="simple scroll-y forced-scroll">
      <div class="canvas relative">
        <div class="project project-board" id="js-docboard">
          <div id="subheader" class="ext -gray">
            <div class="title">
              <span class="-ap icon-folder-open"></span>&nbsp;
              <span class="url">Documents</span>
            </div>

            <div class="side">
              <div class="filter -cta">
                <span class="-ap icon-plus2 plus"></span><em>Add</em>

                <div class="dd">
                  <div class="xo relative">
                    <div
                      class="li uploadable"
                      id="project-upload-direct"
                      data-name="file"
                    >
                      Upload new document
                      <div class="upload-form">
                        <form>
                          <input type="file" @change="handleUploadFile" />
                        </form>
                      </div>
                    </div>
                  </div>
                  <div
                    class="li"
                    @click="$store.commit('TOGGLE_ADD_NEW_FOLDER_DIALOG')"
                  >
                    Create new folder
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div id="files" class="js-dndcanvas">
            <div class="table">
              <div class="theader">
                <div class="col -icon"></div>
                <div class="col -name">Name</div>
                <div class="col -author">Last modified</div>
                <div class="col -size">Size</div>
                <div class="col -actions"></div>
              </div>

              <div class="tbody">
                <document
                  v-for="myDrive in documents"
                  :key="myDrive.id"
                  :myDrive="myDrive"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions, mapState } from "vuex";
import TasksByProjectHeader from "../tasks/TasksByProjectHeader";
import Document from "./Document";
import { message } from "../../../helpers";
export default {
  name: "documents",
  data() {
    return {};
  },
  created() {
    const projectId = this.$route.params.id;
    this.getProjectById(projectId);
    if (this.$route.params.basename) {
      this.getDocuments({
        google_drive_folder_id: this.$route.params.basename,
      });
    }
  },
  watch: {
    project() {
      if (!this.$route.params.basename) {
        const { google_drive_folder_id } = this.project;
        this.getDocuments({ google_drive_folder_id });
      }
    },
    $route(to, from) {
      if (to.params.basename) {
        this.getDocuments({ google_drive_folder_id: to.params.basename });
      } else {
        const { google_drive_folder_id } = this.project;
        this.getDocuments({ google_drive_folder_id });
      }
    },
  },
  methods: {
    ...mapActions(["getProjectById", "getDocuments", "uploadFile"]),
    handleUploadFile(e) {
      const data = {
        file: e.target.files[0],
        basename: this.$route.params.basename
          ? this.$route.params.basename
          : this.project.google_drive_folder_id,
      };
      this.uploadFile(data);
    },
  },
  computed: {
    ...mapState({
      project: (state) => state.projects.project,
      documents: (state) => state.documents.documents,
    }),
  },
  components: { TasksByProjectHeader, Document },
};
</script>

<style></style>
