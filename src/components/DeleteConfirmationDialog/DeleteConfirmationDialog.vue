<template>
  <div class="delete-confirmation-dialog">
    <b-modal v-model="open" max-width="500" hide-footer hide-header :title="heading" centered>
      <div class="d-block py-4 text-center">
        <h3>{{ message }}</h3>
      </div>
      <div class="d-flex align-items-center justify-content-center">
        <b-btn class="mr-3 mb-3 px-3 text-capitalize" variant="primary" size="sm" @click="open = false">Cancel
        </b-btn>
        <b-btn class="mb-3 px-3 text-capitalize" variant="danger" size="sm" @click="$emit('onConfirm')">Yes</b-btn>
      </div>
    </b-modal>
  </div>
</template>

<script>
export default {
  props: ['heading', 'message', 'onConfirm'],
  data() {
    return {
      open: false
    }
  },
  methods: {
    openDialog() {
      this.open = true
    },
    close() {
      this.open = false
    }
  }
}
</script>
