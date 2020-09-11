<template>
  <div id="setting">
    <div id="toolbox">
      <div class="upload-canvas" id="js-upload-canvas">
        <div class="box">
          <div class="header">
            <div class="icon">
              <span class="-ap icon-open_in_browser"></span>
            </div>
            <div class="title">Import tasks from Excel</div>
            <div class="subtitle">
              Quickly import from excel (
              <a @click="handleDownloadExcel">View template</a>)
            </div>
          </div>

          <div class="content">
            <ul>
              <li>1. {{ $t("common.first note") }}</li>
              <li>2. {{ $t("common.second note") }}</li>
              <li class="text-danger">3. {{ $t("common.fourth note") }}</li>
            </ul>
          </div>

          <div
            class="upload"
            @click="$store.commit('TOGGLE_IMPORT_TASKS_DIALOG')"
          >{{ $t("common.open form import") }}</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions } from "vuex";
export default {
  name: "import-tasks",
  methods: {
    ...mapActions(["downloadExcel"]),
    handleDownloadExcel() {
      this.downloadExcel().then((response) => {
        var fileURL = window.URL.createObjectURL(new Blob([response.data]));
        var fileLink = document.createElement("a");

        fileLink.href = fileURL;
        fileLink.setAttribute("download", "project_example.xlsx");
        document.body.appendChild(fileLink);

        fileLink.click();
        document.body.removeChild(fileLink);
      });
    },
  },
};
</script>

<style>
</style>
