<template>
  <div class="desc">
    <div class="review-status" :style="`background-color: ${task.status.color}`">
      <span>{{ $t(`tasks.${task.status.slug}`) }}</span>
    </div>
    <div class="content">
      <div class="ap-xdot">
        <div class="labels">
          <span class="label x-hl js-tag url" v-if="task.is_important">{{ $t('tasks.important') }}</span>
          <span class="label x-error js-tag url" v-if="task.is_urgent">{{ $t('tasks.urgent') }}</span>
          <span
            class="label std x-error"
            v-if="task.is_overdue && !task.late_completed"
          >{{ $t('tasks.overdue') }}</span>
          <span class="label std x-overdue" v-if="task.late_completed">{{ $t('tasks.done late') }}</span>
          <span class="label std" v-if="task.start_date">
            <span class="ficon-caret-right"></span>
            {{ $t('tasks.started at', { date: formatDate }) }}
          </span>
        </div>
        <span class="inner">{{ $t('tasks.created by', {name: task.created_by.name}) }}</span>
      </div>
    </div>
  </div>
</template>

<script>
import moment from "moment";
import i18n from "../../lang";
export default {
  name: "task-item-description",
  props: {
    task: { type: Object, default: null }
  },
  computed: {
    formatDate() {
      return moment(this.task.start_date)
        .locale(i18n.locale)
        .format("L");
    }
  },
  methods: {}
};
</script>

<style scoped>
.review-status {
  border-radius: 12px;
  color: #fff !important;
}
</style>
