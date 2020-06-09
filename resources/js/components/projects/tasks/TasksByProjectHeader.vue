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
        <span class="-close" v-if="!project.active">Closed</span>
        <span class="star"></span>
      </div>
    </div>

    <tasks-by-project-header-side :project="project" />

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
import TasksByProjectHeaderSide from "./TasksByProjectHeaderSide";
export default {
  name: "tasks-by-project-header",
  props: {
    project: { type: Object, default: null }
  },
  computed: {
    formatProjectName() {
      return removeVietnameseFromString(this.project.name);
    }
  },
  components: {
    TasksByProjectHeaderSide
  }
};
</script>

<style>
</style>
