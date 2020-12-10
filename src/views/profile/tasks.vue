<template>
  <div class="table-responsive">
    <table class="table table-striped custom-table">
      <thead>
        <tr>
          <th>{{ $t('message.taskName') }}</th>
          <th>{{ $t('message.companyName') }}</th>
          <th>{{ $t('message.negotiationResultStatus') }}</th>
          <th>{{ $t('message.progress') }}</th>
          <th>{{ $t('message.revenue') }}</th>
          <th>{{ $t('message.grossProfit') }}</th>
          <th>{{ $t('message.expectedOrderDate') }}</th>
          <th>{{ $t('message.action') }}</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <router-link :to="{name: 'task', params: {id: 1}}">Probe Project</router-link>
          </td>
          <td>Suzuki</td>
          <td>
            <span class="badge badge-info">Đang đợi khách hàng trả lời</span>
          </td>
          <td>20%</td>
          <td>25000</td>
          <td>20000</td>
          <td>2020-12-1</td>
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
          <td>Suzuki</td>
          <td>
            <span class="badge badge-info">Đang đợi khách hàng trả lời</span>
          </td>
          <td>20%</td>
          <td>25000</td>
          <td>20000</td>
          <td>2020-12-1</td>
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
          <td>Honda</td>
          <td>
            <span class="badge badge-primary">Lần tiếp theo sẽ đề xuất tiếp</span>
          </td>
          <td>100%</td>
          <td>25000</td>
          <td>20000</td>
          <td>2020-12-1</td>
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
          <td>Vinfast</td>
          <td>
            <span class="badge badge-info">Đabg đợi khách hàng trả lời</span>
          </td>
          <td>50%</td>
          <td>25000</td>
          <td>20000</td>
          <td>2020-12-1</td>
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