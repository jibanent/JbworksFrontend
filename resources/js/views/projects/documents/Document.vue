<template>
  <div class="item -file">
    <div class="-icon">
      <file-icon :extension="myDrive.extension" />
    </div>

    <div class="-name">
      <div class="name ap-xdot" @click="handleGetDocuments">
        <span class="url">{{ myDrive.filename }}</span>
      </div>
    </div>

    <div class="-author">
      <div class="ap-xdot">
        <span class="url username">{{ modified }}</span>
      </div>
    </div>

    <div class="-size">
      <div class="size">
        <em>{{ formatBytes(myDrive.size, 0) }}</em>
      </div>
    </div>

    <div class="-folder">...</div>

    <div class="-actions">
      <span class="action" title="Tùy chọn thêm"
        @click="$store.commit('SHOW_DOCUMENT_ACTIONS_DIALOG', myDrive)"
        ><span class="-ap icon-more_horiz"></span
      ></span>
      <span class="action" title="Chỉnh sửa"
        ><span class="-ap icon-mode_edit"></span
      ></span>
    </div>
  </div>
</template>

<script>
import moment from "moment";
import { FileIcon } from "../../../components/Icons";
import i18n from "../../../lang";
import { mapActions } from "vuex";
export default {
  name: "document",
  props: {
    myDrive: { type: Object, default: {} },
  },
  computed: {
    modified() {
      return moment
        .unix(this.myDrive.timestamp)
        .locale(i18n.locale)
        .format("L");
    },
  },
  methods: {
    ...mapActions(["getDocuments"]),
    formatBytes(bytes, decimals = 2) {
      if (bytes === 0) return "0 Bytes";
      const k = 1024;
      const dm = decimals < 0 ? 0 : decimals;
      const sizes = ["Bytes", "KB", "MB", "GB", "TB", "PB", "EB", "ZB", "YB"];

      const i = Math.floor(Math.log(bytes) / Math.log(k));

      return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + " " + sizes[i];
    },
    handleGetDocuments() {
      if (this.myDrive.type === "dir") {
        this.getDocuments({
          google_drive_folder_id: this.myDrive.basename,
        });
        this.$router.push({
          name: "documents-folder",
          params: {
            folder: "folder",
            basename: this.myDrive.basename,
          },
        });
      }
    },
  },
  components: {
    FileIcon,
  },
};
</script>

<style></style>
