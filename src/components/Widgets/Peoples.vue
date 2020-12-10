<template>
  <app-card custom-classes="peoples grid-b-space" :heading="$t('message.whoToFollow')" :full-block="true">
    <b-list-group>
      <b-list-group-item
        v-for="people in peoples"
        :key="people.id"
        class="d-flex d-block align-items-center py-15 px-20"
      >
        <div class="avatar-wrap">
          <img :src="people.avatar" class="rounded-circle" alt="user" width="45" height="45">
        </div>
        <div class="w-80">
          <div class="d-xl-flex justify-content-between mb-1 meta-info">
            <h6 class="w-50">{{ people.name }}</h6>
            <span class="font-xs text-muted w-50 d-block text-xl-right">{{ people.username }}</span>
          </div>
          <div class="follow-status">
            <b-badge v-if="people.status === 1" class="badge-md" variant="primary">{{ $t('message.following') }}
            </b-badge>
            <b-badge v-else class="badge-md" variant="danger">{{ $t('message.follow') }}</b-badge>
          </div>
        </div>
      </b-list-group-item>
    </b-list-group>
  </app-card>
</template>

<script>
export default {
  data() {
    return {
      peoples: [
        {
          id: 1,
          avatar: '/static/img/user-1.jpg',
          name: 'Marisol Bailey',
          username: '@marisol',
          status: 1
        },
        {
          id: 2,
          avatar: '/static/img/user-2.jpg',
          name: 'Karissa Armstrong',
          username: '@Karissa20',
          status: 1
        },
        {
          id: 3,
          avatar: '/static/img/user-3.jpg',
          name: 'Kendall Santos',
          username: '@kendall',
          status: 0
        },
        {
          id: 4,
          avatar: '/static/img/user-4.jpg',
          name: 'Josephine Guzman',
          username: '@jose',
          status: 0
        },
        {
          id: 5,
          avatar: '/static/img/user-5.jpg',
          name: 'Tracy Freeman',
          username: '@tracy4568',
          status: 1
        }
      ]
    }
  }
}
</script>
