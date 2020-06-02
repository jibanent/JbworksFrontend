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
          </svg>
        </div>
      </div>
      <router-link
        tag="div"
        :to="{
        name: 'tasks-by-project',
        params: {
          id: project.id,
          project: formatProjectName,
        }
      }"
        class="title url"
      >{{ project.name }}</router-link>
      <div class="info" style="height:13px;">
        <div class="absolute ap-xdot">Cập nhật {{ formatUpdatedAt }}</div>
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
          <b>{{ project.stats.completed_ontime + project.stats.completed_late }}</b>/
          <b>{{ project.stats.total }}</b> hoàn thành
          <span class="right">
            <b>{{ project.stats.overdue }}</b> quá hạn
          </span>
        </div>
        <div class="complete" :style="`width:${completedWidth}%; background-color:#EB6450`"></div>
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
          <router-link
            tag="div"
            :to="{
              name: 'tasks-by-project',
              params: {
                id: project.id,
                project: formatProjectName,
              }
            }"
            class="-item url"
          >Xem chi tiết</router-link>
          <div class="-item url" @click="openNewTab">Mở trong tab mới</div>
          <div class="-item-sep"></div>
          <div class="-item url" @click="$store.commit('SET_PROJECT_EDITING', project)">Chỉnh sửa nhanh</div>
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
import { removeVietnameseFromString } from "../../helpers";
export default {
  name: "project-item",
  props: {
    project: { type: Object, default: null }
  },
  computed: {
    completedWidth() {
      return (
        ((this.project.stats.completed_ontime +
          this.project.stats.completed_late) /
          this.project.stats.total) *
        100
      );
    },
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
    },
    formatProjectName() {
      return removeVietnameseFromString(this.project.name);
    }
  },
  methods: {
    openNewTab() {
      let routeData = this.$router.resolve({
        name: "tasks-by-project",
        params: {
          id: this.project.id,
          project: this.formatProjectName
        }
      });
      window.open(routeData.href, "_blank");
    }
  },
  components: {
    ProjectParticipants
  }
};
</script>

<style>
</style>
