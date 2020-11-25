<template>
  <div class="idb-right-panel" :class="sidebarOpen ? 'panel-show' : 'panel-hide'">
    <div class="chat-sidebar-pan">
      <div class="system-setting">
        <div class="setting-header">
          <i class="ti-settings px-2" />
          System
        </div>
        <ul class="list-style-none pl-0">
          <li class="d-flex justify-content-between">
            <div class="align-self-center">
              Notifications
            </div>
            <div class="onoffswitch align-self-center">
              <input id="switch-nofications" type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" checked>
              <label class="onoffswitch-label mb-0" for="switch-nofications">
                <span class="onoffswitch-inner" />
                <span class="onoffswitch-switch" />
              </label>
            </div>
          </li>
          <li class="d-flex justify-content-between">
            <div class="align-self-center">
              Quick Results
            </div>
            <div class="onoffswitch align-self-center">
              <input id="switch-results" type="checkbox" name="onoffswitch" class="onoffswitch-checkbox">
              <label class="onoffswitch-label mb-0" for="switch-results">
                <span class="onoffswitch-inner" />
                <span class="onoffswitch-switch" />
              </label>
            </div>
          </li>
          <li class="d-flex justify-content-between">
            <div class="align-self-center">
              Auto Updates
            </div>
            <div class="onoffswitch align-self-center">
              <input id="switch-updates" type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" checked>
              <label class="onoffswitch-label mb-0" for="switch-updates">
                <span class="onoffswitch-inner" />
                <span class="onoffswitch-switch" />
              </label>
            </div>
          </li>
        </ul>
      </div>
      <div class="system-setting account-settings">
        <div class="setting-header">
          <i class="ti-user px-2" />
          Account
        </div>
        <ul class="list-style-none pl-0">
          <li class="d-flex justify-content-between">
            <div class="align-self-center">
              Offline Mode
            </div>
            <div class="onoffswitch align-self-center">
              <input id="switch-offline" type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" checked>
              <label class="onoffswitch-label mb-0" for="switch-offline">
                <span class="onoffswitch-inner" />
                <span class="onoffswitch-switch" />
              </label>
            </div>
          </li>
          <li class="d-flex justify-content-between">
            <div class="align-self-center">
              Location Share
            </div>
            <div class="onoffswitch align-self-center">
              <input id="switch-share" type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" checked>
              <label class="onoffswitch-label mb-0" for="switch-share">
                <span class="onoffswitch-inner" />
                <span class="onoffswitch-switch" />
              </label>
            </div>
          </li>
          <li class="d-flex justify-content-between">
            <div class="align-self-center">
              Show Offline User
            </div>
            <div class="onoffswitch align-self-center">
              <input id="switch-active-user" type="checkbox" name="onoffswitch" class="onoffswitch-checkbox">
              <label class="onoffswitch-label mb-0" for="switch-active-user">
                <span class="onoffswitch-inner" />
                <span class="onoffswitch-switch" />
              </label>
            </div>
          </li>
          <li class="d-flex justify-content-between">
            <div class="align-self-center">
              Save History
            </div>
            <div class="onoffswitch align-self-center">
              <input id="switch-history" type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" checked>
              <label class="onoffswitch-label mb-0" for="switch-history">
                <span class="onoffswitch-inner" />
                <span class="onoffswitch-switch" />
              </label>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['sidebarOpen']
}
</script>
