<template>
  <div class="box std" style="width: 60%;">
    <div class="inner">
      <div class="header">
        {{ $t('projects.projects') }}
        <div class="side"></div>
      </div>

      <div class="body -fit">
        <div class="scrollbox scroll-y -smaller">
          <div class="table xo">
            <table>
              <thead>
                <tr>
                  <th>{{ $t('projects.projects') }}</th>
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
              <tbody>
                <tr v-for="item in taskStatsByProject" :key="item.id">
                  <td>
                    <div class="wrapper" style="height:40px;">
                      <div class="obj">
                        <div class="icon">
                          <div
                            :class="`-tavatar -bg-alt1`"
                            style="line-height: 32px; width: 32px; height: 32px"
                          >
                            <span class="-txt">{{ item.project.name.charAt(0) }}</span>
                          </div>
                        </div>
                        <div class="name ap-xdot url">
                          <span class="url">{{ item.project.name }}</span>
                        </div>
                        <div class="info ap-xdot">{{ item.project.description }}</div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <span class="count">{{ item.total }}</span>
                  </td>
                  <td>
                    <span class="count" style="color:#14cc3f">{{ item.completed_ontime }}</span>
                  </td>
                  <td>
                    <span class="count" style="color:#F7E015">{{ item.completed_late }}</span>
                  </td>
                  <td>
                    <span class="count" style="color:#f54e3b">{{ item.overdue }}</span>
                  </td>
                  <td>
                    <span class="count" style="color:#389FDB">{{ item.processing }}</span>
                  </td>
                  <td>
                    <div class="relative">
                      <div class="mbar clear-fix -soft">
                        <div
                          class="b -infow"
                          style="background-color:#8fc79c;"
                          :style="percentWidth(item.completed_ontime, item.total)"
                        >
                          <span class="-infobox -up -w200">
                            <span
                              class="-box block normal"
                            >{{ $t('report.done on time') }}: {{ item.completed_ontime }}</span>
                          </span>
                        </div>
                        <div
                          class="b -infow"
                          style="background-color:#dbd491;"
                          :style="percentWidth(item.completed_late, item.total)"
                        >
                          <span class="-infobox -up -w200">
                            <span
                              class="-box block normal"
                            >{{ $t('report.done late') }}: {{ item.completed_late }}</span>
                          </span>
                        </div>
                        <div
                          class="b -infow"
                          style="background-color:#d1837d;"
                          :style="percentWidth(item.overdue, item.total)"
                        >
                          <span class="-infobox -up -w200">
                            <span
                              class="-box block normal"
                            >{{ $t('report.overdue') }}: {{ item.overdue }}</span>
                          </span>
                        </div>
                        <div
                          class="b -infow"
                          style=" background-color:#a8d3f0;"
                          :style="percentWidth(item.processing, item.total)"
                        >
                          <span class="-infobox -up -w200">
                            <span
                              class="-box block normal"
                            >{{ $t('report.in progress') }}: {{ item.processing }}</span>
                          </span>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="s" style="padding-bottom:66.66666666666667%"></div>
  </div>
</template>

<script>
export default {
  name: "report-project-detail",
  props: {
    taskStatsByProject: { type: Array, default: [] }
  },
  methods: {
    percentWidth(value, total) {
      return `width: ${(value / total) * 100}%`;
    }
  }
};
</script>

<style>
</style>
