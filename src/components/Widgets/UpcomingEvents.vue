<template>
  <div>
    <b-list-group>
      <b-list-group-item
        v-for="( events, index ) in upcomingEvents"
        :key="index"
        class="d-flex justify-content-between align-items-center px-0 mb-0 rounded-0"
      >
        <div>
          <h5 class="mb-1">{{ events.title }}</h5>
          <span class="mr-3 fs-12 text-muted">{{ events.dateAndCity }}</span>
        </div>
        <div><a href="javascript:void(0)" class="fs-12 bg-grey rounded p-1 px-2">{{ events.label }}</a></div>
      </b-list-group-item>
    </b-list-group>
  </div>
</template>

<script>
export default {
  data() {
    return {
      upcomingEvents: [
        {
          title: 'Marketing Seminar',
          dateAndCity: '28th April, Mumbai',
          label: 'Email'
        },
        {
          title: 'Strategy Planning',
          dateAndCity: '22th May, Delhi',
          label: 'Phone'
        },
        {
          title: 'Hiring Personals',
          dateAndCity: '29th May, Delhi',
          label: 'Skype'
        },
        {
          title: 'Training',
          dateAndCity: '30th May, Delhi',
          label: 'Email'
        }
      ]
    }
  }
}
</script>
