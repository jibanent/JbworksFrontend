<template>
  <div
    id="ie-wrapper-global"
    class="ie-wrapper-global"
    v-if="showTaskAssignmentDialog && task.status.slug !== 'done'"
  >
    <div class="ie-close" @click="closeTaskAssignmentDialog"></div>
    <div class="ie-wrapper scroll-y">
      <div class="ie-close" @click="closeTaskAssignmentDialog"></div>
      <div class="ie-real-wrapper" style="padding-top:198px;padding-left:778.65625px;">
        <div class="ie-close" @click="closeTaskAssignmentDialog"></div>
        <div class="ie-real">
          <div class="ie-body ap-inline-tagger-wrap unselectable activated">
            <div class="-close full-mask"></div>
            <div class="ap-inline-tagger" style="top: -20px;">
              <div class="ap-tagger issingle">
                <div class="api-title">{{ $t('tasks.assign to') }}</div>
                <div class="api-sb">
                  <input type="text" :placeholder="$t('common.type to search')" />
                </div>
                <div class="api-users">
                  <task-assignment-dialog-item
                    v-for="item in myMembers.data"
                    :key="item.id"
                    :user="item"
                    :task="task"
                  />
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
import TaskAssignmentDialogItem from "./TaskAssignmentDialogItem";
export default {
  name: "task-assignment-dialog",
  props: {
    myMembers: { type: Object, default: {} },
    task: { type: Object, default: null }
  },
  computed: {
    showTaskAssignmentDialog: {
      get() {
        return this.$store.state.tasks.showTaskAssignmentDialog;
      }
    }
  },
  methods: {
    closeTaskAssignmentDialog() {
      this.$store.commit("TOGGLE_TASK_ASSIGNMENT_DIALOG");
    }
  },
  components: {
    TaskAssignmentDialogItem
  }
};
</script>

<style>
.ie-wrapper-global {
  z-index: 999 !important;
}
</style>
