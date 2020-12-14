<template>
  <div class="user-list-wrapper">
    <page-title-bar />
    <grid-view :users="users" />
    <div class="row">
      <div class="mb-20 paginate">
        <b-pagination align="center" :total-rows="100" :per-page="10" />
      </div>
    </div>
  </div>
</template>

<script>
import { users } from 'Assets/data/usersList.js'
import GridView from './grid-view'
export default {
  components: {
    GridView
  },
  data() {
    return {
      users
    }
  }
}
</script>

<style scoped lang='scss'>
.paginate {
  width: 100%;
}
</style>
