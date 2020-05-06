<template>
  <div id="header" class="with-menu">
    <div class="nav">
      <span class="icon"></span>
    </div>

    <div class="title">
      <div class="icon -bg-alt1">
        <span class="-ap icon-xing"></span>
      </div>
      <div class="name" v-if="project">
        <span class="url ap-xdot">{{ project.name }}</span>
        <span class="star"></span>
      </div>
    </div>

    <div class="side">
      <div class="search">
        <div class="input">
          <input type="text" placeholder="Tìm nhanh công việc" class="__autoc __autoresized" />
        </div>
        <div class="close">
          <span class="-ap icon-uniF108"></span>
        </div>
      </div>

      <div class="icon -cmenuw">
        <span class="-ap icon-uniF13E"></span>

        <div class="-cmenu">
          <div class="-item -submenu -left">
            <span class="-icon ficon-pencil-square -small"></span>
            Chỉnh sửa
            <div class="submenu">
              <div class="-item url">
                <span class="-icon -small ficon-pencil-square"></span> Chỉnh sửa nhanh
              </div>

              <div class="-item url" data-xurl="settings">
                <span class="-icon -small ficon-cog"></span> Quản lý project
              </div>

              <div class="-item-sep"></div>

              <div class="-item url" data-url="paction/112901/tags">
                <span class="-icon -small ficon-tags"></span> Chỉnh sửa danh sách nhãn
              </div>

              <div class="-item url" data-xurl="settings/other">
                <span class="-small -icon ficon-photo"></span> Tùy chỉnh hình nền
              </div>

              <div class="-item-sep"></div>

              <div class="-item url" data-url="paction/112901/status">
                <span class="-icon ficon-clock-o"></span> Cập nhật trạng thái
              </div>
            </div>
          </div>

          <div class="-item url" data-xurl="settings/members">
            <span class="-icon ficon-user-circle-o -small"></span> Quản lý thành viên
          </div>

          <div class="-item-sep"></div>

          <div class="-item url" onclick="Project.webhook.init();">
            <span class="-icon ficon-share-alt-square -small"></span>Quản lý webhooks
          </div>

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
              <div
                class="-item"
                onclick="Project.manage.duplicateProject(Client.pageData.project);"
              >
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

              <div
                class="-item url"
                onclick="Project.manage.advancedSetting(Client.pageData.project);"
              >
                <span class="-ap -icon icon-settings"></span> Tùy chỉnh nâng cao (dành cho quản trị hệ
                thống)
              </div>
            </div>
          </div>

          <div class="-item-sep"></div>

          <div class="-item" onclick="Project.manage.closeProject(Client.pageData.project);">
            <span class="-ap -icon icon-lock_outline"></span> Đóng project
          </div>

          <div class="-item red" onclick="Project.manage.removeProject(Client.pageData.project);">
            <span class="-icon ficon-exclamation-circle -small"></span> Xoá project
          </div>
        </div>
      </div>
    </div>

    <div class="main" v-if="project">
      <div class="tabs">
        <router-link
          :to="{
          name: 'tasks-by-project',
          params: {
          id: project.id,
          project: formatProjectName,
        },
        }"
          exactActiveClass="active"
          tag="div"
          class="tab url"
        >
          <span class="tab-label">Công việc</span>
        </router-link>

        <div class="tab url">
          <span class="-ap icon-forum icn" title="Thảo luận"></span>
          <span class="tab-label">Thảo luận</span> (
          <span class="counter">0</span>)
        </div>
        <div class="tab url">
          <span class="tab-label">Tài liệu</span> (
          <span class="counter">0</span>)
        </div>
        <div class="tab url">
          <span class="tab-label">Hoạt động</span>
        </div>
        <div class="tab url">
          <span class="tab-label">Báo cáo</span>
        </div>

        <router-link
          :to="{
          name: 'project-editing',
          params: {
          id: project.id,
          project: formatProjectName,
        },
        }"
          exactActiveClass="active"
          tag="div"
          class="tab url"
        >
          <span class="tab-label">Tùy chỉnh</span>
        </router-link>
      </div>
    </div>
  </div>
</template>

<script>
import { removeVietnameseFromString } from "../../../helpers";
export default {
  name: "tasks-by-project-header",
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
