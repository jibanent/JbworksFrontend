<template>
  <div class="dd -cmenuw">
    <em>{{ textProject }}</em>
    <div class="-cmenu -padding -no-icon js-projects xo">
      <div class="-item-filter">
        <input type="text" placeholder="Lọc nhanh" />
      </div>
      <div class="js-all-projects-filter scroll-y">
        <div
          class="-item url"
          :class="{ active: !projectId }"
          @click="handleFilterByProject()"
        >
          Tất cả dự án
        </div>
        <div
          class="-item ap-xdot url"
          :class="{ active: projectId === item.id }"
          v-for="item in projects"
          :key="item.id"
          @click="handleFilterByProject(item.id)"
        >
          {{ item.name }}
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "projects-filter",
  props: {
    projects: { type: Array, default: [] },
    projectId: { type: Number }
  },
  computed: {
    textProject() {
      const project = this.projects.filter(
        project => project.id === this.projectId
      );
      if (project[0]) return project[0].name;
      return "Tất cả dự án";
    }
  },
  methods: {
    handleFilterByProject(projectId) {
      this.$emit("filterTasksByProject", projectId);
    }
  }
};
</script>

<style></style>
