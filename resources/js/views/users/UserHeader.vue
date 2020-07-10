<template>
  <div id="header">
    <navbar />
    <div class="title">
      <div class="icon -svg"></div>
      <div class="name">{{ $t('users.member') }}</div>
    </div>
    <div class="main">
      <div class="tabs">
        <div class="tab active url -dd -cmenuw">{{ $t('users.members') }}</div>
      </div>
    </div>

    <div class="side">
      <search :placeholder="$t('users.search for members')" @search="handleSearch" />

      <div class="cta url" @click="openAddUserDialog" v-if="$auth.can('create new user')">
        <span class="-ap icon-plus2"></span>
        &nbsp; {{ $t('users.create a new member') }}
      </div>
    </div>
  </div>
</template>

<script>
import Search from "../../components/Search";
import Navbar from '../../layout/components/Navbar'
export default {
  name: "user-header",
  methods: {
    openAddUserDialog() {
      this.$store.commit("TOGGLE_ADD_USER_DIALOG");
    },
    handleSearch(search) {
      this.$emit("search", { search });
    }
  },
  components: { Search, Navbar }
};
</script>

<style>
</style>
