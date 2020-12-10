<template>
  <div id="responsive-table">
    <app-card custom-classes="grid-b-space" :heading="$t('message.myTasks')">

      <b-tabs ref="tabs" card>
        <b-tab title="Danh sách công việc">
          <list-view />
        </b-tab>
        <b-tab title="Lịch biểu">
          <img src="/static/img/lunar.png" class="img-fluid" alt="lunar">
        </b-tab>
      </b-tabs>
    </app-card>
  </div>
</template>

<script>
import listView from './list-view'
import Calendar from "Components/Widgets/Calendar";
export default {
  components: {
    Calendar,
    listView
  }
}
</script>

