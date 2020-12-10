<template>
  <div>
    <ul>
      <li class="p-3 border-bottom d-flex justify-content-between align-content-center">
        <span class="fw-light text-capitalize fs-14 pr-10">budget :</span>
        <span class="fw-semi-bold text-capitalize fs-14">${{ managementData.budget }}</span>
      </li>
      <li class="p-3 border-bottom d-flex justify-content-between align-content-center">
        <span class="fw-light text-capitalize fs-14 pr-10">Client :</span>
        <span class="fw-semi-bold text-capitalize fs-14">{{ managementData.client }}</span>
      </li>
      <li class="p-3 border-bottom d-flex justify-content-between align-content-center">
        <span class="fw-light text-capitalize fs-14 pr-10">Department :</span>
        <span class="fw-semi-bold text-capitalize fs-14">{{ managementData.department }}</span>
      </li>
      <li class="p-3 border-bottom d-flex justify-content-between align-content-center">
        <span class="fw-light text-capitalize fs-14 pr-10">Duration :</span>
        <span class="fw-semi-bold text-capitalize fs-14">{{ managementData.duration }}</span>
      </li>
      <li class="p-3 border-bottom d-flex justify-content-between align-content-center">
        <span class="fw-light text-capitalize fs-14 pr-10">Project Manager :</span>
        <span class="fw-semi-bold text-capitalize fs-14">{{ managementData.projectManager }}</span>
      </li>
      <li class="p-3 border-bottom d-flex justify-content-between align-content-center">
        <span class="fw-light text-capitalize fs-14 pr-10">Team :</span>
        <span class="fw-semi-bold text-capitalize fs-14">
          <img
            v-for="(img,index) in managementData.teamImage"
            :key="index"
            class="img-circle ml-1"
            width="30px"
            height="30px"
            :src="img"
          >
        </span>
      </li>
      <li class="p-3 border-bottom d-flex justify-content-between align-content-center">
        <span class="fw-light text-capitalize fs-14 pr-10">Status :</span>
        <span class="fw-semi-bold text-capitalize fs-14">
          {{ managementData.status }}
        </span>
      </li>
      <li class="p-3 border-bottom d-flex justify-content-between align-content-center">
        <span class="fw-light text-capitalize fs-14 pr-10">Deadline :</span>
        <span class="fw-semi-bold text-capitalize fs-14">
          {{ managementData.deadline }}
        </span>
      </li>
    </ul>
  </div>
</template>

<script>

export default {
  props: ['managementData']
}
</script>
