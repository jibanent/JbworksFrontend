<template>
  <div id="js-myform">
    <div id="subheader">
      <div class="task-user-add -compact">
        <div class="avatar"></div>
        <div class="txt">
          <span class="action" v-on:click="openDialogSelectProject">Tạo công việc mới</span>
        </div>
      </div>
      <div class="side">
        <div class="dd -cmenuw">
          <em>Giao &amp; được giao</em>
          <div class="-cmenu -padding -no-icon">
            <div class="-item url active selected">Giao &amp; được giao</div>
            <div class="-item url">CV được giao</div>
            <div class="-item url">CV giao đi</div>
            <div class="sep-10"></div>
            <div class="select">
              <select>
                <option>Công việc &amp; công việc con</option>
                <option>Một cấp công việc con</option>
                <option>Không có công việc con</option>
              </select>
            </div>
          </div>
        </div>
        <div class="dd -cmenuw" data-param="status">
          <em>Tất cả trạng thái</em>
          <div class="-cmenu -padding -no-icon">
            <div class="-item url js-review-mark active selected">Tất cả trạng thái</div>
            <div class="-item url">Đang thực hiện (Phải làm &amp; Đang làm)</div>
            <div class="-item url">Phải làm</div>
            <div class="-item url">Đang làm</div>
            <div class="-item url">Đã hoàn thành</div>
            <div class="-item url">Chờ review</div>
            <div class="-item-sep"></div>
            <div class="-item url">HT muộn</div>
            <div class="-item url">Quá hạn</div>
            <div class="-item url">Khẩn cấp</div>
            <div class="-item url">Quan trọng</div>
          </div>
        </div>
        <div class="dd -cmenuw">
          <em>Tất cả dự án</em>
          <div class="-cmenu -padding -no-icon js-projects xo">
            <div class="-item-filter">
              <input type="text" placeholder="Lọc nhanh" />
            </div>
            <div class="js-all-projects-filter scroll-y">
              <div class="-item url active selected">Tất cả dự án</div>
              <div class="-item ap-xdot url">Phòng Nhật Bản</div>
              <div class="-item ap-xdot url">Hành chính</div>
            </div>
          </div>
        </div>
        <div class="dd -cmenuw">
          <em>Thời gian cập nhật</em>
          <div class="-cmenu -padding -no-icon">
            <div class="-item url active selected">Thời gian cập nhật</div>
            <div class="-item url">Thời gian tạo</div>
            <div class="-item url">Thời hạn hoàn thành</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "task-filter",
  methods: {
    openDialogSelectProject() {
      this.$store.commit("TOGGLE_DIALOG_SELECT_PROJECT");
    }
  }
};
</script>

<style>
</style>
