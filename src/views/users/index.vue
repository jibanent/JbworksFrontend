<template>
  <div class="user-list-wrapper">
    <page-title-bar />
    <div class="row">
      <template v-for="user in users">
        <div :key="user.id" class="col-half-lg-block col-xs-12 col-sm-6 col-md-6 col-xl-4 d-lg-half-block grid-b-space">
          <app-card content-custom-class="text-center">
            <div class="avatar-wrap pos-relative d-inline-block mb-15">
              <img :src="user.avatar" class="rounded-circle" alt="user thumbs" width="100" height="100">
              <span class="badge badge-label-sm badge-thumb-top-right badge-pill fa-notify badge-success">
                &nbsp;
              </span>
            </div>
            <div class="mb-20 user-info">
              <h4 class="mb-0">{{ user.name }}</h4>
              <span class="text-muted font-xs">{{ user.job_title ? user.job_title : 'No job title' }}</span>
            </div>
            <div class="address-block px-20">
              <span class="font-sm d-block mb-10"><i class="fa fa-user" />{{ user.username }}</span>
              <span class="font-sm d-block mb-10"><i class="fa fa-birthday-cake" />{{ user.birthday ? user.birthday : 'No birthday' }}</span>
              <span class="font-sm d-block mb-10"><i class="zmdi zmdi-phone" />{{ user.phone ? user.phone : 'No phone' }}</span>
              <span class="font-sm d-block mb-10"><i class="zmdi zmdi-email" />{{ user.email }}</span>
              <span class="font-sm d-block mb-10"><i class="zmdi zmdi-pin" />{{ user.address ? user.address : 'No address' }}</span>
            </div>
            <div class="py-10 d-flex justify-content-center">
              <b-button size="sm" class="mx-2 font-xs" variant="primary">
                <i class="zmdi zmdi-eye mx-10" />{{ $t('users.profile') }}
              </b-button>
              <b-button size="sm" class="mx-2 font-xs" variant="warning">
                <i class="zmdi zmdi-comments mx-10" />{{ $t('users.sendMessage') }}
              </b-button>
            </div>
          </app-card>
        </div>
      </template>
    </div>
    <div class="row">
      <div class="mb-20 paginate">
        <b-pagination align="center" :total-rows="100" :per-page="10" />
      </div>
    </div>
  </div>
</template>

<script>
import { users } from 'Assets/data/usersList.js'
export default {
  data() {
    return {
      users
    }
  }
}
</script>

<style scoped lang='scss'>
.address-block {
  span {
    i {
      margin-right: 1rem;
    }
  }
}
.paginate {
  width: 100%;
}
</style>
