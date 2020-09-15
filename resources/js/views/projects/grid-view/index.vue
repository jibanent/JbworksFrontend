<template>
  <div class="projects" style="display: block;" v-if="projects">
    <project-item v-for="project in projects.data" :key="project.id" :project="project"/>
  </div>
</template>

<script>
import ProjectItem from './ProjectItem'
export default {
  name: "grid-view",
  props: {
    projects: { type: Object, default: null },
  },
  computed: {

  },
  components: {
    ProjectItem
  }
};
</script>

<style>
</style>
