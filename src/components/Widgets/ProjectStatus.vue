<template>
  <div>
    <vue-perfect-scrollbar :settings="settings" class="scroll-length">
      <b-list-group>
        <b-list-group-item
          v-for="( project, index ) in progressStatus"
          :key="index"
          class="px-0 rounded-0 mb-0 border-0"
        >
          <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Progress {{ project.id }}</h5>
            <b-badge class="fw-semi-bold px-2 py-1 " :variant="project.btnStatus">{{ project.status }}</b-badge>
          </div>
          <div>
            <b-progress :value="project.valueDeterminate" class="mt-3 rounded-0 progress-sm" />
          </div>
        </b-list-group-item>
      </b-list-group>
    </vue-perfect-scrollbar>
  </div>
</template>

<script>
export default {
  data() {
    return {
      progressStatus: [
        {
          id: '1',
          status: 'Completed',
          btnStatus: 'success',
          valueDeterminate: 60
        },
        {
          id: '2',
          status: 'Pending',
          btnStatus: 'danger',
          valueDeterminate: 40
        },
        {
          id: '3',
          status: 'Ongoing',
          btnStatus: 'warning',
          valueDeterminate: 20
        },
        {
          id: '4',
          status: 'Completed',
          btnStatus: 'info',
          valueDeterminate: 90
        }
      ],
      settings: {
        maxScrollbarLength: 100
      }
    }
  }
}
</script>
