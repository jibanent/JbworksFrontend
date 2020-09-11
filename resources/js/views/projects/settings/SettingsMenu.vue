<template>
  <div id="submenu" v-if="project">
    <div class="section">
      <div class="title url">{{ $t('projects.setting') }}</div>

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
        {{ $t('projects.edit project') }}
      </router-link>

      <router-link
        tag="div"
        :to="{
          name: 'project-members',
          params: {
            id: project.id,
            project: formatProjectName
          }
        }"
        exactActiveClass="active"
        class="item url"
      >
        <span class="icon ficon-address-book"></span>
        {{ $t('users.manage members') }}
      </router-link>
      <router-link
        v-if="$auth.isAdmin() || $auth.isLeader()"
        :to="{
        name: 'access-control-list',
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
        {{ $t('users.permission by roles') }}
      </router-link>
    </div>
    <div class="section">
      <div class="title url" data-url=":collapse:parent">Quick actions</div>
      <router-link
        :to="{
        name: 'import-tasks',
        params: {
          id: project.id,
          project: formatProjectName
        }
      }"
        exactActiveClass="active"
        tag="div"
        class="item url"
      >
        <span class="icon ficon-file-excel-o"></span>Nhập CV từ file Excel
      </router-link>
    </div>
  </div>
</template>

<script>
import { removeVietnameseFromString } from "../../../helpers";
export default {
  name: "settings-menu",
  props: {
    project: { type: Object, default: null },
  },
  computed: {
    formatProjectName() {
      return removeVietnameseFromString(this.project.name);
    },
  },
};
</script>

<style>
</style>
