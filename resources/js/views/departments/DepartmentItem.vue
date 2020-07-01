<template>
  <div class="item -compact">
    <div class="w">
      <div class="title">{{ department.name }}</div>
      <div class="info">Tạo bởi {{ department.created_by.name }} lúc {{ formatCreatedAt }}</div>
      <div class="users clear-fix">
        <div class="avatar avatar-30" :title="department.manager.name">
          <img :src="avatar" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import moment from "moment";
import { getAvatar } from "../../helpers";
export default {
  name: "department-item",
  props: {
    department: { type: Object, default: null }
  },
  computed: {
    avatar() {
      return getAvatar(this.department.manager.avatar);
    },
    formatCreatedAt() {
      return moment(this.department.created_at).format("MM/DD/YYYY");
    }
  }
};
</script>

<style>
.avatar img {
  border-radius: 100%;
  object-fit: cover;
  object-position: center;
}
</style>
