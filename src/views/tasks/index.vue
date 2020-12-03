<template>
  <div id="responsive-table">
    <page-title-bar />
    <app-card custom-classes="grid-b-space" :heading="$t('message.myTasks')">
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
