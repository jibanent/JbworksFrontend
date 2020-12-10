<template>
  <div class="table-responsive">
    <table class="table table-striped custom-table">
      <thead>
        <tr>
          <th>Task</th>
          <th>Trạng thái kết quả thương thảo</th>
          <th>Mức độ đạt được</th>
          <th>Doanh thu</th>
          <th>Lợi nhuận</th>
          <th>Ngày dự kiến đặt hàng</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <router-link :to="{name: 'task', params: {id: 1}}">Probe Project</router-link>
          </td>
          <td><span class="badge badge-info">Đang đợi khách hàng trả lời</span></td>
          <td>50%</td>
          <td>
            <span class="badge badge-info">25,000	</span>
          </td>
          <td>
            <span class="badge badge-warning">15,000</span>
          </td>
          <td>
            <span class="badge badge-info">2020-12-12</span>
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
          <td><span class="badge badge-info">Đang đợi khách hàng trả lời</span></td>
          <td>60%</td>
          <td>
            <span class="badge badge-info">35,000	</span>
          </td>
          <td>
            <span class="badge badge-warning">30,000</span>
          </td>
          <td>
            <span class="badge badge-info">2020-12-15</span>
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
          <td><span class="badge badge-primary">Lần tiếp theo sẽ đề xuất tiếp</span></td>
          <td>70%</td>
          <td>
            <span class="badge badge-info">45,000	</span>
          </td>
          <td>
            <span class="badge badge-warning">40,000</span>
          </td>
          <td>
            <span class="badge badge-info">2020-12-17</span>
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
          <td><span class="badge badge-info">Đang đợi khách hàng trả lời</span></td>
          <td>90%</td>
          <td>
            <span class="badge badge-info">75,000	</span>
          </td>
          <td>
            <span class="badge badge-warning">45,000</span>
          </td>
          <td>
            <span class="badge badge-info">2020-12-18</span>
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

