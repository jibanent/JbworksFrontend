<template>
  <div class="side">
    <div class="search">
      <div class="input">
        <input
          placeholder="Tìm kiếm công việc"
          :value="params.search"
          @keyup.enter="callHandleTasksFilter"
        />
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions } from "vuex";
export default {
  name: "task-search",
  props: {
    currentUser: { type: Object, default: null },
    params: { type: Object, default: null }
  },
  methods: {
    ...mapActions(["getTasks"]),
    callHandleTasksFilter(e) {
      const { status, project, order } = this.params;
      if (e.target.value)
        this.$emit("callHandleTasksFilterEvent", {
          search: e.target.value,
          status,
          project,
          order
        });
      else
        this.$emit("callHandleTasksFilterEvent", {
          search: null,
          status,
          project,
          order
        });
    }
  }
};
</script>

<style></style>
