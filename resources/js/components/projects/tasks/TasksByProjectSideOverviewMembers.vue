<template>
  <div class="subsection" :class="{active: isShowMembers}">
    <div class="subheader" @click="isShowMembers = !isShowMembers">
      <div class="icon">
        <div class="icon-desc -left" style="width:12px; margin-top:4px;"></div>
      </div>
      <div class="title -dd url">{{ projectParticipants.length }} thành viên</div>
      <div class="users">
        <project-participants
          v-for="item in projectParticipants"
          :key="item.id"
          :participant="item"
        />
      </div>
    </div>
    <div class="body">
      <div id="js-project-people" class="people">
        <div class="subbox" id="js-sidebox-owners">
          <div class="title">
            <em>Quản lý dự án</em>
            <div class="actions">
              <div class="dd">
                <div
                  class="cta"
                  onclick="Project.people.side.addMulti('owner', Client.pageData.context);"
                >Thêm nhiều</div>
              </div>
            </div>
          </div>
          <div class="js-body">
            <div class="user">
              <div class="avatar avatar-32 -circled">
                <div class="image">
                  <img :src="avatar(project.manager.avatar)" />
                </div>
              </div>
              <div class="name">
                <div class="main">
                  <em class="url username">{{ project.manager.name }}</em>
                </div>
                <div class="info ap-xdot">{{ project.manager.position }}</div>
                <div class="info ap-xdot">{{ project.manager.email }}</div>
              </div>
              <div class="actions owner" onclick="Project.people.context(this, 'thuytrang');">
                <div class="action">
                  <span class="ap icon-dots-three-horizontal"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="subbox" id="js-sidebox-members">
          <div class="title">
            <em>Thành viên</em>
            <div class="actions" @click="openAddMembersToProjectDialog">
              <div class="dd">
                <div class="cta">Thêm nhiều</div>
              </div>
            </div>
          </div>
          <div class="js-body">
            <div class="user" v-for="member in projectParticipants" :key="member.id">
              <div class="avatar avatar-32 -circled">
                <div class="image">
                  <img :src="avatar(member.avatar)" />
                </div>
              </div>
              <div class="name">
                <div class="main">
                  <em class="url username">{{ member.name }}</em>
                </div>
                <div class="info ap-xdot">{{ member.position }}</div>
                <div class="info ap-xdot">{{ member.email }}</div>
              </div>
              <div class="actions owner" @click="showProjectMemberActions($event, member)">
                <div class="action">
                  <span class="ap icon-dots-three-horizontal"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import ProjectParticipants from "../ProjectParticipants";
import { getAvatar } from "../../../helpers";
export default {
  name: "tasks-by-project-side-overview-members",
  props: {
    project: { type: Object, default: null },
    projectParticipants: { type: Array, default: [] }
  },
  data() {
    return {
      isShowMembers: false
    };
  },
  methods: {
    avatar(url) {
      return getAvatar(url);
    },
    showProjectMemberActions(e, member) {
      const x = e.clientX - 300;
      const y = e.clientY + 10;
      const coordinates = { x, y };
      this.$store.commit("TOGGLE_PROJECT_MEMBER_ACTIONS");
      this.$store.commit("SET_PROJECT_MEMBER_SELECTED", {
        project: this.project,
        member,
        coordinates
      });
    },
    openAddMembersToProjectDialog() {
      this.$store.commit("TOGGLE_ADD_MEMBERS_TO_PROJECT", {
        project: this.project
      });
    }
  },
  components: {
    ProjectParticipants
  }
};
</script>

<style>
</style>
