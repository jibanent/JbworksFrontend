<template>
  <div>
    <div id="navigator">
      <div class="header">
        <div class="logo"><img src="/images/header.png"></div>
        <div class="search">
          <div class="input">
            <input type="text" placeholder="Tìm dự án" />
          </div>
        </div>

        <div class="icon" title="Notifications">
          <span class="-ap icon-notifications"></span>
        </div>
      </div>

      <div class="user">
        <div class="avatar avatar-30">
          <div class="image"><img src="assets/images/avatar/nguyenanhtu.jpg"></div>
        </div>
        <div class="name ap-xdot">Nguyễn Anh Tú</div>
        <div class="info ap-xdot">Quản lý nhóm kiến trúc Japan</div>
      </div>

      <div
        class="canvas scrollable __set __apscrollbar_parent __autohide"
        data-autoscroll="1"
        data-autohide="1"
      >
        <div
          class="scrollin absolute __apscrollbar_target __scrolled"
          id="_uuid1679_19128_1584519723"
          style="right: -17px; top: 0px; left: 0px; bottom: 0px;"
        >
          <div class="__apscrollbar_wrap __autohide">
            <div class="boxes">
              <div class="box -home" id="js-top-menu">
                <div class="title">
                  <div class="label">Tổng hợp</div>
                </div>

                <div class="boards">
                  <router-link class="li __ap_processed active" to="/tasks">
                    <span class="icon"><img src="assets/images/icons/home.png"></span>
                    <span class="name">Công việc</span>
                  </router-link>

                  <router-link class="li __ap_processed" to="/projects">
                    <span class="icon"><img src="assets/images/icons/projects.png"></span>
                    <span class="name">Dự án</span>
                  </router-link>

                  <router-link class="li __ap_processed" to="/departments">
                    <span class="icon"><img src="assets/images/icons/star.png"></span>
                    <span class="name">Departments</span>
                  </router-link>

                  <router-link class="li __ap_processed" to="/users">
                    <span class="icon"><img src="assets/images/icons/users.png"></span>
                    <span class="name">Thành viên</span>
                  </router-link>

                  <router-link class="li url" to="/reports">
                    <span class="icon"><img src="assets/images/icons/report.png"></span>
                    <span class="name">Báo cáo</span>
                  </router-link>
                </div>
              </div>

              <div id="js-x-projects" class="ui-sortable">
                <div class="box js-menu" data-name="d49" data-id="49">
                  <div class="title">
                    <div class="label ap-xdot ui-sortable-handle">02 - Phòng ban</div>
                    <div class="icons">
                      <div class="icon" id="js-project-create-button">
                        <span class="-ap icon-uniF100"></span>
                      </div>
                    </div>
                  </div>
                  <div class="boards ui-sortable">
                    <a class="li proj proj-16896 ui-sortable-handle __ap_processed" href="#">
                      <span class="sorder"></span>
                      <span class="icon">
                        <span class="icon-project -bg-alt1"></span>
                      </span>
                      <span class="name ap-xdot">Công việc của Anh Tú</span>
                    </a>
                  </div>
                </div>
              </div>

              <div class="box box-setting" id="js-admin-menu">
                <div class="title">
                  <div class="label">Tùy chỉnh</div>
                </div>

                <div class="boards">
                  <div class="li url js-project-create" data-url="project/create">
                    <div class="icon"><img src="images/icons/create.png"></div>
                    <div class="name">Tạo dự án mới</div>
                  </div>

                  <div class="li url js-team-create" data-url="team/create">
                    <div class="icon"><img src="images/icons/create.png"></div>
                    <div class="name">Tạo team mới</div>
                  </div>

                  <div class="li url" data-url="onboard">
                    <div class="icon"><img src="images/icons/setting.png"></div>
                    <div class="name">Cài đặt hệ thống</div>
                  </div>

                  <div class="li url" data-url="videos">
                    <div class="icon">
                      <span class="-ap icon-play"></span>
                    </div>
                    <div class="name">Video hướng dẫn</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div id="_uuid1679_19128_1584519723__apscrollbar" class="__apscrollbar">
          <div
            class="scroller ui-draggable ui-draggable-handle active"
            style="top: 48px; height: 50px;"
          >
            <div class="sinner" style="height: 49px;"></div>
          </div>
        </div>
      </div>
    </div>
    <div id="master">
      <router-view @openModal="openModal"></router-view>
    </div>

    <user-form-modal  v-if="showModal" @closeModal="closeModal"/>

  </div>
</template>

<script>
import UserFormModal from './users/UserFormModal'
export default {
  name: 'app',
  data() {
    return {
      showModal: false
    }
  },
  methods: {
    openModal() {
      this.showModal = true
    },
    closeModal() {
      this.showModal = false
    }
  },
  components: {
    UserFormModal
  }
};
</script>
