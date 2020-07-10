<template>
  <div class="section">
    <div class="box" style="padding-bottom:0px;">
      <div class="box-title">{{ $t('tasks.my members') }}</div>
    </div>
    <div class="body">
      <div class="items">
        <div class="people">
          <div class="subbox">
            <div class="user url" v-for="member in users.data" :key="member.id">
              <div class="name">
                <div class="main">{{ member.name }}</div>
                <div class="info ap-xdot">{{ member.position }}</div>
              </div>
              <div class="avatar avatar-32 -circled">
                <div class="image">
                  <img :src="avatar(member.avatar)" />
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
import { getAvatar } from "../../helpers";
export default {
  name: "task-side-members",
  props: {
    users: { type: Object, default: {} }
  },
  methods: {
    avatar(url) {
      return getAvatar(url);
    }
  }
};
</script>

<style></style>
