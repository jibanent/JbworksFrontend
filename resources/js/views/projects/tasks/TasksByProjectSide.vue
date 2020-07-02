<template>
  <div id="project-side-canvas">
    <div id="project-side">
      <tasks-by-project-side-overview :project="project" :projectParticipants="projectParticipants" />
      <tasks-by-project-side-stats :project="project" />
    </div>
  </div>
</template>

<script>
import TasksByProjectSideOverview from "./TasksByProjectSideOverview";
import TasksByProjectSideStats from "./TasksByProjectSideStats";
export default {
  name: "tasks-by-project-side",
  props: {
    project: { type: Object, default: null },
    projectParticipants: { type: Array, default: [] }
  },
  components: {
    TasksByProjectSideOverview,
    TasksByProjectSideStats
  }
};
</script>

<style>
</style>
