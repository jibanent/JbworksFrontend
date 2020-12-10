<template>
  <b-nav-item-dropdown right no-caret class="custom-dropdown lang language-wrap">
    <template slot="button-content">
      <img class="flag-img" :src="`/static/flag-icons/${selectedLocale.icon}.png`">
    </template>
    <b-dropdown-header class="gradient-primary text-white">Languages</b-dropdown-header>
    <b-dropdown-item v-for="language in languages" :key="language.locale" @click="changeLanguage(language)">
      <div class="icon-area">
        <img class="img-responsive" :src="`/static/flag-icons/${language.icon}.png`">
      </div>
      <small>{{ language.name }}</small>
    </b-dropdown-item>
  </b-nav-item-dropdown>
</template>

<script>
import { mapGetters } from 'vuex'
export default {
  computed: {
    ...mapGetters(['languages', 'selectedLocale'])
  },
  methods: {
    changeLanguage(language) {
      this.$i18n.locale = language.locale
      this.$store.dispatch('changeLanguage', language)
    }
  }
}
</script>
