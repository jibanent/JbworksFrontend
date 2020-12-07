<template>
  <div id="customer-list-wrapper">
    <page-title-bar />
    <div class="row align-items-stretch">
      <div class="col-half-lg-block col-sm-12 col-md-12 col-lg-4 col-xl-4">
        <app-card custom-classes="grid-b-space">
          <b-tabs ref="tabs" card>
            <b-tab title="Báo cáo">
              <div class="table-responsive reports-table">
                <table class="table table-striped custom-table">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Ngày báo cáo</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <th>2020/12/1</th>
                      <th>
                        <a href="javascript:;" class="icon-btn text-muted"><i class="zmdi zmdi-delete" /></a>
                      </th>
                    </tr>
                    <tr>
                      <td>2</td>
                      <th>2020/12/1</th>
                      <th>
                        <a href="javascript:;" class="icon-btn text-muted"><i class="zmdi zmdi-delete" /></a>
                      </th>
                    </tr>
                    <tr>
                      <td>3</td>
                      <th>2020/12/1</th>
                      <th>
                        <a href="javascript:;" class="icon-btn text-muted"><i class="zmdi zmdi-delete" /></a>
                      </th>
                    </tr>
                    <tr>
                      <td>3</td>
                      <th>2020/12/1</th>
                      <th>
                        <a href="javascript:;" class="icon-btn text-muted"><i class="zmdi zmdi-delete" /></a>
                      </th>
                    </tr>
                    <tr>
                      <td>4</td>
                      <th>2020/12/1</th>
                      <th>
                        <a href="javascript:;" class="icon-btn text-muted"><i class="zmdi zmdi-delete" /></a>
                      </th>
                    </tr>
                  </tbody>
                </table>
              </div>
            </b-tab>
            <b-tab title="Nhân viên của tôi">
              <div class="table-responsive reports-table">
                <table class="table table-striped custom-table">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Họ và tên</th>
                      <th>Ngày báo cáo</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <th>Phú</th>
                      <th>2020/12/1</th>
                      <th>
                        <a href="javascript:;" class="icon-btn text-muted"><i class="zmdi zmdi-delete" /></a>
                      </th>
                    </tr>
                    <tr>
                      <td>2</td>
                      <th>Ngọc</th>
                      <th>2020/12/1</th>
                      <th>
                        <a href="javascript:;" class="icon-btn text-muted"><i class="zmdi zmdi-delete" /></a>
                      </th>
                    </tr>
                    <tr>
                      <td>3</td>
                      <th>Thảo</th>
                      <th>2020/12/1</th>
                      <th>
                        <a href="javascript:;" class="icon-btn text-muted"><i class="zmdi zmdi-delete" /></a>
                      </th>
                    </tr>
                  </tbody>
                </table>
              </div>
            </b-tab>
          </b-tabs>
        </app-card>
      </div>
      <div class="col-half-lg-block col-sm-12 col-md-12 col-lg-8 col-xl-8">
        <app-card>
          <div class="table-responsive reports-table ">
            <table class="table table-striped custom-table">
              <thead>
                <tr>
                  <th>STT</th>
                  <th>Tên ken</th>
                  <th>Tên công ty khách hàng</th>
                  <th>Tiến độ sale</th>
                  <th>Trạng thái thương thảo</th>
                  <th>Trạng thái kết quả thương thảo</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <th>Office Automatized</th>
                  <th>Suzuki</th>
                  <th><span class="badge badge-warning">Đang gọi điện</span></th>
                  <th><span class="badge badge-warning">Đang gọi điện</span></th>
                  <th><span class="badge badge-warning">Đang đợi khách hàng trả lời</span></th>
                </tr>
                <tr>
                  <td>2</td>
                  <th>The sunclim bing plain</th>
                  <th>Suzuki</th>
                  <th><span class="badge badge-primary">Thương thảo mới</span></th>
                  <th><span class="badge badge-primary">Lắng nghe nhu cầu</span></th>
                  <th><span class="badge badge-primary">Lần tiếp theo sẽ đề xuất tiếp</span></th>
                </tr>
                <tr>
                  <td>3</td>
                  <th>Tantas earum numeris</th>
                  <th>Suzuki</th>
                  <th><span class="badge badge-success">Closing</span></th>
                  <th><span class="badge badge-success">Báo giá lần đầu</span></th>
                  <th><span class="badge badge-success">Nhận đơn hàng / Xác định ký hợp đồng</span></th>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="mt-5">
            <h6 class="mb-3">Nội dung báo cáo khác :</h6>
            <p class="mb-3">
              <i class="material-icons text-muted">subjects</i>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad recusandae quasi perferendis delectus, sequi enim repellendus harum praesentium culpa assumenda non!
            </p>
          </div>
          <div class="idb-full-block border-top pt-20">
            <div class="d-flex mb-3">
              <h4 class="mr-4 mb-0 text-uppercase">Bình luận</h4>
              <a href="javascript:;" class="font-xs text-muted"><i class="zmdi zmdi-comment font-sm text-success mr-1" />21 Comments</a>
            </div>
            <div class="media px-20">
              <div class="img-wrap">
                <img src="/static/img/user-2.jpg" width="40" height="40" alt="author" class="rounded-circle">
              </div>
              <div class="media-body ml-2 d-flex">
                <div class="mr-4">
                  <h5 class="mb-0">Nguyễn Thanh Thảo </h5>
                  <span class="font-xs text-muted">15:04 Apr 04</span>
                </div>
                <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam, laborum.</p>
              </div>
            </div>
            <div class="media p-20">
              <div class="img-wrap">
                <img src="/static/img/user-4.jpg" width="40" height="40" alt="author" class="rounded-circle">
              </div>
              <div class="media-body ml-2 d-flex">
                <div class="mr-4">
                  <h5 class="mb-0">Nguyễn Thùy Trang </h5>
                  <span class="font-xs text-muted">15:04 Apr 04</span>
                </div>
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste, quaerat.</p>
              </div>
            </div>
            <b-form>
              <b-form-group id="comment">
                <b-form-input
                  type="text"
                  required
                  placeholder="Comment and press enter to post"
                  class="mb-30"
                />
              </b-form-group>
            </b-form>
          </div>
        </app-card>
      </div>
    </div>
  </div>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>
  .reports-table {
    table {
      tbody {
        tr {
          cursor: pointer;
        }
      }
    }
  }
</style>
