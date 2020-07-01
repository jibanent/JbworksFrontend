<template>
  <div class="box std" data-col="6,3" style="width: 60%;">
    <div class="inner">
      <div class="header">
        Báo cáo theo phòng ban
        <div class="side"></div>
      </div>
      <div class="body -fit">
        <div class="scrollbox scroll-y -smaller">
          <div class="table xo">
            <table>
              <thead>
                <tr>
                  <th>Phòng ban</th>
                  <th style="width:60px;">
                    <div class="ap-xdot">Công việc</div>
                  </th>
                  <th style="width:60px;">
                    <div class="ap-xdot">Hoàn thành</div>
                  </th>
                  <th style="width:60px;">
                    <div class="ap-xdot">Quá hạn</div>
                  </th>
                  <th style="width:60px;">
                    <div class="ap-xdot">Đang thực hiện</div>
                  </th>
                  <th style="width:60px;">
                    <div class="ap-xdot">Đang đánh giá</div>
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
