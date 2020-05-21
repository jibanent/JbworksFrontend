<template>
  <div id="subheader">
    <div id="js-project-header">
      <div class="task-user-add">
        <div class="avatar" v-if="$auth.can('create new task')">
          <img :src="avatar" />
        </div>
        <div class="icon" v-if="$auth.can('create new task')">
          <span class="-ap icon-plus2"></span>
        </div>
        <div class="mask url"></div>
        <div class="txt" v-if="$auth.can('create new task')">
          <span class="action" @click="openAddTaskDialog">Tạo công việc</span>
        </div>
      </div>
    </div>

    <div class="menu"></div>

    <div class="side">
      <div id="project-filters">
        <div
          class="range pointer"
          id="js-header-startdate"
          title="Lọc công việc theo ngày tạo, mặc định lấy từ ngày tạo dự án tới ngày hiện tại"
        >
          <span class="js-clickable">
            Ngày tạo
            <span class="-ap icon-chevron-down2"></span>
          </span>
        </div>

        <div class="filter" id="js-canvas-filter">
          Filter:
          <em>Tất cả</em>

          <div class="dd">
            <div class="li selected" data-label="Tất cả" data-filter="all">
              Tất cả
            </div>
            <div class="li" data-label="Giao cho tôi" data-filter="mine">
              Giao cho tôi
            </div>
            <div class="li" data-label="Active" data-filter="active">
              Đang thực hiện (Phải làm &amp; Đang làm)
            </div>

            <div class="li" data-label="Todo" data-filter="todo">Phải làm</div>
            <div class="li" data-label="Doing" data-filter="doing">
              Đang làm
            </div>
            <div class="li" data-label="Đã xong" data-filter="done">
              Đã xong
            </div>
            <div class="li" data-label="Đang đánh giá" data-filter="review">
              Đang đánh giá
            </div>

            <div class="li-sep"></div>

            <div class="li" data-label="Quá hạn" data-filter="overdue">
              Quá hạn
            </div>
            <div class="li" data-label="HT muộn" data-filter="donelate">
              HT muộn
            </div>

            <div class="li" data-label="Đánh dấu sao" data-filter="starred">
              Đánh dấu sao
            </div>
            <div class="li" data-label="Khẩn cấp" data-filter="urgent">
              Khẩn cấp
            </div>
            <div class="li" data-label="Quan trọng" data-filter="important">
              Quan trọng
            </div>
          </div>
        </div>

        <div class="filter autohide" id="js-view-pref">
          Tùy chọn hiển thị &nbsp;
          <em></em>

          <div class="dd">
            <div class="select">
              <span class="label">Công việc con:</span>
              <select name="subtask_display" id="js-project-view-subtasks">
                <option value="natural">Một cấp công việc con</option>
                <option value="nested">Nhiều cấp công việc con</option>
                <option value="none">Không hiển thị</option>
              </select>
            </div>

            <div class="select">
              <span class="label">Sắp xếp:</span>

              <select name="df_sort" id="df_sort">
                <option value="default">Thứ tự tự nhiên</option>
                <option value="id">Thời gian tạo</option>
                <option value="deadline">Thời hạn ( giảm dần)</option>
                <option value="deadline_reversed">Thời hạn (tăng dần)</option>
                <option value="update_time">Thời gian cập nhật</option>
                <option value="complete_time">Thời gian hoàn thành</option>
                <option value="alpha">Theo bảng chữ cái</option>
                <option value="urgent">Việc khẩn cấp</option>
              </select>
            </div>

            <div class="select">
              <span class="label">Nhóm bởi:</span>
              <select name="mastergroup_pref" id="js-mastergroup_pref">
                <option value="tasklist">Nhóm công việc</option>
                <option value="milestone">Mục tiêu</option>
                <option value="people">Thành viên</option>
              </select>
            </div>

            <div class="checkbox checked" id="df-group-done">
              <div class="check"></div>
              <div class="label">Nhóm công việc đã hoàn thành</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { getAvatar } from "../../../helpers";
export default {
  name: "task-by-project-filter",
  props: {
    currentUser: { type: Object, default: null }
  },
  computed: {
    avatar() {
      return getAvatar(this.currentUser.avatar);
    }
  },
  methods: {
    openAddTaskDialog(){
      this.$store.commit('TOGGLE_ADD_TASK_DIALOG')
    }
  }
};
</script>

<style></style>
