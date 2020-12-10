<template>
  <user-grid :users="users" />
</template>

<script>
import UserGrid from 'Components/Widgets/UserGrid'
import { users } from 'Assets/data/usersList.js'
export default {
  components: {
    UserGrid
  },
  data() {
    return {
      users
    }
  }
}
</script>
