<template>
  <div class="customer-list-wrapper">
    <page-title-bar />
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <app-card custom-classes="grid-b-space">
          <b-tabs ref="tabs" card>
            <b-tab title="Grid view" active>
              <grid-view />
            </b-tab>
            <b-tab title="Tree view">
              <tree-view />
            </b-tab>
          </b-tabs>
        </app-card>
      </div>
    </div>
  </div>

</template>

<script>
import GridView from './grid-view'
import TreeView from './tree-view'
export default {
  components: {
    GridView,
    TreeView
  }
}
</script>
