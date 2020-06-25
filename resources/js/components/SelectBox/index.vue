<template>
  <div class="input data">
    <multiselect
      v-model="selected"
      label="name"
      track-by="id"
      :placeholder="placeholder"
      open-direction="bottom"
      :options="options"
      :searchable="true"
      :internal-search="true"
      :clear-on-select="true"
      :close-on-select="true"
      :options-limit="300"
      
      :max-height="600"
      :loading="isLoading"
      @search-change="asyncFind"
      @input="onChange"
      :multiple="multiple"
    >
      <template slot="option" slot-scope="props">
        <img
          class="option__image"
          :src="props.option.avatar"
          v-if="props.option.avatar"
        />
        <template v-if="props.option.avatar">
          <div class="option__desc">
            <span class="option__title">{{ props.option.name }}</span>
            <span v-if="props.option.position">-</span>
            <span class="option__small">{{ props.option.position }}</span>
          </div>
        </template>
        <template v-else>
          <span class="option__title">{{ props.option.name }}</span>
        </template>
      </template>
    </multiselect>
  </div>
</template>

<script>
import Multiselect from "vue-multiselect";
export default {
  name: "select-box",
  data() {
    return {
      selected: this.value
    };
  },
  props: {
    placeholder: { type: String, default: "" },
    options: { type: Array, default: () => [] },
    isLoading: { type: Boolean, default: false },
    multiple: { type: Boolean, default: false },
    value: { type: Object, default: null }
  },
  methods: {
    asyncFind(query) {
      this.$emit("search-change", query);
    },
    customLabel({ name, position }) {
      return `${name}`;
    },
    onChange() {
      this.$emit("input", this.selected);
    }
  },
  components: { Multiselect }
};
</script>

<style></style>
