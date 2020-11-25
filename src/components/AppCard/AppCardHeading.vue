<template>
  <div v-if="heading" class="idb-block-title" :class="blockTitleClass">
    <div class="d-flex justify-content-between align-items-center">
      <template v-if="redirectUrl">
        <a :href="redirectUrl">
          <h4 :class="headingColor">{{ heading }}</h4>
        </a>
      </template>
      <template v-else>
        <h4 :class="headingColor">
          {{ heading }}
        </h4>
      </template>
      <template v-if="!withTabs">
        <div v-if="headingMenu" class="idb-contextual-link">
          <b-dropdown variant="link" no-caret right text="Right align">
            <template slot="button-content">
              <i class="zmdi zmdi-more" />
            </template>
            <b-dropdown-item @click="$emit('onCollapse')">
              <i class="zmdi zmdi-fullscreen text-primary" />
              {{ 'Full Screen' }}
            </b-dropdown-item>
            <b-dropdown-item @click="$emit('onReload')">
              <i class="zmdi zmdi-refresh text-success" />
              {{ 'Reload' }}
            </b-dropdown-item>
            <b-dropdown-item @click="$emit('onClose')">
              <i class="zmdi zmdi-close text-danger" />
              {{ 'Close' }}
            </b-dropdown-item>
          </b-dropdown>
        </div>
      </template>
      <template v-else-if="showTodayBtn">
        <div class="d-flex justify-content-between align-items-center">
          <b-button variant="outline-secondary" size="sm" class="font-xs text-dark">
            <i class="zmdi zmdi-filter-list mx-10 font-sm text-dark" />
            {{ $t('message.today') }}
          </b-button>
        </div>
      </template>
      <template v-else>
        <div class="app-contextual-link">
          <ul class="custom-tab-wrap list-inline">
            <template v-for="(tab, key) in tabs">
              <li :key="key" @click="onChangeTab(key)">
                <a href="javascript:void(0)" class="fs-12 fw-semi-bold px-2 py-1 rounded mx-1" :class="[{ 'primary white--text': activeTab === key }]">{{ tab }}</a>
              </li>
            </template>
          </ul>
        </div>
      </template>
    </div>
  </div>
</template>

<script>
export default {
  props: [
    'heading',
    'headingColor',
    'headingMenu',
    'closeable',
    'reloadable',
    'blockTitleClass',
    'fullScreen',
    'onCollapse',
    'onReload',
    'onClose',
    'withTabs',
    'tabs',
    'onChangeTabCallback',
    'showTodayBtn',
    'redirectUrl'
  ],
  data() {
    return {
      activeTab: 0
    }
  },
  methods: {
    onChangeTab(value) {
      this.activeTab = value
      this.$emit('onChangeTabCallback', value)
    }
  }
}
</script>
