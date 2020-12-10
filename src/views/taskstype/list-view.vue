<template>
  <app-card heading-menu="true" :full-block="true">
    <vue-perfect-scrollbar :settings="settings">
      <div class="table-responsive recent-order">
        <table class="table table-striped custom-table">
          <thead>
            <tr class="bg-primary">
              <th>{{ $t('message.id') }}</th>
              <th>{{ $t('message.tasktype') }}</th>
              <th>{{ $t('message.createDate') }}</th>
              <th>{{ $t('message.description') }}</th>
              <th class="text-right">{{ $t('message.action') }}</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="order in taskTypeData" :key="order.id">
              <td>#{{ order.id }}</td>
              <td>{{ order.name }}</td>
              <td>{{ order.createdate }}</td>
              <td>{{ order.description }}</td>
              <td class="table-action d-flex justify-content-end">
                <a href="javascript:;" class="icon-btn text-muted"><i class="zmdi zmdi-check" /></a>
                <a href="javascript:;" class="icon-btn text-muted"><i class="zmdi zmdi-edit" /></a>
                <a href="javascript:;" class="icon-btn text-muted"><i class="zmdi zmdi-delete" /></a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </vue-perfect-scrollbar>
  </app-card>
</template>
<script>
import { taskTypeData } from 'Assets/data/taskType.js'
export default {
  data() {
    return {
      taskTypeData
    }
  }
}
</script>