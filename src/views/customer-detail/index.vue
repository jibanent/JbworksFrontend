<template>
  <div class="customer-detail-wrapper">
    <page-title-bar />
    <div class="row">
      <div class="col-half-lg-block col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9">
        <app-card custom-classes="grid-b-space">
          <div class="row mb-3">
            <div class="col-md-6 col-lg-5 col-xl-5">
              <div class="user-profile-block">
                <div class="thumb-wrap mb-3 client-link text-center">
                  <img src="/static/img/browser-logo/suzuki.png" class="rounded-lg">
                </div>
                <div class="address-block px-20">
                  <span class="font-sm d-block mb-10"><i class="zmdi zmdi-account" />Gerald Vaugn</span>
                  <span class="font-sm d-block mb-10"><i class="zmdi zmdi-email" />geraldv@example.com</span>
                  <span class="font-sm d-block mb-10"><i class="zmdi zmdi-phone" />(01) 234 567 8901</span>
                  <span class="font-sm d-block mb-10"><i class="zmdi zmdi-pin" />E51, Industrial Area, Phase 2, Mohali, Punjab.</span>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-4 amount-sec-wrap mb-md-0 mb-4">
              <ul class="list-inline mb-3 amount-list">
                <li class="border-bottom py-3 d-flex align-items-center">
                  <span class="text-muted mr-3 w-60">{{ $t('message.companyName') }}:</span>
                  <h6 class="mb-0">Suzuki company</h6>
                </li>
                <li class="border-bottom py-3 d-flex align-items-center">
                  <span class="text-muted mr-3 w-60">{{ $t('message.companyKanaName') }}:</span>
                  <h6 class="mb-0">Suzuki company</h6>
                </li>
                <li class="border-bottom py-3 d-flex align-items-center">
                  <span class="text-muted mr-3 w-60">{{ $t('message.companyMainName') }}:</span>
                  <h6 class="mb-0">Suzuki company</h6>
                </li>
                <li class="border-bottom py-3 d-flex align-items-center">
                  <span class="text-muted mr-3 w-60">{{ $t('message.companyShortName') }}:</span>
                  <h6 class="mb-0">Suzuki</h6>
                </li>
              </ul>
            </div>
          </div>
          <div class="mb-3">
            <h6 class="mb-3">Ghi chú:</h6>
            <p class="mb-3">
              <i class="material-icons text-muted">subjects</i>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad recusandae quasi perferendis delectus, sequi enim repellendus harum praesentium culpa assumenda non!
            </p>
          </div>
          <div class="mb-3 d-flex">
            <h6 class="mb-3 mr-2">{{ $t('message.taskCompletedCount') }}:</h6>
            <h6 class="mb-0">3</h6>
          </div>
          <div class="table-responsive recent-order">
            <table class="table table-striped custom-table">
              <thead>
                <tr>
                  <th>STT</th>
                  <th>Tên ken</th>
                  <th>Tiến độ sale</th>
                  <th>Trạng thái thương thảo</th>
                  <th>Trạn thái kết quả thương thảo</th>
                  <th>Ngày dự định nhận đơn</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Dream successful Project</td>
                  <td><span class="badge badge-warning">Gọi điện</span></td>
                  <td><span class="badge badge-primary">Đã gặp khách hàng</span></td>
                  <td><span class="badge badge-success">Ký hợp đồng</span></td>
                  <td>2020/12/1</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Office Automatized</td>
                  <td><span class="badge badge-warning">Gọi điện</span></td>
                  <td><span class="badge badge-primary">Đã gặp khách hàng</span></td>
                  <td><span class="badge badge-success">Ký hợp đồng</span></td>
                  <td>2020/12/1</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Office Automatized</td>
                  <td><span class="badge badge-warning">Gọi điện</span></td>
                  <td><span class="badge badge-primary">Đã gặp khách hàng</span></td>
                  <td><span class="badge badge-success">Ký hợp đồng</span></td>
                  <td>2020/12/1</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Office Automatized</td>
                  <td><span class="badge badge-warning">Gọi điện</span></td>
                  <td><span class="badge badge-primary">Đã gặp khách hàng</span></td>
                  <td><span class="badge badge-success">Ký hợp đồng</span></td>
                  <td>2020/12/1</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Office Automatized</td>
                  <td><span class="badge badge-warning">Gọi điện</span></td>
                  <td><span class="badge badge-primary">Đã gặp khách hàng</span></td>
                  <td><span class="badge badge-success">Ký hợp đồng</span></td>
                  <td>2020/12/1</td>
                </tr>
              </tbody>
            </table>
          </div>
        </app-card>
      </div>
      <div class="col-full-lg-block col-sm-12 col-md-12 col-lg-3 col-xl-3">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <app-card custom-classes="grid-b-space" :full-block="true" content-custom-class="text-center user-profile-block">
              <div class="py-20">
                <div class="d-flex align-items-center task-wrap py-2">
                  <div class="mr-20">
                    <label class="custom-control custom-checkbox m-0">
                      <input type="checkbox" class="custom-control-input" value="on" checked>
                      <span class="custom-control-indicator" />
                    </label>
                  </div>
                  <h6 class="mb-0">ビルダーフラグ</h6>
                </div>
                <div class="d-flex align-items-center task-wrap py-2">
                  <div class="mr-20">
                    <label class="custom-control custom-checkbox m-0">
                      <input type="checkbox" class="custom-control-input" value="on" checked>
                      <span class="custom-control-indicator" />
                    </label>
                  </div>
                  <h6 class="mb-0">FCフラグ</h6>
                </div>
                <div class="d-flex align-items-center task-wrap py-2">
                  <div class="mr-20">
                    <label class="custom-control custom-checkbox m-0">
                      <input type="checkbox" class="custom-control-input" value="on">
                      <span class="custom-control-indicator" />
                    </label>
                  </div>
                  <h6 class="mb-0">取次店フラグ</h6>
                </div>
                <div class="d-flex align-items-center task-wrap py-2">
                  <div class="mr-20">
                    <label class="custom-control custom-checkbox m-0">
                      <input type="checkbox" class="custom-control-input" value="on" checked>
                      <span class="custom-control-indicator" />
                    </label>
                  </div>
                  <h6 class="mb-0">調査会社フラグ</h6>
                </div>
                <div class="d-flex align-items-center task-wrap py-2">
                  <div class="mr-20">
                    <label class="custom-control custom-checkbox m-0">
                      <input type="checkbox" class="custom-control-input" value="on">
                      <span class="custom-control-indicator" />
                    </label>
                  </div>
                  <h6 class="mb-0">工事会社フラグ</h6>
                </div>
                <div class="d-flex align-items-center task-wrap py-2">
                  <div class="mr-20">
                    <label class="custom-control custom-checkbox m-0">
                      <input type="checkbox" class="custom-control-input" value="on">
                      <span class="custom-control-indicator" />
                    </label>
                  </div>
                  <h6 class="mb-0">一般業者フラグ</h6>
                </div>
              </div>

            </app-card>
          </div>
          <div class="col-sm-12 col-md-6 col-lg-12 col-xl-12">
            <app-card custom-classes="peoples grid-b-space">
              <div>
                <ul>
                  <li class="p-3 border-bottom d-flex justify-content-between align-content-center">
                    <span class="fw-light text-capitalize fs-14 pr-10">Ngày thành lập :</span>
                    <span class="fw-semi-bold text-capitalize fs-14">00:00 2020/10/7</span>
                  </li>
                  <li class="p-3 border-bottom d-flex justify-content-between align-content-center">
                    <span class="fw-light text-capitalize fs-14 pr-10">Vốn điều lệ :</span>
                    <span class="fw-semi-bold text-capitalize fs-14">20.000.000.000</span>
                  </li>
                  <li class="p-3 border-bottom d-flex justify-content-between align-content-center">
                    <span class="fw-light text-capitalize fs-14 pr-10">Số nhân viên :</span>
                    <span class="fw-semi-bold text-capitalize fs-14">20.000.000.000</span>
                  </li>
                  <li class="p-3 border-bottom d-flex justify-content-between align-content-center">
                    <span class="fw-light text-capitalize fs-14 pr-10">Tháng quyết toán :</span>
                    <span class="fw-semi-bold text-capitalize fs-14">2020/12/1</span>
                  </li>
                  <li class="p-3 border-bottom d-flex justify-content-between align-content-center">
                    <span class="fw-light text-capitalize fs-14 pr-10">Doanh thu :</span>
                    <span class="fw-semi-bold text-capitalize fs-14">10.000.000.000</span>
                  </li>
                </ul>
              </div>
            </app-card>
          </div>
          <div class="col-sm-12 col-md-6 col-lg-12 col-xl-12">
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
export default {

}
</script>
