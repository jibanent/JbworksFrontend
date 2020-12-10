<template>
  <app-card :full-block="true" custom-classes="grid-b-space user-meta-details">
    <b-list-group>
      <b-list-group-item
        v-for="meta in metas"
        :key="meta.id"
        class="d-flex align-items-center py-15 px-20 justify-content-between"
      >
        <h5 class="mb-0">{{ meta.name }} :</h5>
        <b-badge class="badge-md" :variant="meta.class">{{ meta.counter }}</b-badge>
      </b-list-group-item>
    </b-list-group>
  </app-card>
</template>

<script>
export default {
  data() {
    return {
      metas: [
        {
          id: 1,
          name: 'Friends',
          counter: 255,
          class: 'primary'
        },
        {
          id: 2,
          name: 'Connections',
          counter: 1455,
          class: 'warning'
        },
        {
          id: 3,
          name: 'Follower',
          counter: 648,
          class: 'danger'
        },
        {
          id: 4,
          name: 'Posts',
          counter: 325,
          class: 'success'
        }
      ]
    }
  }
}
</script>
