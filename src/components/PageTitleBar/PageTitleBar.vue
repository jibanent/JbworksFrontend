<template>
  <app-card custom-classes="page-title rounded-0">
    <h5 v-if="$route.name == 'Project Details'" class="text-capitalize mb-0">{{ $t(pageBreadcrumbs) }} / {{ $route.params.id }}</h5>
    <h5 v-else class="text-capitalize mb-0">
      {{ $t(pageBreadcrumbs) }}
    </h5>
  </app-card>
</template>

<script>
export default {
  computed: {
    // computed property to get page breadcrumbs
    pageTitle() {
      return this.$breadcrumbs[0].meta.title
    },
    pageBreadcrumbs() {
      return this.$breadcrumbs[0].meta.breadcrumb
    }
  }
}
</script>
