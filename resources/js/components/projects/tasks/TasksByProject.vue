<template>
  <div id="project-master" class="scroll-y forced-scroll">
    <div class="relative">
      <tasks-by-project-side :project="project" />

      <div id="project-canvas">
        <tasks-by-project-header :project="project" />

        <div class="project-app">
          <div class="project project-board" id="board">
            <div id="subheader">
              <div id="js-project-header">
                <div class="task-user-add">
                  <div class="avatar">
                    <img
                      src="https://data-gcdn.basecdn.net/avatar/sys121/64/6b/1c/8b/f4/c406e7dca53bc27a0676e22ecf912de3/0.thuytrang_121.jpg"
                    />
                  </div>
                  <div class="icon">
                    <span class="-ap icon-plus2"></span>
                  </div>
                  <div class="mask url" onclick="Project.tform.dialog();"></div>
                  <div class="txt">
                    <span class="action" onclick="Project.tform.dialog();">Tạo công việc</span>
                    hoặc
                    <span
                      class="action"
                      onclick="TaskList.create()"
                    >Tạo nhóm công việc mới</span>
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
                      <div class="li selected" data-label="Tất cả" data-filter="all">Tất cả</div>
                      <div class="li" data-label="Giao cho tôi" data-filter="mine">Giao cho tôi</div>
                      <div class="li" data-label="Active" data-filter="active">
                        Đang thực hiện (Phải làm &amp;
                        Đang làm)
                      </div>

                      <div class="li" data-label="Todo" data-filter="todo">Phải làm</div>
                      <div class="li" data-label="Doing" data-filter="doing">Đang làm</div>
                      <div class="li" data-label="Đã xong" data-filter="done">Đã xong</div>
                      <div class="li" data-label="Đang đánh giá" data-filter="review">Đang đánh giá</div>

                      <div class="li-sep"></div>

                      <div class="li" data-label="Quá hạn" data-filter="overdue">Quá hạn</div>
                      <div class="li" data-label="HT muộn" data-filter="donelate">HT muộn</div>

                      <div class="li" data-label="Đánh dấu sao" data-filter="starred">Đánh dấu sao</div>
                      <div class="li" data-label="Khẩn cấp" data-filter="urgent">Khẩn cấp</div>
                      <div class="li" data-label="Quan trọng" data-filter="important">Quan trọng</div>
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
            <div id="tasklists" class="filter-all">
              <div class="tasklist js-group -sf ui-droppable">
                <div class="js-tasklist-tasks">
                  <div class="js-list-section -done list tasks ui-sortable">
                    <task-item v-for="task in tasksByProject" :key="task.index" :task="task" />
                  </div>
                </div>
              </div>
            </div>&nbsp;
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions, mapState } from "vuex";
import TasksByProjectSide from "./TasksByProjectSide";
import TasksByProjectHeader from './TasksByProjectHeader'
import TaskItem from "../../tasks/TaskItem";
export default {
  name: "tasks-by-project",
  created() {
    const projectId = this.$route.params.id;
    this.getTasksByProject(projectId);
  },
  methods: {
    ...mapActions(["getTasksByProject"])
  },
  computed: {
    ...mapState({
      tasksByProject: state => state.tasks.tasksByProject,
      project: state => state.projects.project
    })
  },
  components: {
    TasksByProjectSide,
    TaskItem,
    TasksByProjectHeader
  }
};
</script>

<style>
</style>
