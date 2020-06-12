<template>
  <div class="icon -cmenuw" v-if="project">
    <span class="-ap icon-uniF13E"></span>

    <div class="-cmenu">
      <div class="-item -submenu -left">
        <span class="-icon ficon-pencil-square -small"></span>
        Chỉnh sửa
        <div class="submenu">
          <div class="-item url" @click="$store.commit('SET_PROJECT_EDITING', project)">
            <span class="-icon -small ficon-pencil-square"></span> Chỉnh sửa nhanh
          </div>

          <router-link
            class="-item url"
            :to="{
              name: 'project-editing',
              params: {
                id: project.id,
                project: formatProjectName
              }
            }"
            tag="div"
          >
            <span class="-icon -small ficon-cog"></span> Quản lý project
          </router-link>

          <div class="-item-sep"></div>

          <div class="-item url" @click="$store.commit('SET_PROJECT_STATUS_EDITING', project)">
            <span class="-icon ficon-clock-o"></span> Cập nhật trạng thái
          </div>
        </div>
      </div>

      <router-link
        tag="div"
        :to="{
          name: 'project-members',
          params: {
            id: project.id,
            project: formatProjectName
          }
        }"
        class="-item url"
      >
        <span class="-icon ficon-user-circle-o -small"></span> Quản lý thành viên
      </router-link>

      <div class="-item-sep"></div>

      <div class="-item -submenu -left">
        <span class="-icon ficon-xing-square -small"></span>
        Nhập &amp; Xuất
        <div class="submenu">
          <div class="-item url" onclick="Project.option.showPrinter();">
            <span class="-icon ficon-print -small"></span> Bản in project
          </div>

          <div class="-item url" onclick="Project.manage.download(Client.pageData.project);">
            <span class="-ap -icon icon-download"></span> Xuất công việc ra file Excel
          </div>

          <div class="-item url" data-xurl="settings/import">
            <span class="-ap -icon icon-enter"></span> Nhập công việc từ file Excel
          </div>

          <div class="-item url" data-xurl="settings/import/template">
            <span class="-ap -icon icon-cloud-upload3"></span> Nhập dữ liệu mẫu
          </div>

          <div class="-item-sep"></div>

          <div
            class="-item url"
            onclick="Project.manage.downloadCustomFields(Client.pageData.project);"
          >
            <span class="-ap -icon icon-download"></span> Xuất trường dữ liệu tùy chỉnh ra file Excel
          </div>
        </div>
      </div>

      <div class="-item -submenu -left">
        <span class="-icon ficon-cog"></span>
        Các tùy chọn khác
        <div class="submenu">
          <div class="-item" onclick="Project.manage.duplicateProject(Client.pageData.project);">
            <span class="-ap -icon icon-uniF132"></span> Nhân bản project
          </div>

          <div class="-item" onclick="Project.manage.changeMetatype(Client.pageData.project);">
            <span class="-ap -icon icon-uniF156"></span> Chuyển loại project
          </div>

          <div class="-item url" onclick="Project.template.create();">
            <span class="-ap -icon icon-share5"></span>Make a project template
          </div>

          <div class="-item url" onclick="TaskList.manage.reopen();">
            <span class="-ap -icon icon-lock_open"></span> Mở nhóm công việc đã đóng
          </div>

          <div class="-item-sep"></div>

          <div class="-item url" onclick="Project.manage.advancedSetting(Client.pageData.project);">
            <span class="-ap -icon icon-settings"></span> Tùy chỉnh nâng cao (dành cho quản trị hệ
            thống)
          </div>
        </div>
      </div>

      <div class="-item-sep"></div>

      <div class="-item" @click="$store.commit('SET_PROJECT_CLOSING_OR_REOPENING', project)">
        <span class="-ap -icon icon-lock_outline"></span> {{ project.active ? 'Đóng project' : 'Mở lại project' }}
      </div>

      <div class="-item red" @click="showConfirmDeleteProject">
        <span class="-icon ficon-exclamation-circle -small"></span> Xoá project
      </div>
    </div>
  </div>
</template>

<script>
import { removeVietnameseFromString } from "../../../helpers";
export default {
  name: "tasks-by-project-header-side-actions",
  props: {
    project: { type: Object, default: null }
  },
  computed: {
    formatProjectName() {
      return removeVietnameseFromString(this.project.name);
    }
  },
  methods: {
    showConfirmDeleteProject() {
      this.$store.commit("TOGGLE_CONFIRM_DELETE_PROJECT", this.project);
    },
  },
};
</script>

<style>
</style>
