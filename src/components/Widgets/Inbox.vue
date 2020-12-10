<template>
  <div class="idb-block inbox-widget overflow-hide">
    <div class="idb-block-title d-flex justify-content-between align-items-center">
      <h4>{{ $t('message.inbox') }}</h4>
      <b-button variant="danger" size="sm" class="text-capitalize">{{ $t('message.compose') }}</b-button>
    </div>
    <div class="idb-full-block">
      <div class="custom-search d-flex align-items-center border-bottom">
        <input type="text" class="searchIn-inbox form-control border-0" placeholder="Search for...">
        <span class="w-10 text-center">
          <i class="zmdi zmdi-search" />
        </span>
      </div>
      <b-tabs>
        <b-tab :title="$t('message.all')">
          <vue-perfect-scrollbar :settings="settings" style="height:355px">
            <b-list-group>
              <b-list-group-item
                v-for="(messages, index) in allMessages"
                :key="index"
                class="d-flex align-items-center py-15 px-20"
              >
                <div class="d-flex align-items-center task-wrap w-80">
                  <div class="mr-20">
                    <label class="custom-control custom-checkbox m-0">
                      <input type="checkbox" class="custom-control-input" value="on">
                      <span class="custom-control-indicator" />
                    </label>
                  </div>
                  <div>
                    <span class="fs-12 mb-2 d-block text-muted">{{ messages.email }}</span>
                    <h6 class="mb-0">{{ messages.desc }}</h6>
                  </div>
                </div>
                <div class="d-flex justify-content-end w-20">
                  <a href="javascript:void(0)" class="icon-btn">
                    <i class="zmdi zmdi-star-outline" />
                  </a>
                </div>
              </b-list-group-item>
            </b-list-group>
          </vue-perfect-scrollbar>
        </b-tab>
        <b-tab :title="$t('message.unread')">
          <vue-perfect-scrollbar :settings="settings" style="height:355px">
            <b-list-group>
              <b-list-group-item
                v-for="(unreadMsg, index) in unreadMessages"
                :key="index"
                class="d-flex align-items-center py-15 px-20"
              >
                <div class="d-flex align-items-center task-wrap w-80">
                  <div class="mr-20">
                    <label class="custom-control custom-checkbox m-0">
                      <input type="checkbox" class="custom-control-input" value="on">
                      <span class="custom-control-indicator" />
                    </label>
                  </div>
                  <div>
                    <span class="fs-12 mb-2 d-block text-muted">{{ unreadMsg.email }}</span>
                    <h6 class="mb-0">{{ unreadMsg.desc }}</h6>
                  </div>
                </div>
                <div class="d-flex justify-content-end w-20">
                  <a href="javascript:void(0)" class="icon-btn">
                    <i class="zmdi zmdi-star-outline" />
                  </a>
                </div>
              </b-list-group-item>
            </b-list-group>
          </vue-perfect-scrollbar>
        </b-tab>
      </b-tabs>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      allMessages: [
        {
          email: 'support@theironnetwork.org | sep 11',
          desc: 'Create new profile request.'
        },
        {
          email: 'support@theironnetwork.org | sep 11',
          desc: 'Create new profile request.'
        },
        {
          email: 'support@theironnetwork.org | sep 11',
          desc: 'New project requirement as per discussed.'
        },
        {
          email: 'support@theironnetwork.org | sep 11',
          desc: 'Create new profile request.'
        },
        {
          email: 'support@theironnetwork.org | sep 11',
          desc: 'New project requirement as per discussed.'
        },
        {
          email: 'support@theironnetwork.org | sep 11',
          desc: 'Create new profile request.'
        }
      ],
      unreadMessages: [
        {
          email: 'support@theironnetwork.org | sep 11',
          desc: 'New project requirement as per discussed.'
        },
        {
          email: 'support@theironnetwork.org | sep 11',
          desc: 'New project requirement as per discussed.'
        },
        {
          email: 'support@theironnetwork.org | sep 11',
          desc: 'Create new profile request.'
        },
        {
          email: 'support@theironnetwork.org | sep 11',
          desc: 'New project requirement as per discussed.'
        },
        {
          email: 'support@theironnetwork.org | sep 11',
          desc: 'Create new profile request.'
        },
        {
          email: 'support@theironnetwork.org | sep 11',
          desc: 'New project requirement as per discussed.'
        }
      ],
      settings: {
        maxScrollbarLength: 100
      }
    }
  }
}
</script>
