<template>
  <div>
    <div id="header">
      <div class="nav">
        <span class="icon"></span>
      </div>

      <div class="title">
        <div class="icon -svg">
          <svg
            id="bd849dc0-3427-4956-9373-0a5fb9a4a002"
            data-name="Layer 1"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 14 14"
          >
            <title>icon music</title>
            <path
              d="M11.05,14a1.62,1.62,0,0,1-1.27-.61h0L7.51,10.62a.69.69,0,0,0-1,0L4.22,13.39a1.66,1.66,0,0,1-2.94-1.05V1.66A1.66,1.66,0,0,1,2.94,0h8.12a1.66,1.66,0,0,1,1.66,1.66V12.34A1.67,1.67,0,0,1,11.05,14Zm-.5-1.24a.64.64,0,0,0,.73.2.63.63,0,0,0,.44-.62V1.66A.66.66,0,0,0,11.06,1H2.94a.66.66,0,0,0-.66.66V12.34a.63.63,0,0,0,.44.62.64.64,0,0,0,.73-.2L5.71,10a1.71,1.71,0,0,1,2.58,0Z"
            />
          </svg>
        </div>

        <div class="name">Phòng ban</div>
      </div>

      <div class="main">
        <div class="tabs auto-active-url">
          <div class="tab url" data-url="depts">
            <span class="tab-label">Phòng ban</span>
          </div>
        </div>
      </div>

      <div class="side">
        <div class="search">
          <input type="text" placeholder="Lọc nhanh phòng ban" />
        </div>

        <div class="cta-edge url" onclick="Dept.create();">Tạo mới phòng ban</div>
      </div>
    </div>

    <div id="project-master" class="simple scroll-y forced-scroll">
      <div class="canvas">
        <div id="collection" class="compact">
          <div class="projects" id="js-depts" style="min-height:1300px; display:block; border:none">
            <department-item
              v-for="(item, index) in renderDepartments"
              v-bind:key="index"
              v-bind:department="item"
            />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import DepartmentItem from "./DepartmentItem";
export default {
  name: "departments",
  components: {
    DepartmentItem
  },
  created() {
    this.$store.dispatch("getDepartments");
  },
  computed: {
    ...mapGetters(["renderDepartments"])
  }
};
</script>

<style>
</style>
