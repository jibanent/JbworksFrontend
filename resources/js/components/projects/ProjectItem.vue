<template>
  <tr class="li js-project">
    <td>
      <div class="rx ui-sortable-handle"></div>
    </td>
    <td>
      <div class="icon" title="Completed: 5.0%">
        <div lass="js-complete-sektor" style="width:20px; height:20px">
          <svg class="Sektor" viewBox="0 0 100 100">
            <circle
              class="Sektor-circle"
              stroke-width="0"
              fill="#e5e5e5"
              stroke="#e5e5e5"
              cx="50"
              cy="50"
              r="50"
            />
            <path
              class="Sektor-sector"
              stroke-width="0"
              fill="#F7CF2D"
              stroke="none"
              d="M50,50 L50,0 A50,50 1 0 1 65.45084971874738,2.447174185242325  z"
            />
          </svg>
        </div>
      </div>
      <div class="title url">{{ project.name }}</div>
      <div class="info" style="height:13px;">
        <div
          class="absolute ap-xdot"
          :title="description"
        >{{ description }} Update {{ formatUpdatedAt }}</div>
      </div>
    </td>
    <td>
      <div class="relative">
        <div class="absolute ap-xdot">
          <div class="dept">
            <span class="a normal std url">{{ project.department }}</span>
          </div>
        </div>
      </div>
    </td>
    <td>
      <div class="users clear-fix">
        <project-participants
          v-for="item in project.participants"
          :key="item.id"
          :participant="item"
        />
      </div>
    </td>
    <td>
      <div class="bar">
        <div class="stats">
          <b>1</b>/
          <b>20</b> hoàn thành
          <span class="right">
            <b>0</b> quá hạn
          </span>
        </div>
        <div class="complete" style="width:5.0%; background-color:#EB6450"></div>
      </div>
    </td>
    <td>
      <div class="status -0">
        <div class="stage" :class="activeClass">{{ isActive }}</div>
      </div>
    </td>
    <td>
      <div class="status -ontrack">
        <div
          class="stage -edge"
          :style="`color: #fff; background-color: ${project.status.color}`"
        >{{ project.status.name }}</div>
      </div>
    </td>
    <td>
      <div class="edit-dd -cmenuw">
        Option
        <span class="-ap icon-triangle-down"></span>
        <div class="-cmenu -no-icon -padding w200">
          <div class="-item url">Xem chi tiết</div>
          <div class="-item url">Mở trong tab mới</div>
          <div class="-item-sep"></div>
          <div class="-item url">Chỉnh sửa nhanh</div>
          <div class="-item url">Cập nhật trạng thái</div>
          <div class="-item url">Quản lý</div>
        </div>
      </div>
    </td>
  </tr>
</template>

<script>
import moment from "moment";
import ProjectParticipants from "./ProjectParticipants";
export default {
  name: "project-item",
  props: {
    project: {
      type: Object,
      default: null
    }
  },
  computed: {
    formatUpdatedAt() {
      return moment(this.project.updated_at).fromNow();
    },
    isActive() {
      return this.project.active === 1 ? "Hoạt đông" : "Đã đóng";
    },
    activeClass() {
      return this.project.active === 1 ? "-bg-success" : "-bg-error";
    },
    description() {
      return this.project.description
        ? this.project.description
        : "Chưa có mô tả";
    }
  },
  components: {
    ProjectParticipants
  }
};
</script>

<style>
</style>
