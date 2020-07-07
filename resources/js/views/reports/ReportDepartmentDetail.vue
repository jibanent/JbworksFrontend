<template>
  <div class="box std" data-col="6,3" style="width: 60%;">
    <div class="inner">
      <div class="header">
        {{ $t('report.report tasks by department') }}
        <div class="side"></div>
      </div>
      <div class="body -fit">
        <div class="scrollbox scroll-y -smaller">
          <div class="table xo">
            <table>
              <thead>
                <tr>
                  <th>{{ $t('departments.departments') }}</th>
                  <th style="width:60px;">
                    <div class="ap-xdot">{{ $t('report.total tasks') }}</div>
                  </th>
                  <th style="width:60px;">
                    <div class="ap-xdot">{{ $t('report.done on time') }}</div>
                  </th>
                  <th style="width:60px;">
                    <div class="ap-xdot">{{ $t('report.done late') }}</div>
                  </th>
                  <th style="width:60px;">
                    <div class="ap-xdot">{{ $t('report.overdue') }}</div>
                  </th>
                  <th style="width:60px;">
                    <div class="ap-xdot">{{ $t('report.in progress') }}</div>
                  </th>
                  <th style="width:80px;">&nbsp;</th>
                </tr>
              </thead>

              <tbody id="js-dept-report">
                <report-department-detail-item
                  v-for="item in taskStatsByDepartment"
                  :key="item.id"
                  :stats="item"
                />
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="s" style="padding-bottom:50%"></div>
  </div>
</template>

<script>
import ReportDepartmentDetailItem from './ReportDepartmentDetailItem'
export default {
  name: "report-department-detail",
  props: {
    taskStatsByDepartment: { type: Array, default: [] }
  },
  components: {
    ReportDepartmentDetailItem
  }
};
</script>

<style>
</style>
