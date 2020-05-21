<template>
  <div class="db-header">
    <div class="filters">
      <div class="filter -dd" @click="openSelectDurationDialog">
        From:
        <em>{{ startDate }} - {{ endDate }}</em>
      </div>

      <div class="filter -dd -cmenuw">
        <em>{{ bySelectedText }}</em>
        <div class="-cmenu -padding -no-icon">
          <div
            v-for="(item, index) in listBy"
            :key="index"
            class="-item url"
            :class="{ active: item == $route.query.by }"
            @click="handleFilterBy(item)"
          >
            By {{ item }} dates
          </div>
        </div>
      </div>

      <div class="filter -dd -cmenuw js-department" v-if="$auth.isAdmin() || $auth.isLeader()">
        <em>All departments</em>

        <div class="-cmenu -padding -no-icon">
          <div class="-item url active" @click="handleFilterByDepartment()">
            All departments
          </div>
          <div
            class="-item url"
            v-for="department in departments"
            :key="department.id"
            @click="handleFilterByDepartment(department.id)"
          >
            {{ department.name }}
          </div>
        </div>
      </div>

      <div class="filter -dd -cmenuw js-assignees hidden">
        <em>Everyone</em>
        <div class="-cmenu -padding -no-icon">
          <div class="-item url active" data-urlparam="assignees" data-value>
            Everyone
          </div>
          <div class="-item" data-urlparam="assignees" data-value="custom">
            Choose assignees
          </div>
        </div>
      </div>

      <div class="filter"></div>

      <div class="filter"></div>
    </div>
  </div>
</template>

<script>
import moment from "moment";
import { mapActions } from "vuex";
export default {
  name: "report-filter",
  props: {
    departments: { type: Array, default: [] }
  },
  data() {
    return {
      start: "",
      end: "",
      by: "",
      department: "",
      listBy: ["created", "started", "deadline"]
    };
  },
  computed: {
    bySelectedText() {
      const { by } = this.$route.query;
      switch (by) {
        case "deadline":
          return "By deadline dates";
        case "started":
          return "By started dates";
        default:
          return "By created dates";
      }
    },
    startDate() {
      return moment(this.start).format("DD/MM/YYYY");
    },
    endDate() {
      return moment(this.end).format("DD/MM/YYYY");
    }
  },
  methods: {
    ...mapActions(["getReports"]),
    handleFilterBy(param) {
      let { start, end, by, department } = this.$route.query;
      let currentDate = moment().format("YYYY-MM-DD");
      let subtractOneMonth = moment()
        .subtract(1, "months")
        .format("YYYY-MM-DD");
      if (!start) start = subtractOneMonth;
      if (!end) end = currentDate;

      const query = { start, end, by, department };
      this.getReports(query).then(response => {
        if (!response.error) {
          this.$router
            .replace({
              query: { start, end, by: param, department }
            })
            .catch(err => {});
        }
      });
    },
    handleFilterByDepartment(departmentId = null) {
      let { start, end, by, department } = this.$route.query;
      let currentDate = moment().format("YYYY-MM-DD");
      let subtractOneMonth = moment()
        .subtract(1, "months")
        .format("YYYY-MM-DD");
      if (!start) start = subtractOneMonth;
      if (!end) end = currentDate;

      const query = { start, end, by, department };

      this.getReports(query).then(response => {
        if (!response.error) {
          if (departmentId == null) {
            this.$router
              .replace({
                query: { start, end, by }
              })
              .catch(err => {});
          } else {
            this.$router
              .replace({
                query: { start, end, by, department: departmentId }
              })
              .catch(err => {});
          }
        }
      });
    },
    openSelectDurationDialog() {
      this.$store.commit("TOGGLE_SELECT_DURATION_DIALOG");
    },
    getQueryParameters() {
      let currentDate = moment().format("YYYY-MM-DD");
      let subtractOneMonth = moment()
        .subtract(1, "months")
        .format("YYYY-MM-DD");
      this.start = this.$route.query.start
        ? this.$route.query.start
        : subtractOneMonth;
      this.end = this.$route.query.end ? this.$route.query.end : currentDate;
    }
  },
  created() {
    this.getQueryParameters();
  },
  watch: {
    $route(to, from) {
      this.getQueryParameters();
    }
  }
};
</script>

<style></style>
