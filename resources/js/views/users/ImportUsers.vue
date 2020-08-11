<template>
  <div>
    <user-header />
    <div id="project-master" class="simple scroll-y forced-scroll">
      <div class="canvas relative">
        <div id="setting">
          <div id="toolbox">
            <div class="upload-canvas">
              <div class="box">
                <div class="header">
                  <div class="icon">
                    <span class="-ap icon-open_in_browser"></span>
                  </div>
                  <div class="title">{{ $t("users.import members form excel") }}</div>
                  <div class="subtitle">
                    {{ $t("users.quickly import from excel") }} (
                    <a
                      @click="handleDownloadExcelTemplate"
                    >
                      {{
                      $t("users.view template")
                      }}
                    </a>)
                  </div>
                </div>
                <div class="content">
                  <ul>
                    <li>1. {{ $t("users.first note") }}</li>
                    <li>2. {{ $t("users.second note") }}</li>
                    <li>3. {{ $t("users.third note") }}</li>
                  </ul>
                </div>

                <div
                  class="upload"
                  @click="$store.commit('TOGGLE_IMPORT_USERS_DIALOG')"
                >{{ $t("users.open form import") }}</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import UserHeader from "./UserHeader";
import { mapActions } from "vuex";
import axios from "axios";
import i18n from "../../lang";
export default {
  name: "import-users",
  methods: {
    ...mapActions(["downloadExcelTemplate"]),
    handleDownloadExcelTemplate() {
      this.downloadExcelTemplate({ lang: i18n.locale }).then((response) => {
        var fileURL = window.URL.createObjectURL(new Blob([response.data]));
        var fileLink = document.createElement("a");

        fileLink.href = fileURL;
        fileLink.setAttribute("download", "user_import.xlsx");
        document.body.appendChild(fileLink);

        fileLink.click();
        document.body.removeChild(fileLink);
      });
    },
  },
  components: {
    UserHeader,
  },
};
</script>

<style></style>
