<template>
  <app-card heading-menu="true" :full-block="true">
    <vue-perfect-scrollbar :settings="settings">
      <div class="table-responsive recent-order">
        <table class="table table-striped custom-table">
          <thead>
            <tr class="bg-primary">
              <th>ID</th>
              <th>{{ $t('message.activitylogName') }}</th>
              <th>{{ $t('message.activitylogDate') }}</th>
              <th>{{ $t('message.activitylogIP') }}</th>
              <th>{{ $t('message.activitylogDesc') }}</th>
              <th>{{ $t('message.activitylogUser') }}</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="order in activityLogsData" :key="order.id">
              <td>#{{ order.id }}</td>
              <td>{{ order.name }}</td>
              <td>{{ order.ip }}</td>
              <td>{{ order.createdate }}</td>
              <td>{{ order.description }}</td>
              <td>{{ order.user }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </vue-perfect-scrollbar>
  </app-card>
</template>
<script>
import { activityLogsData } from 'Assets/data/activityLogs.js'
export default {
  data() {
    return {
      activityLogsData
    }
  }
}
</script>