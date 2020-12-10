<template>
  <app-card custom-classes="grid-b-space" :full-block="true" content-custom-class="text-center pt-20 user-profile-block">
    <div class="avatar-wrap pos-relative d-inline-block mb-15">
      <img src="/static/img/user-1.jpg" class="img-fluid rounded-circle" alt="user thumb" width="100" height="100">
      <span class="badge badge-success badge-label-sm badge-thumb-top-right badge-pill fa-notify">&nbsp;</span>
    </div>
    <div class="mb-20 user-info">
      <h4 class="mb-0">Gerald Vaughn</h4>
      <span class="text-muted font-xs">Freelance Designer, Previously TapQ</span>
    </div>
    <b-list-group class="mb-20">
      <b-list-group-item
        v-for="profile in profile"
        :key="profile.title"
        class="d-flex align-items-center py-15 px-20 justify-content-between"
      >
        <h5 class="m-0">{{ profile.title }} :</h5>
        <h6 class="mb-0">{{ profile.details }}</h6>
      </b-list-group-item>
    </b-list-group>
    <div class="address-block px-20">
      <span class="font-sm d-block mb-10"><i class="zmdi zmdi-account" />Gerald Vaugn</span>
      <span class="font-sm d-block mb-10"><i class="zmdi zmdi-email" />geraldv@example.com</span>
      <span class="font-sm d-block mb-10"><i class="zmdi zmdi-phone" />(01) 234 567 8901</span>
      <span class="font-sm d-block mb-10"><i class="zmdi zmdi-pin" />E51, Industrial Area, Phase 2, Mohali,
        Punjab.</span>
    </div>
    <div class="map overflow-hide p-15">
      <gmap-map :center="center" :zoom="9" style="width: '100%'; height: 300px">
        <gmap-marker
          :position="markers.position"
          :clickable="true"
          :draggable="true"
          @click="center=markers.position"
        />
      </gmap-map>
    </div>
  </app-card>
</template>

<script>
export default {
  data: function() {
    return {
      profile: [
        {
          title: 'Followers',
          details: '1,097'
        },
        {
          title: 'Online Status',
          details: 'Offline'
        },
        {
          title: 'Last Seen',
          details: '2 Days ago'
        },
        {
          title: 'Last Updated',
          details: 'A Month ago'
        },
        {
          title: 'Connections ',
          details: '2,097'
        }
      ],
      center: { lat: 30.7, lng: 76.7 },
      markers: {
        position: { lat: 30.7, lng: 76.7 }
      }
    }
  }
}
</script>
