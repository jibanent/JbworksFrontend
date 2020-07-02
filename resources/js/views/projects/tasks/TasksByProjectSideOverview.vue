<template>
  <div class="section js-project-overview" v-if="project">
    <div class="overview">
      <div id="js-project-overview">
        <div class="box projinfo">
          <div class="projname">{{ project.name }}</div>
          <div class="projdesc">
            <span class="icon-desc"></span>
            <span
              class="text-a"
              v-html="project.description ? project.description : $t('projects.no description')"
            ></span>
          </div>
          <div class="row">
            <span class="ficon-check-square-o icon"></span>
            {{ project.stats.completed_ontime + project.stats.completed_late }}/{{ project.stats.total }} {{ $t('tasks.done') }}
            <div class="v -dd url inline">
              <b>{{ percentCompleted }}</b>%
            </div>
          </div>
          <div class="bar -infow">
            <div
              class="c"
              style="background-color: #49E33B"
              :style="`width: ${((project.stats.completed_ontime + project.stats.completed_late)/project.stats.total) * 100}%`"
            ></div>
          </div>
          <div class="row">
            <span class="ficon-bookmark-o icon"></span>
            <div class="v -full">
              <span class="url">
                <span
                  class="none"
                >{{project.start_date ? formatDate(project.start_date) : $t('projects.start date') }}</span>
              </span> -
              <span class="url">
                <span
                  class="none"
                >{{project.finish_date ? formatDate(project.finish_date) : $t('projects.end date') }}</span>
              </span>
            </div>
          </div>
          <div class="row">
            <span class="ficon-folder-o icon"></span>
            {{ $t('departments.departments') }}
            <div class="v -dd url inline">{{ project.department }}</div>
          </div>
        </div>
        <tasks-by-project-side-overview-members
          :project="project"
          :projectParticipants="projectParticipants"
        />

        <div class="subsection">
          <div class="subheader">
            <div class="icon">
              <span class="ficon-circle" :style="`color:${status.text_color}`"></span>
            </div>
            <div class="title -dd url">{{ $t('projects.status') }}</div>
            <div
              class="side url inline"
              :style="`color: ${status.text_color}; background-color: ${status.bg_color}`"
            >{{ $t(`projects.${status.value}`) }}</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import TasksByProjectSideOverviewMembers from "./TasksByProjectSideOverviewMembers";
import moment from "moment";
import { projectStatuses } from "../../../config/status";
import { filterProjectStatus } from "../../../helpers";
import i18n from "../../../lang";
export default {
  name: "tasks-by-project-side-overview",
  props: {
    project: { type: Object, default: null },
    projectParticipants: { type: Array, default: [] }
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
    percentCompleted() {
      return (
        ((this.project.stats.completed_ontime +
          this.project.stats.completed_late) /
          this.project.stats.total) *
        100
      ).toFixed(2);
    }
  },
  methods: {
    formatDate(date) {
      return moment(date)
        .locale(i18n.locale)
        .format("L");
    }
  },
  components: {
    TasksByProjectSideOverviewMembers
  }
};
</script>

<style>
</style>
