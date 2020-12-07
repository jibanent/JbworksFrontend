<template>
  <div class="table-responsive">
    <table class="table table-striped custom-table">
      <thead>
        <tr>
          <th>Task</th>
          <th>Người thực hiện</th>
          <th>Tên công ty</th>
          <th>Tiến độ sale</th>
          <th>Trạng thái thương thảo</th>
          <th>Trạng thái kết quả thương thảo</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <router-link :to="{name: 'task', params: {id: 1}}">Probe Project</router-link>
          </td>
          <td>Phú</td>
          <td>Suzuki</td>
          <td>
            <span class="badge badge-info">Đang gọi điện</span>
          </td>
          <td>
            <span class="badge badge-info">Đang gọi điện</span>
          </td>
          <td>
            <span class="badge badge-info">Đang đợi khách hàng trả lời</span>
          </td>
          <td class="d-flex">
            <a href="javascript:;" class="icon-btn bg-white">
              <i class="zmdi zmdi-edit text-primary" />
            </a>
            <a href="javascript:;" class="icon-btn bg-white">
              <i class="zmdi zmdi-close text-danger" />
            </a>
          </td>
        </tr>
        <tr>
          <td>
            <router-link :to="{name: 'task', params: {id: 1}}">Dream successful Project</router-link>
          </td>
          <td>Phú</td>
          <td>Suzuki</td>
          <td>
            <span class="badge badge-info">Đang gọi điện</span>
          </td>
          <td>
            <span class="badge badge-warning">Đã hẹn gặp</span>
          </td>
          <td>
            <span class="badge badge-info">Đang đợi khách hàng trả lời</span>
          </td>
          <td class="d-flex">
            <a href="javascript:;" class="icon-btn bg-white">
              <i class="zmdi zmdi-edit text-primary" />
            </a>
            <a href="javascript:;" class="icon-btn bg-white">
              <i class="zmdi zmdi-close text-danger" />
            </a>
          </td>
        </tr>
        <tr>
          <td>
            <router-link :to="{name: 'task', params: {id: 1}}">Office Automatized</router-link>
          </td>
          <td>Trang</td>
          <td>Honda</td>
          <td>
            <span class="badge badge-primary">Thương thảo mới</span>
          </td>
          <td>
            <span class="badge badge-primary">Lắng nghe nhu cầu lần đầu</span>
          </td>
          <td>
            <span class="badge badge-primary">Lần tiếp theo sẽ đề xuất tiếp</span>
          </td>
          <td class="d-flex">
            <a href="javascript:;" class="icon-btn bg-white">
              <i class="zmdi zmdi-edit text-primary" />
            </a>
            <a href="javascript:;" class="icon-btn bg-white">
              <i class="zmdi zmdi-close text-danger" />
            </a>
          </td>
        </tr>
        <tr>
          <td>
            <router-link :to="{name: 'task', params: {id: 1}}">The sunclim bing plain</router-link>
          </td>
          <td>Nam</td>
          <td>Vinfast</td>
          <td>
            <span class="badge badge-info">Đang gọi điện</span>
          </td>
          <td>
            <span class="badge badge-info">Đang gọi điện</span>
          </td>
          <td>
            <span class="badge badge-info">Đabg đợi khách hàng trả lời</span>
          </td>
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
  </div>
</template>

<script>
export default {

}
</script>

