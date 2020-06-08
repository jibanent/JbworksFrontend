<template>
  <div class="user" v-if="member">
    <div class="avatar avatar-32 -circled">
      <div class="image">
        <img :src="avatar" />
      </div>
    </div>
    <div class="name">
      <div class="main">
        <em class="url username">{{ member.name }}</em>
      </div>
      <div class="info ap-xdot">{{ member.position }}</div>
      <div class="info ap-xdot">{{ member.email }} · {{ member.phone }}</div>
    </div>
    <div class="actions owner" @click="showProjectMemberActions">
      <div class="action">
        <span class="ap icon-dots-three-horizontal"></span>
      </div>
    </div>
  </div>
</template>

<script>
import { getAvatar } from "../../../helpers";
export default {
  name: "project-members-item",
  props: {
    member: { type: Object, default: null },
    project: { type: Object, default: null }
  },
  computed: {
    avatar() {
      return getAvatar(this.member.avatar);
    }
  },
  methods: {
    showProjectMemberActions(e) {
      const x = e.clientX - 300;
      const y = e.clientY + 10;
      const coordinates = { x, y };
      this.$store.commit("TOGGLE_PROJECT_MEMBER_ACTIONS");
      this.$store.commit("SET_PROJECT_MEMBER_SELECTED", {
        project: this.project,
        member: this.member,
        coordinates
      });
    },
  }
};
</script>

<style>
</style>
