<template>
  <tr>
    <td>
      <div class="wrapper" style="height:40px;">
        <div class="obj">
          <div class="icon">
            <div class="-tavatar -bg-alt7" style="line-height: 32px; width: 32px; height: 32px">
              <span class="-txt">{{ stats.department.name.charAt(0) }}</span>
            </div>
          </div>
          <div class="name ap-xdot url">
            <span class="url">{{ stats.department.name }}</span>
          </div>
          <div class="info ap-xdot">
            <em>Phòng ban</em> · {{ stats.total }} công việc
          </div>
        </div>
      </div>
    </td>
    <td>
      <span class="count">{{ stats.total }}</span>
    </td>
    <td>
      <span class="count" style="color:#14cc3f">{{ stats.completed_ontime }}</span>
    </td>
     <td>
      <span class="count" style="color:#F7E015">{{ stats.completed_late }}</span>
    </td>
    <td>
      <span class="count" style="color:#f54e3b">{{ stats.overdue }}</span>
    </td>
    <td>
      <span class="count" style="color:#389dd9">{{ stats.processing }}</span>
    </td>
    <td>
      <div class="relative">
        <div class="mbar clear-fix -soft">
          <div class="b -infow" style="background-color:#8fc79c;" :style="percentWidth(stats.completed_ontime)">
            <span class="-infobox -up -w200">
              <span class="-box block normal">Hoàn thành đúng hạn: {{ stats.completed_ontime }}</span>
            </span>
          </div>
          <div class="b -infow" style="background-color:#dbd491;" :style="percentWidth(stats.completed_late)">
            <span class="-infobox -up -w200">
              <span class="-box block normal">Hoàn thành muộn: {{ stats.completed_late }}</span>
            </span>
          </div>
          <div class="b -infow" style="background-color:#d1837d;" :style="percentWidth(stats.overdue)">
            <span class="-infobox -up -w200">
              <span class="-box block normal">Quá hạn: {{ stats.overdue }}</span>
            </span>
          </div>
          <div class="b -infow" style="background-color:#a8d3f0;" :style="percentWidth(stats.processing)">
            <span class="-infobox -up -w200">
              <span class="-box block normal">Đang thực hiện: {{ stats.processing }}</span>
            </span>
          </div>
        </div>
      </div>
    </td>
  </tr>
</template>

<script>
export default {
  name: "report-department-detail-item",
  props: {
    stats: {type: Object, default: null}
  },
   methods: {
    percentWidth(value) {
      return `width: ${(value / this.stats.total) * 100}%`;
    }
  }
};
</script>

<style>
</style>
