<template>
  <div class="user-profile-wrapper">
    <page-title-bar />
    <div class="row">
      <div class="col-full-lg-block col-sm-12 col-md-12 col-lg-3 col-xl-3">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <app-card custom-classes="peoples grid-b-space" heading="Công việc của tôi">
              <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered table-middle">
                  <thead>
                    <tr>
                      <th>Task</th>
                      <th>Progress</th>
                      <th>Started at</th>
                      <th>Completed at</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="row in table2" :key="row.date">
                      <td>
                        <router-link :to="{name: 'task', params: {id: 1}}">{{ row.taskName }}</router-link>
                      </td>
                      <td>
                        <b-progress height="15px" :value="row.areaValueNow" show-progress />
                      </td>
                      <td class="font-sm text-muted">{{ row.startedAt }}</td>
                      <td class="font-sm text-muted">{{ row.completedAt }}</td>
                      <td class="font-sm text-muted">{{ row.status ? 'Đã ký HĐ' : 'Chưa ký HĐ' }}</td>
                      <td class="d-flex">
                        <a href="javascript:;" class="icon-btn bg-white">
                          <i class="zmdi zmdi-edit text-primary" />
                        </a>
                        <a href="javascript:;" class="icon-btn bg-white">
                          <i class="zmdi zmdi-close text-danger" />
                        </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div><!-- table responsive closed -->
            </app-card>
          </div>
        </div>
      </div>
      <div class="col-full-lg-block col-sm-12 col-md-12 col-lg-6 col-xl-6">
        <div class="row align-items-stretch">
          <div class="col-half-lg-block col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-b-space">
            <app-card heading="Visual 20191101 小林様お打合せレイアウト" :heading-menu="true" custom-classes="mb-0">
              <div class="project-item">
                <div class="d-flex mb-3">
                  <p class="text-muted mb-0 mr-3">Tên khách hàng:</p>
                  <p class="m-0">Jibanet Asia</p>
                </div>
                <div class="mb-3">
                  <span class="text-muted mr-3">Ngày bắt đầu: </span>
                  <a href="#">2020/01/12</a>
                  <i class="fa fa-long-arrow-right mx-3 text-muted" />
                  <span class="text-muted">Ngày hoàn thành: </span>
                  <a href="#">2020/10/12</a>
                </div>
                <div class="mb-3">
                  <div class="list-group-item border-0 rounded-0 p-0 d-flex justify-content-start align-items-center">
                    <span class="w-30 d-flex align-items-center text-muted">Tiến độ sale : </span>
                    <b-dropdown id="down1" text="Đã hẹn gặp" variant="primary" class="mb-10 mr-10">
                      <b-dropdown-item href="#">Đang gọi điện thoại</b-dropdown-item>
                      <b-dropdown-item href="#">Đã hẹn gặp</b-dropdown-item>
                      <b-dropdown-item href="#">Thương thảo mới</b-dropdown-item>
                      <b-dropdown-item href="#">Tiếp tục thương thảo</b-dropdown-item>
                      <b-dropdown-item href="#">Closing</b-dropdown-item>
                    </b-dropdown>
                  </div>
                  <div class="list-group-item border-0 rounded-0 p-0 d-flex justify-content-start align-items-center">
                    <span class="w-30 d-flex align-items-center text-muted">Trạng thái thương thảo : </span>
                    <b-dropdown id="down1" text="Lắng nghe nhu cầu" variant="primary" class="mb-10 mr-10">
                      <b-dropdown-item href="#">Đang gọi điện thoại</b-dropdown-item>
                      <b-dropdown-item href="#">Đã hẹn gặp</b-dropdown-item>
                      <b-dropdown-item href="#">Lắng nghe nhu cầu</b-dropdown-item>
                      <b-dropdown-item href="#">Đề xuất</b-dropdown-item>
                      <b-dropdown-item href="#">Gửi báo giá</b-dropdown-item>
                      <b-dropdown-item href="#">Closing</b-dropdown-item>
                    </b-dropdown>
                  </div>
                </div>
                <div class="mb-3">
                  <h6 class="mb-3">Nội dung:</h6>
                  <p class="mb-3">
                    <i class="material-icons text-muted">subjects</i>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad recusandae quasi perferendis delectus, sequi enim repellendus harum praesentium culpa assumenda non!
                  </p>
                </div>
                <div class="mb-3">
                  <div class="list-group-item border-0 rounded-0 p-0 d-flex justify-content-start align-items-center">
                    <span class="w-30 d-flex align-items-center text-muted">Kết quả thương thảo : </span>
                    <b-dropdown id="down1" text="Lần tiếp theo sẽ đề xuất tiếp" variant="warning" class="mb-10 mr-10">
                      <b-dropdown-item href="#">Lần tiếp theo sẽ đề xuất tiếp</b-dropdown-item>
                      <b-dropdown-item href="#">Đang đợi khách hàng trả lời</b-dropdown-item>
                      <b-dropdown-item href="#">Nhận đơn hàng/Xác nhận ký hợp đồng</b-dropdown-item>
                      <b-dropdown-item href="#">Nhận đơn hàng/Không ký hợp đồng</b-dropdown-item>
                    </b-dropdown>
                  </div>
                </div>
                <div class="mb-3">
                  <span class="text-muted mr-3">Ngày thương thảo tiếp theo: </span>
                  <a href="#">2020/01/12</a>
                </div>
                <div class="mb-3">
                  <span class="text-muted mr-3">Dự định ngày tiếp theo: </span>
                  <span>Gọi điện</span>
                </div>
                <div class="mb-3">
                  <span class="text-muted mr-3">Ngày dự định nhận đơn: </span>
                  <a href="#">2020/01/12</a>
                </div>
                <div class="mb-3">
                  <span class="text-muted mr-3">Giá khảo sát: </span>
                  <span>25.000</span>
                </div>
                <div class="mb-3">
                  <span class="text-muted mr-3">Giá bảo hiểm: </span>
                  <span>25.000</span>
                </div>
              </div>
              <b-card no-body>
                <b-card-header header-tag="header" class="p-10" role="tab">
                  <b-btn v-b-toggle.closed-item-2 block href="#" variant="primary">{{ $t('message.taskProcess') }}
                  </b-btn>
                </b-card-header>
                <b-collapse id="closed-item-2" accordion="my-accordion" role="tabpanel">
                  <b-card-body>
                    <div class="table-responsive">
                      <table class="table table-striped custom-table">
                        <thead>
                          <tr>
                            <th>STT</th>
                            <th>Ngày</th>
                            <th>Tiến độ sale</th>
                            <th>Trạng thái thương thảo</th>
                            <th>Mô tả</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>2020/10/1</td>
                            <td>
                              <b-badge variant="warning">Đang gọi điện</b-badge>
                            </td>
                            <td>
                              <b-badge variant="warning">Đang gọi điện</b-badge>
                            </td>
                            <td>Chuẩn bị báo giá</td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>2020/10/2</td>
                            <td>
                              <b-badge variant="primary">Đã hẹn gặp</b-badge>
                            </td>
                            <td>
                              <b-badge variant="primary">Lắng nghe nhu cầu</b-badge>
                            </td>
                            <td>Đã gặp nhau ở công ty</td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td>2020/10/3</td>
                            <td>
                              <b-badge variant="success">Closing</b-badge>
                            </td>
                            <td>
                              <b-badge variant="primary">Gửi báo giá</b-badge>
                            </td>
                            <td>Đã gửi cho khách báo giá</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </b-card-body>
                </b-collapse>
              </b-card>
            </app-card>
          </div>
        </div>
      </div>
      <div class="col-full-lg-block col-sm-12 col-md-12 col-lg-3 col-xl-3">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <app-card custom-classes="peoples grid-b-space" heading="Thành viên thực hiện">
              <b-list-group>
                <b-list-group-item class="d-flex d-block align-items-center py-15 px-20">
                  <div class="avatar-wrap">
                    <img src="/static/img/user-1.jpg" class="rounded-circle" alt="user" width="45" height="45">
                  </div>
                  <div class="w-80">
                    <div class="d-xl-flex justify-content-between mb-1 meta-info">
                      <h6 class="w-50">Admin</h6>
                      <span class="font-xs text-muted w-50 d-block text-xl-right">@admin</span>
                    </div>
                    <div class="follow-status">
                      <span class="font-xs text-muted">UI Developer</span>
                    </div>
                  </div>
                </b-list-group-item>
              </b-list-group>
            </app-card>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <app-card custom-classes="peoples grid-b-space">
              <div>
                <ul>
                  <li class="p-3 border-bottom d-flex justify-content-between align-content-center">
                    <span class="fw-light text-capitalize fs-14 pr-10">Thời gian tạo :</span>
                    <span class="fw-semi-bold text-capitalize fs-14">00:00 2020/10/7</span>
                  </li>
                  <li class="p-3 border-bottom d-flex justify-content-between align-content-center">
                    <span class="fw-light text-capitalize fs-14 pr-10">Thời gian cập nhật :</span>
                    <span class="fw-semi-bold text-capitalize fs-14">13:39 2020/10/7</span>
                  </li>
                </ul>
              </div>
            </app-card>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { table2 } from 'Assets/data/responsiveTable.js'
export default {
  data() {
    return {
      table2
    }
  }
}
</script>
