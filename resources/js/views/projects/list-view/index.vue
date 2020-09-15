<template>
  <div class="table" id="list-project" v-if="projects && true">
    <table>
      <thead>
        <tr class="theader">
          <th style="width:30px; min-width:30px;">&nbsp;</th>
          <th>
            <div class="lead" style="margin-left:-20px">{{ $t('projects.projects') }}</div>
          </th>
          <th style="width:130px">{{ $t('departments.departments') }}</th>
          <th style="width:120px">{{ $t('users.member') }}</th>
          <th style="width:150px">{{ $t('projects.stats') }}</th>
          <th style="width:80px">{{ $t('projects.status') }}</th>
          <th style="width:120px">&nbsp;</th>
          <th style="width:80px; min-width:80px">&nbsp;</th>
        </tr>
      </thead>
      <tbody class="ui-sortable">
        <project-item v-for="item in projects.data" :key="item.id" :project="item" />
      </tbody>
    </table>
  </div>
</template>

<script>
import ProjectItem from "./ProjectItem";
export default {
  name: 'list-view',
  props: {
    projects: {type: Object, default: null}
  },
  components: {
    ProjectItem
  }
};
</script>

<style>
</style>
