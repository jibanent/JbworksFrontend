<template>
  <div class="task-main" v-if="task">
    <div class="edit-box compact edit-task-name" :class="{ editing: isEditing }">
      <div class="edit-display" @click="isEditing = true">
        <h1>{{ task.name }}</h1>
      </div>
      <div class="edit-form">
        <form @submit.prevent="handleUpdateTaskName">
          <div class="row">
            <textarea
              class="-big __ap_enter_binded"
              v-model="name"
              @keyup.enter="handleUpdateTaskName"
            ></textarea>
          </div>
          <div class="edit-ctas clear-fix">
            <button type="submit" class="btn btn- save url">{{ $t('common.save') }}</button>
            <div class="cancel url" @click="hideEditTaskName">{{ $t('common.cancel') }}</div>
            <div class="note">
              {{ $t('common.press enter to save') }} ·
              <b
                class="url"
                @click="hideEditTaskName"
              >{{ $t('common.cancel') }}</b>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="desc">
      <span
        class="ficon-circle anim-showhide-inf"
        :style="`color: ${task.status.color}`"
        v-if="task.status.slug === 'doing'"
      ></span>
      <span
        class="ficon-check-circle text-success"
        :style="`color: ${task.status.color}`"
        v-if="task.status.slug === 'done'"
      ></span>
      <span :style="`color: ${task.status.color}`">&nbsp; {{ $t(`tasks.${task.status.slug}`) }}</span>
      <router-link
        class="url url-detail"
        tag="span"
        :to="{
        name: 'tasks-by-project',
        params: {
          id: task.project.id,
          project: formatProjectName,
        }
      }"
      >{{ task.project.name }}</router-link>
    </div>
    <div class="desc">
      <span class="-ap icon-uniF10B"></span>&nbsp;
      <div class="deadline">
        <div class="url" @click="showEditTaskStartTime">
          {{ $t('tasks.start date') }}:
          <em
            v-if="task.start_date"
          >{{ formatDateTime(task.start_date) }}</em>
          <em v-else>{{ $t('tasks.set start time') }}</em>
        </div>
        <span class="inline">
          &nbsp;
          <span class="-ap icon-arrow-right"></span> &nbsp;
        </span>
        <div class="deadline-display inline" @click="showEditTaskDeadline">
          {{ $t('tasks.deadline') }}:
          <em v-if="task.due_on">{{ formatDateTime(task.due_on) }}</em>
          <em v-else>{{ $t('tasks.set deadline') }}</em>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import moment from "moment";
import { mapActions } from "vuex";
import { removeVietnameseFromString } from "../../../helpers";
import i18n from "../../../lang";
export default {
  name: "task-detail-main",
  props: {
    task: { type: Object, default: null }
  },
  data() {
    return {
      isEditing: false,
      name: "",
      id: null
    };
  },
  watch: {
    task(task) {
      this.name = task.name;
      this.id = task.id;
    }
  },
  computed: {
    formatProjectName() {
      return removeVietnameseFromString(this.task.project.name);
    }
  },
  methods: {
    ...mapActions(["updateTaskName"]),
    formatDateTime(time) {
      if (time)
        return moment(time)
          .locale(i18n.locale)
          .format("HH:mm L");
    },
    hideEditTaskName() {
      this.isEditing = false;
      this.name = this.task.name;
    },
    handleUpdateTaskName() {
      const { name, id } = this;
      this.updateTaskName({ name, id }).then(response => {
        if (!response.error) {
          this.hideEditTaskName();
          this.$notify(
            message("success", this.$t("messages.updated successfully"))
          );
        }
      });
    },
    showEditTaskDeadline(e) {
      if (this.$auth.can("edit start date and deadline")) {
        const x = e.clientX;
        const y = e.clientY;
        this.$store.commit("TOGGLE_EDIT_TASK_DEADLINE");
        this.$store.commit("SET_COORDINATES_SHOW_EDIT_TASK_DEADLINE", { x, y });
        this.$store.commit("SET_TASK_EDITING", this.task);
      }
    },
    showEditTaskStartTime(e) {
      if (this.$auth.can("edit start date and deadline")) {
        const x = e.clientX;
        const y = e.clientY;
        this.$store.commit("TOGGLE_EDIT_TASK_START_TIME");
        this.$store.commit("SET_COORDINATES_SHOW_EDIT_TASK_START_TIME", {
          x,
          y
        });
        this.$store.commit("SET_TASK_EDITING", this.task);
      }
    }
  }
};
</script>

<style scoped>
.edit-ctas .btn {
  border: none;
}
</style>
