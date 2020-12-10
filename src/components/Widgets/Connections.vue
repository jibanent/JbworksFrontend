<template>
  <app-card custom-classes="connections" :heading="$t('message.connections')" :full-block="true">
    <b-list-group>
      <b-list-group-item
        v-for="connection in connections"
        :key="connection.id"
        class="d-flex align-items-center py-15 px-20"
      >
        <div class="avatar-wrap">
          <img :src="connection.userAvatar" class="rounded-circle" alt="user" width="45" height="45">
        </div>
        <div>
          <h6 class="mb-0">{{ connection.userName }}</h6>
          <span class="font-xs text-muted">{{ connection.designation }}</span>
        </div>
      </b-list-group-item>
    </b-list-group>
  </app-card>
</template>

<script>
import { connections } from 'Assets/data/connections.js'

export default {
  data() {
    return {
      connections
    }
  }
}
</script>
