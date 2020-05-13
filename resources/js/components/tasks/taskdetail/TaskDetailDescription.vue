<template>
  <div class="task-desc" v-if="task">
    <div class="actions">
      <div class="action js-edit">Chỉnh sửa</div>
    </div>
    <div class="title">Miêu tả công việc</div>
    <div class="edit-box js-task-content">
      <div class="edit-display">
        <div class="desc acl-1">
          <div class="icon-desc -right"></div>
          <div class="no-content" v-if="task.description" v-html="task.description"></div>
          <div class="no-content" v-else>Chưa có mô tả cho công việc này</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "task-detail-description",
  props: {
    task: { type: Object, default: null }
  },
};
</script>

<style>
</style>
