<template>
  <div id="header" class="with-menu">
    <navbar />

    <div class="title">
      <div class="icon -bg-alt1">
        <span class="-ap icon-xing"></span>
      </div>
      <div class="name" v-if="project">
        <span class="url ap-xdot">{{ project.name }}</span>
        <span class="-close" v-if="!project.active">{{ $t('projects.closed') }}</span>
        <span class="star"></span>
      </div>
    </div>

    <tasks-by-project-header-side
      :project="project"
      @searchTasks="handleSearchTasks"
    />

    <div class="main" v-if="project">
      <div class="tabs">
        <router-link
          :to="{
            name: 'tasks-by-project',
            params: {
              id: project.id,
              project: formatProjectName
            }
          }"
          exactActiveClass="active"
          tag="div"
          class="tab url"
        >
          <span class="tab-label">{{ $t('tasks.tasks') }}</span>
        </router-link>
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
          class="tab url"
        >
          <span class="tab-label">{{ $t('projects.setting') }}</span>
        </router-link>
      </div>
    </div>
  </div>
</template>

<script>
import { removeVietnameseFromString } from "../../../helpers";
import TasksByProjectHeaderSide from "./TasksByProjectHeaderSide";
import Navbar from '../../../layout/components/Navbar'
export default {
  name: "tasks-by-project-header",
  props: {
    project: { type: Object, default: null },
    params: { type: Object, default: null }
  },
  computed: {
    formatProjectName() {
      return removeVietnameseFromString(this.project.name);
    }
  },
  components: {
    TasksByProjectHeaderSide,
    Navbar
  },
  methods: {
    handleSearchTasks(search) {
      const { start, end, status, order } = this.params;
      this.$emit("searchTasks", { search, start, end, status, order });
    }
  }
};
</script>

<style></style>
