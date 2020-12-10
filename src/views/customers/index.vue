<template>
  <div class="customer-list-wrapper">
    <page-title-bar />
    <div class="row align-items-stretch">
      <div class="col-half-lg-block col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-b-space">
        <div class="custom-search-wrap px-4 py-30 idb-block">
          <div class="row align-items-stretch">
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
              <div class="d-sm-flex align-items-center">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search this blog">
                  <div class="input-group-append">
                    <button class="btn btn-secondary" type="button">
                      <i class="fa fa-search" />
                    </button>
                  </div>
                </div>
                <div class="action-btn-wrap ml-3">
                  <b-button variant="primary" class="d-inline-flex align-items-center text-capitalize">Add<i
                    class="material-icons btn-icon ml-1"
                  >add</i></b-button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="d-flex align-items-center justify-content-between pb-40 pt-3 float-right">
      <div class="project-icon float-right">
        <b-button class="btn-icon" :class="{active: selectedView == 'grid'}" @click="gridView()">
          <i class="zmdi zmdi-apps" />
        </b-button>
        <b-button class="btn-icon" :class="{active: selectedView == 'list'}" @click="listView()">
          <i class="zmdi zmdi-view-list-alt icon" />
        </b-button>
      </div>
    </div>
    <div class="clearfix" />
    <div class="row align-items-stretch">
      <div class="col-half-lg-block col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-b-space">
        <app-card custom-classes="grid-b-space">
          <grid-view v-if="selectedView == 'grid'" />
          <tree-view v-else />
          <div class="mb-20 paginate">
            <b-pagination align="center" :total-rows="100" :per-page="10" />
          </div>
        </app-card>
      </div>
    </div>
    <!-- <div v-else>
      <app-card custom-classes="mb-0" :full-block="true">
        <tree-view />
      </app-card>
    </div> -->
    <!-- <div class="row">
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
    </div> -->
  </div>

</template>

<script>
import GridView from './grid-view'
import TreeView from './tree-view'
export default {
  components: {
    GridView,
    TreeView
  },
  data() {
    return {
      selectedView: 'grid'
    }
  },
  methods: {
    listView() {
      // this.viewType = 'projectList'
      this.selectedView = 'list'
    },
    gridView() {
      // this.viewType = 'projectGrid'
      this.selectedView = 'grid'
    }
  }
}
</script>