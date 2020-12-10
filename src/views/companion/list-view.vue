<template>
  <app-card heading-menu="true" :full-block="true">
    <vue-perfect-scrollbar :settings="settings">
      <div class="table-responsive companion-data">
        <table class="table table-striped custom-table">
          <thead>
            <tr class="bg-primary">
              <th>ID</th>
              <th>Avatar</th>
              <th>{{ $t('message.companion') }}</th>
              <th>{{ $t('message.createDate') }}</th>
              <th>{{ $t('message.amount') }}</th>
              <th class="text-right">Actions</th>
            </tr>
          </thead>
          <tbody>            
            <tr v-for="companion in companionData" :key="companion.id">              
              <td>#{{ companion.companionId }}</td>
              <td>
                <img class="img-fluid rounded-circle user-img" :src="companion.userAvatar" width="40" height="40">
              </td>
              <td>{{ companion.companionName }}</td>
              <td>{{ companion.date }}</td>
              <td><span class="badge">{{ companion.amount }}</span></td>
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
import { companionData } from 'Assets/data/Companion.js'
export default {
  data() {
    return {
      companionData
    }
  }
}
</script>