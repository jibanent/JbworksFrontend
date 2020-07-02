<template>
  <div class="task-cta" v-if="task">
    <div
      class="cta url"
      :class="{'-done': task.status.slug==='done'}"
      :style="`background-color: ${task.status.color}`"
    >
      <div class="box url"></div>
      <div
        class="label url with-review ap-inline-tagger-wrap"
        :class="{activated: activated}"
        @click="toggleSelectStatus"
      >
        <div class="lb" style="color: #fff">{{ $t(`tasks.${task.status.slug}`) }}</div>
        <div class="-close full-mask"></div>
        <div
          class="ap-inline-tagger -compact"
          style="top: 48px; left: -1px;"
          v-if="$auth.can('view - assign unassigned tasks')"
        >
          <div class="ap-tagger issingle">
            <div class="api-tags">
              <div
                class="api-tag"
                :class="{'-selected': task.status.slug == 'done'}"
                @click="handleUpdateStatus(2)"
              >
                <div class="square -bg-alt4"></div>
                <div class="api-context">
                  <div class="api-txt">{{ $t('tasks.done') }}</div>
                </div>
              </div>
              <div
                class="api-tag"
                :class="{'-selected': task.status.slug == 'doing'}"
                @click="handleUpdateStatus(1)"
              >
                <div class="square -bg-alt7"></div>
                <div class="api-context">
                  <div class="api-txt">{{ $t('tasks.doing') }}</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="assign url" @click="openTaskAssignmentDialog">
      <div class="avatar avatar-32 -circled">
        <div class="image">
          <img :src="avatar" />
        </div>
      </div>
      <div class="name">{{ task.assigned_to.name }}</div>
      <div class="info">{{ task.assigned_to.position }}</div>
    </div>
  </div>
</template>

<script>
import { getAvatar, message } from "../../../helpers";
import { mapActions } from "vuex";
export default {
  name: "task-detail-action",
  props: {
    task: { type: Object, default: null }
  },
  data() {
    return {
      activated: false
    };
  },
  methods: {
    ...mapActions(["updateTaskStatus"]),
    toggleSelectStatus() {
      this.activated = !this.activated;
    },
    openTaskAssignmentDialog() {
      this.$store.commit("TOGGLE_TASK_ASSIGNMENT_DIALOG");
    },
    handleUpdateStatus(status) {
      this.updateTaskStatus({
        taskId: this.task.id,
        status
      }).then(response => {
        if (!response.error) {
          this.$notify(
            message("success", this.$t("messages.updated successfully"))
          );
        }
      });
    }
  },
  computed: {
    avatar() {
      return getAvatar(this.task.assigned_to.avatar);
    }
  }
};
</script>

<style>
</style>
