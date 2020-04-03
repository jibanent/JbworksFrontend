<template>
  <div id="app" class="screen-hd">
    <notifications group="notify" />
    <sidebar v-if="isRenderSidebar" />
    <div id="master">
      <router-view @openModal="openModal"></router-view>
    </div>
    <user-form-modal v-if="showModal" @closeModal="closeModal" />
    <loading v-bind:class="{ show: isLoading }" />
  </div>
</template>

<script>
import Sidebar from "./common/Sidebar";
import UserFormModal from "./users/UserFormModal";
import Loading from "./common/Loading";
import { mapState } from "vuex";
export default {
  name: "app",
  components: {
    UserFormModal,
    Sidebar,
    Loading
  },
  data() {
    return {
      showModal: false
    };
  },
  computed: {
    ...mapState(["isLoading", "currentUser"]),
    isRenderSidebar() {
      const arrRoutes = ["login", "not-found"];
      if (arrRoutes.indexOf(this.$route.name) !== -1) return false;
      return true;
    }
  },
  methods: {
    openModal() {
      this.showModal = true;
    },
    closeModal() {
      this.showModal = false;
    }
  }
};
</script>
