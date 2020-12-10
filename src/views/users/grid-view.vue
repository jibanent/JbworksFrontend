<template>
  <user-grid :users="users" />
</template>

<script>
import UserGrid from 'Components/Widgets/UserGrid'
export default {
  components: {
    UserGrid
  },
  props: ['users']
}
</script>

<style>

</style>
