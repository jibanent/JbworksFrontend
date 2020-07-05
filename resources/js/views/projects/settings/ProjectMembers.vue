<template>
  <div id="setting">
    <div id="people-setting">
      <div class="subbox" v-if="project">
        <div class="title">
          <em>{{ $t('projects.project manager') }}</em>
          <div class="actions">
            <div class="dd" @click="openEditProjectManagerDialog">
              <div class="cta">{{ $t('common.change') }}</div>
            </div>
          </div>
        </div>
        <div class="js-body">
          <div class="user">
            <div class="avatar avatar-32 -circled" >
              <div class="image">
                <img :src="avatar"/>
              </div>
            </div>
            <div class="name">
              <div class="main">
                <em class="url username">{{ project.manager.name }}</em>
              </div>
              <div class="info ap-xdot">{{ project.manager.position }}</div>
              <div class="info ap-xdot">{{ project.manager.email }} · {{ project.manager.phone }}</div>
            </div>
            <div class="actions owner">
              <div class="action">
                <span class="ap icon-dots-three-horizontal"></span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="subbox">
        <div class="title">
          <em>{{ $t('users.members') }}</em>
          <div class="actions">
            <div class="dd">
              <div
                class="cta"
                @click="openAddMembersToProjectDialog"
              >{{ $t('common.multi add') }}</div>
            </div>
          </div>
        </div>
        <div class="js-body">
          <project-members-item v-for="member in projectParticipants" :key="member.id" :member="member" :project="project" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import TasksByProjectHeader from "../tasks/TasksByProjectHeader";
import SettingsMenu from "./SettingsMenu";
import ProjectMembersItem from './ProjectMembersItem'
import { mapActions, mapState } from "vuex";
import {getAvatar} from '../../../helpers'

export default {
  name: "project-members",
  created() {
    const projectId = this.$route.params.id;
    this.getProjectById(projectId);
    this.getMyMembers(this.currentUser.id);
  },
  methods: {
    ...mapActions(["getProjectById", "getMyMembers"]),
    openAddMembersToProjectDialog() {
      this.$store.commit("TOGGLE_ADD_MEMBERS_TO_PROJECT_DIALOG", {
        project: this.project
      });
    },
    openEditProjectManagerDialog() {
      this.$store.commit("TOGGLE_EDIT_PROJECT_MANAGER_DIALOG", {
        project: this.project
      });
    }
  },
  computed: {
    ...mapState({
      project: state => state.projects.project,
      projectParticipants: state => state.projects.projectParticipants,
      currentUser: state => state.auth.currentUser,
    }),
    avatar () {
      return getAvatar(this.project.manager.avatar)
    }
  },
  components: {
    TasksByProjectHeader,
    SettingsMenu,
    ProjectMembersItem
  }
};
</script>

<style>
</style>
