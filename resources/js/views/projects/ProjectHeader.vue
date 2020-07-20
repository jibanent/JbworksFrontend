<template>
  <div id="header">
    <navbar />

    <div class="title">
      <div class="icon -svg">
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12.006" viewBox="0 0 14 12.006">
          <g id="File" transform="translate(-21 -329.991)">
            <g id="Group_3575" data-name="Group 3575" transform="translate(-1675.011 297)">
              <g id="Path_23841" data-name="Path 23841" transform="translate(1742.011 90)">
                <path
                  id="Path_23875"
                  data-name="Path 23875"
                  d="M-33.5-45h-11A1.5,1.5,0,0,1-46-46.5v-7a.5.5,0,0,1,.5-.5h12A1.5,1.5,0,0,1-32-52.5v6A1.5,1.5,0,0,1-33.5-45ZM-45-53v6.5a.5.5,0,0,0,.5.5h11a.5.5,0,0,0,.5-.5v-6a.5.5,0,0,0-.5-.5Z"
                />
              </g>
              <g id="Path_23834" data-name="Path 23834" transform="translate(1742.011 90)">
                <path
                  id="Path_23876"
                  data-name="Path 23876"
                  d="M-36.5-53.009h-9a.5.5,0,0,1-.5-.5v-2a1.5,1.5,0,0,1,1.5-1.5h4.494A2.008,2.008,0,0,1-38-55c0,.539.687,1,1.5,1a.5.5,0,0,1,.5.5A.5.5,0,0,1-36.5-53.009Zm-8.5-1h6.333A1.682,1.682,0,0,1-39-55a1.006,1.006,0,0,0-1.005-1H-44.5a.5.5,0,0,0-.5.5Z"
                />
              </g>
            </g>
          </g>
        </svg>
      </div>
      <div class="name">Dự án</div>
    </div>

    <div class="main">
      <div class="tabs auto-active-url" v-if="currentUser">
        <router-link
          :to="{name: 'projects', params: {currentUserId: currentUser.id}}"
          class="tab url"
          exactActiveClass="active"
        >
          <span class="tab-label">{{ $t('projects.projects') }}</span>
        </router-link>
        <router-link
          to="/projects/admin"
          class="tab url"
          exactActiveClass="active"
          v-if="$auth.isAdmin()"
        >
          <span class="tab-label">{{ $t('projects.for admin') }}</span>
        </router-link>
      </div>
    </div>

    <div class="side">
      <div class="buttons" v-if="!$auth.isMember()">
        <div class="button url" @click="openProjectAdd">{{ $t('projects.create a new project') }}</div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import Navbar from "../../layout/components/Navbar";
export default {
  name: "project-header",
  computed: {
    ...mapGetters(["currentUser"])
  },
  methods: {
    openProjectAdd() {
      this.$store.commit("TOGGLE_PROJECT_ADD");
    }
  },
  components: { Navbar }
};
</script>

<style>
</style>
