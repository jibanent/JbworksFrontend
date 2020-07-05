<template>
  <div class="icon -cmenuw" v-if="project">
    <span class="-ap icon-uniF13E"></span>

    <div class="-cmenu">
      <div class="-item -submenu -left">
        <span class="-icon ficon-pencil-square -small"></span>
        {{ $t('common.edit') }}
        <div class="submenu">
          <div class="-item url" @click="$store.commit('SET_PROJECT_EDITING', project)">
            <span class="-icon -small ficon-pencil-square"></span> {{ $t('projects.quick edit') }}
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
            <span class="-icon -small ficon-cog"></span> {{ $t('projects.project manager') }}
          </router-link>

          <div class="-item-sep"></div>

          <div class="-item url" @click="$store.commit('SET_PROJECT_STATUS_EDITING', project)">
            <span class="-icon ficon-clock-o"></span> {{ $t('projects.update status') }}
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
        <span class="-icon ficon-user-circle-o -small"></span> {{ $t('users.manage members') }}
      </router-link>

      <div class="-item-sep"></div>

      <div class="-item" @click="$store.commit('SET_PROJECT_CLOSING_OR_REOPENING', project)">
        <span class="-ap -icon icon-lock_outline"></span> {{ project.active ? $t('projects.close project') : $t('projects.reopen project')}}
      </div>

      <div class="-item red" @click="showConfirmDeleteProject">
        <span class="-icon ficon-exclamation-circle -small"></span> {{ $t('projects.delete project') }}
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
