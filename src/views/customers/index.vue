<template>
  <!-- <div class="row align-items-stretch">
    <div class="col-half-lg-block col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-b-space">
      <app-card>
        <div class="clients-list-wrap ">
          <b-tabs>
            <b-tab :title="$t('message.allClients')">
              <div class="row">
                <template v-for="(details,tabName,index) in clientData">
                  <div
                    v-for="(details,keyy,i) in clientData[tabName]"
                    :key="i"
                    class="mb-30 col-12 col-sm-6 col-md-4 col-lg-3"
                  >
                    <app-card custom-classes="mb-0 client-item">
                      <div :key="index" class="text-center position-relative">
                        <div class="thumb-wrap mb-3 ">
                          <img :src="details.image" class="rounded-lg">
                        </div>
                        <div class="client-content">
                          <h4 class="mb-2 text-primary">{{ details.name }}</h4>
                          <div class="contact-links text-truncate mb-1 fs-14">
                            <a class="" href="javascript:void(0)">{{ details.e_mail }}</a>
                          </div>
                          <div class="contact-links fs-14 text-truncate mb-1">
                            <a class="" href="javascript:void(0)">{{ details.phone_number }}</a>
                          </div>
                          <div class="fs-14 text-truncate mb-1">{{ details.country }}</div>
                        </div>
                        <div class="action-btn-wrap">
                          <b-button class="border-0" @click="onEditClients(details,tabName)"><i
                            class="material-icons"
                          >edit</i></b-button>
                          <b-button class="border-0" @click="onDeleteClients(details,tabName)"><i
                            class="material-icons"
                          >delete</i></b-button>
                        </div>
                      </div>
                    </app-card>
                  </div>
                </template>
              </div>
            </b-tab>
          </b-tabs>
        </div>
      </app-card>
    </div>
  </div> -->
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <app-card custom-classes="grid-b-space">
        <b-tabs ref="tabs" card>
          <b-tab title="Grid view">
            <grid-view />
          </b-tab>
          <b-tab title="Tree view">
            Tree view here
          </b-tab>
        </b-tabs>
      </app-card>
    </div>
  </div>
</template>

<script>
import gridView from './grid-view'
export default {
  components: {
    gridView
  }
}
</script>
