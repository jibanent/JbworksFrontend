<template>
  <div class="sicons" @click="handleToggleMarkStar">
    <div class="icon star url" :class="{'-star': task.mark_star}" :title="$t('tasks.set priority')">
      <span class="-ap icon-uniF186" :class="{'icon-star-full': task.mark_star}"></span>
    </div>
  </div>
</template>

<script>
import { mapActions } from "vuex";
import { message } from "../../helpers";
export default {
  name: "task-item-star",
  props: {
    task: { type: Object, default: null }
  },
  methods: {
    ...mapActions(["toggleMarkStar"]),
    handleToggleMarkStar() {
      const mark_star = !this.task.mark_star;
      const id = this.task.id;
      this.toggleMarkStar({ id, mark_star }).then(response => {
        if (!response.error) {
          this.$notify(
            message("success", this.$t("messages.updated successfully"))
          );
        }
      });
    }
  }
};
</script>

<style>
</style>
