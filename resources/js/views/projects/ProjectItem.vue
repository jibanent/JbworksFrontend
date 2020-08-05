<template>
  <tr class="li js-project">
    <td>
      <div class="rx ui-sortable-handle"></div>
    </td>
    <td>
      <div class="icon" title="Completed: 5.0%">
        <div lass="js-complete-sektor" style="width:20px; height:20px">
          <svg class="Sektor" viewBox="0 0 100 100">
            <circle
              class="Sektor-circle"
              stroke-width="0"
              fill="#e5e5e5"
              stroke="#e5e5e5"
              cx="50"
              cy="50"
              r="50"
            />
          </svg>
        </div>
      </div>
      <router-link
        tag="div"
        :to="{
        name: 'tasks-by-project',
        params: {
          id: project.id,
          project: formatProjectName,
        }
      }"
        class="title url"
      >{{ project.name }}</router-link>
      <div class="info" style="height:13px;">
        <div
          class="absolute ap-xdot"
        >{{ $t('projects.updated from now', {fromNow: formatUpdatedAt}) }}</div>
      </div>
    </td>
    <td>
      <div class="relative">
        <div class="absolute ap-xdot">
          <div class="dept">
            <span class="a normal std url">{{ project.department }}</span>
          </div>
        </div>
      </div>
    </td>
    <td>
      <div class="users clear-fix">
        <project-participants
          v-for="item in project.participants"
          :key="item.id"
          :participant="item"
        />
      </div>
    </td>
    <td>
      <div class="bar">
        <div class="stats">
          <b>{{ $t('tasks.number done', {number: project.stats.completed_ontime + project.stats.completed_late + '/' + project.stats.total}) }}</b>
          <span class="right">
            <b>{{ $t('tasks.number overdue', {number: project.stats.overdue})}}</b>
          </span>
        </div>
        <div class="complete" :style="`width:${completedWidth}%; background-color:#EB6450`"></div>
      </div>
    </td>
    <td>
      <div class="status -0">
        <div
          class="stage"
          :class="activeClass"
        >{{ project.active ? $t('projects.active') : $t('projects.closed') }}</div>
      </div>
    </td>
    <td>
      <div class="status" v-if="status">
        <div
          class="stage -edge"
          :style="`color: ${status.text_color}; background-color: ${status.bg_color}`"
        >{{ $t(`projects.${status.value}`) }}</div>
      </div>
    </td>
    <td>
      <div class="edit-dd -cmenuw">
        {{ $t('projects.option') }}
        <span class="-ap icon-triangle-down"></span>
        <div class="-cmenu -no-icon -padding w200">
          <router-link
            tag="div"
            :to="{
              name: 'tasks-by-project',
              params: {
                id: project.id,
                project: formatProjectName,
              }
            }"
            class="-item url"
          >{{ $t('projects.view detail') }}</router-link>
          <div class="-item url" @click="openNewTab">{{ $t('projects.open in new tab') }}</div>
          <div class="-item-sep"></div>
          <div
            class="-item url"
            @click="$store.commit('SET_PROJECT_EDITING', project)"
          >{{ $t('projects.quick edit') }}</div>
          <div
            class="-item url"
            @click="$store.commit('SET_PROJECT_STATUS_EDITING', project)"
          >{{ $t('projects.update status') }}</div>
          <router-link
            :to="{
              name: 'project-editing',
              params: {
                id: project.id,
                project: formatProjectName
              }
            }"
            tag="div"
            class="-item url"
          >{{ $t('projects.setting') }}</router-link>
        </div>
      </div>
    </td>
  </tr>
</template>

<script>
import moment from "moment";
import ProjectParticipants from "./ProjectParticipants";
import { removeVietnameseFromString } from "../../helpers";
import { projectStatuses } from "../../config/status";
import { filterProjectStatus } from "../../helpers";
import i18n from "../../lang";
export default {
  name: "project-item",
  props: {
    project: { type: Object, default: null },
  },
  computed: {
    status() {
      const openStatusesConfig = projectStatuses.open;
      const openStatus = this.project.open_status;
      const closeStatusesConfig = projectStatuses.close;
      const closeStatus = this.project.close_status;
      if (this.project.active) {
        return filterProjectStatus(openStatusesConfig, openStatus);
      } else {
        if (this.project.close_status !== null) {
          return filterProjectStatus(closeStatusesConfig, closeStatus);
        } else {
          return filterProjectStatus(openStatusesConfig, openStatus);
        }
      }
    },
    completedWidth() {
      return (
        ((this.project.stats.completed_ontime +
          this.project.stats.completed_late) /
          this.project.stats.total) *
        100
      );
    },
    formatUpdatedAt() {
      return moment(this.project.updated_at).locale(i18n.locale).fromNow();
    },
    activeClass() {
      return this.project.active ? "-bg-success" : "-bg-error";
    },
    description() {
      return this.project.description
        ? this.project.description
        : "Chưa có mô tả";
    },
    formatProjectName() {
      return removeVietnameseFromString(this.project.name);
    },
  },
  methods: {
    openNewTab() {
      let routeData = this.$router.resolve({
        name: "tasks-by-project",
        params: {
          id: this.project.id,
          project: this.formatProjectName,
        },
      });
      window.open(routeData.href, "_blank");
    },
  },
  components: {
    ProjectParticipants,
  },
};
</script>

<style>
</style>
