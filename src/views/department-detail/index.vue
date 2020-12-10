<template>
  <div class="department-detail-wraper">
    <div class="idb-block customClasses page-title rounded-0">
      <div class="h-100"><div class="app-card ">
        <div class="idb-block-content">
          <h5 class="text-capitalize mb-0"> Department / {{ $route.params.name }} </h5>
        </div>
      </div>
      </div>
    </div>
    <b-tabs ref="tabs">
      <b-tab :title="$t('message.employee')">
        <employees />
      </b-tab>
      <b-tab :title="$t('message.taskGroups')">
        <task-groups />
      </b-tab>
      <b-tab :title="$t('message.departmentalTargetsAndAchievements')">
        <department-targets />
      </b-tab>
      <b-tab :title="$t('message.employeeTargetsAndAchievements')">
        <employee-targets />
      </b-tab>
    </b-tabs>
  </div>
</template>

<script>
import Employees from './employees'
import TaskGroups from './task-groups'
import DepartmentTargets from './department-targets'
import EmployeeTargets from './employee-targets'
export default {
  components: {
    Employees,
    TaskGroups,
    DepartmentTargets,
    EmployeeTargets
  }
}
</script>
