<template>
  <div id="submenu" v-if="project">
    <div class="section">
      <div class="title url" data-url=":collapse:parent">Tùy chỉnh</div>

      <router-link
        :to="{
        name: 'project-editing',
        params: {
          id: project.id,
          project: formatProjectName
        }
      }"
        exactActiveClass="active"
        tag="div"
        class="item url"
      >
        <span class="icon ficon-navicon"></span>
        Chỉnh sửa dự án
      </router-link>

      <div class="item url" data-xurl="settings/members">
        <span class="icon ficon-address-book"></span>Quản
        lý thành viên
      </div>
      <router-link
        :to="{
        name: 'permissions',
        params: {
          id: project.id,
          project: formatProjectName
        }
      }"
        exactActiveClass="active"
        tag="div"
        class="item url"
      >
        <span class="icon ficon-universal-access"></span>
        Phân quyền sử dụng
      </router-link>
      <div class="item url" data-xurl="settings/fields">
        <span class="icon ficon-database"></span>Trường dữ
        liệu tùy chỉnh
      </div>
      <div class="item url" data-xurl="settings/email">
        <span class="icon ficon-envelope"></span>Email thông
        báo
      </div>
      <div class="item url" data-xurl="settings/other">
        <span class="icon ficon-pencil-square"></span>Tùy
        chỉnh hình nền
      </div>
    </div>

    <div class="section">
      <div class="title url" data-url=":collapse:parent">Quick actions</div>

      <div
        class="item url"
        onclick="Project.manage.download(Client.pageData.project);"
        data-blank="1"
      >
        <span class="icon ficon-external-link-square"></span>Xuất công việc ra file Excel
      </div>
      <div class="item url" data-xurl="settings/import">
        <span class="icon ficon-file-excel-o"></span>Nhập
        công việc từ file Excel
      </div>
      <div class="item url" style="display:none" data-xurl="settings/import/trello">
        <span class="icon ap-f14 ficon-trello"></span>Nhập công việc từ Trello
      </div>
      <div class="item url" data-xurl="settings/import/template">
        <span class="icon ficon-folder"></span>Nhập
        dữ liệu mẫu
      </div>
    </div>
  </div>
</template>

<script>
import { removeVietnameseFromString } from "../../../helpers";
export default {
  name: "settings-menu",
  props: {
    project: { type: Object, default: null }
  },
  computed: {
    formatProjectName() {
      return removeVietnameseFromString(this.project.name);
    }
  }
};
</script>

<style>
</style>
