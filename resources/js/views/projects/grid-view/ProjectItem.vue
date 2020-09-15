<template>
  <div class="item js-project">
    <div class="w">
      <div class="istats">2/21</div>
      <router-link
        tag="div"
        :to="{
        name: 'tasks-by-project',
        params: {
          id: project.id,
          project: formatProjectName,
        } }"
        class="title url ap-xdot"
      >{{ project.name }}</router-link>
      <div class="info">{{ $t('projects.updated from now', {fromNow: formatUpdatedAt}) }}</div>
      <div class="users clear-fix">
        <project-participants
          v-for="item in project.participants"
          :key="item.id"
          :participant="item"
          class="avatar-32"
        />
      </div>
      <div class="bar">
        <div class="stats">
          <b>{{ $t('tasks.number done', {number: project.stats.completed_ontime + project.stats.completed_late + '/' + project.stats.total}) }}</b>

          <span class="right">
            <b>{{ $t('tasks.number overdue', {number: project.stats.overdue})}}</b>
          </span>
        </div>
        <div class="complete" :style="`width:${completedWidth}%; background-color:#EB6450`"></div>
      </div>
    </div>
  </div>
</template>

<script>
import moment from "moment";
import i18n from "../../../lang";
import { removeVietnameseFromString } from "../../../helpers";
import ProjectParticipants from "../ProjectParticipants";
export default {
  name: "project-item",
  props: {
    project: { type: Object, default: null },
  },
  computed: {
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
    formatProjectName() {
      return removeVietnameseFromString(this.project.name);
    },
  },
  components: { ProjectParticipants },
};
</script>

<style>
</style>
