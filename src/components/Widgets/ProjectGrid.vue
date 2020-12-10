<template>
  <app-card :heading="managementData.name" :heading-menu="true" custom-classes="mb-0" :redirect-url="'/crm/projectDetails/'+ managementData.id">
    <div class="project-item">
      <h6 class="mb-3">Description :</h6>
      <p class="mb-3">
        {{ managementData.description }}
      </p>
      <div class="mb-4">
        <h6 class="mb-3">Team Members :</h6>
        <div class="team-member-thumb">
          <img
            v-for="(img,index) in managementData.teamImage"
            :key="index"
            :src="img"
            class="img-circle mr-2"
            width="30px"
            height="30px"
          >
        </div>
      </div>
      <div class="mb-3">
        <h6 class="mb-2">Deadline :</h6>
        <p class="mb-0">{{ managementData.deadline }}</p>
      </div>
      <div class="mb-3">
        <h6 class="mb-2">
          <span>Progress : </span>
          <span class="text-primary">{{ managementData.progressValue }}%</span>
        </h6>
        <b-progress :value="managementData.progressValue" class="rounded-0 progress-sm" />
      </div>
      <div class="text-right">
        <b-button variant="link" class="text-capitalize" small :to="'/crm/projectDetails/'+ managementData.id">Learn
          More</b-button>
      </div>
    </div>
  </app-card>
</template>

<script>
import { getCurrentAppLayout } from 'Helpers/helpers'

export default {
  props: ['managementData']
}
</script>
