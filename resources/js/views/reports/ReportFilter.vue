<template>
  <div class="db-header">
    <div class="filters">
      <div class="filter -dd" @click="openSelectDurationDialog">
        {{ $t("report.from") }}:
        <em>{{ startDate }} - {{ endDate }}</em>
      </div>

      <div class="filter -dd -cmenuw">
        <em>{{ bySelectedText }}</em>
        <div class="-cmenu -padding -no-icon">
          <div
            class="-item url"
            :class="{ active: 'created' === $route.query.by }"
            @click="handleFilterBy('created')"
          >{{ $t("report.by created dates") }}</div>
          <div
            class="-item url"
            :class="{ active: 'started' === $route.query.by }"
            @click="handleFilterBy('started')"
          >{{ $t("report.by started dates") }}</div>
          <div
            class="-item url"
            :class="{ active: 'deadline' === $route.query.by }"
            @click="handleFilterBy('deadline')"
          >{{ $t("report.by deadline") }}</div>
        </div>
      </div>

      <div class="filter -dd -cmenuw js-department">
        <em v-if="!$auth.isMember()">{{ departmentSelected }}</em>
        <em v-else>{{ department.name }}</em>
        <div class="-cmenu -padding -no-icon" v-if="!$auth.isMember()">
          <div
            class="-item url"
            :class="{ active: !$route.query.department }"
            @click="handleFilterByDepartment()"
          >{{ $t("report.all departments") }}</div>
          <el-tree
            :data="departments.data"
            :props="defaultProps"
            @node-click="handleFilterByDepartment"
          ></el-tree>
        </div>
      </div>

      <div class="filter"></div>

      <div class="filter"></div>
    </div>
  </div>
</template>

<script>
import moment from "moment";
import { mapActions, mapGetters } from "vuex";
import i18n from "../../lang";
import { flatten } from "../../helpers";
export default {
  name: "report-filter",
  props: {
    departments: { type: Object, default: {} },
    department: { type: Object, default: {} },
  },
  data() {
    return {
      start: "",
      end: "",
      by: "",
      department_id: "",
      defaultProps: {
        children: "children",
        label: "name",
      },
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
      return moment(this.start).locale(i18n.locale).format("L");
    },
    endDate() {
      return moment(this.end).locale(i18n.locale).format("L");
    },
    departmentSelected() {
      let departmentId = this.$route.query.department;
      if (this.departments.data) {
        const departments = flatten(this.departments.data);
        const department = departments.filter(
          (department) => department.id == departmentId
        );
        if (department[0]) return department[0].name;
        else return this.$t("report.all departments");
      }
    },
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
      this.getReports(query).then((response) => {
        if (!response.error) {
          this.$router
            .replace({
              query: { start, end, by: param, department },
            })
            .catch((err) => {});
        }
      });
    },
    handleFilterByDepartment(data = null) {
      let { start, end, by, department } = this.$route.query;
      let currentDate = moment().format("YYYY-MM-DD");
      let subtractOneMonth = moment()
        .subtract(1, "months")
        .format("YYYY-MM-DD");
      if (!start) start = subtractOneMonth;
      if (!end) end = currentDate;

      const query = { start, end, by, department };
      this.getReports(query).then((response) => {
        if (!response.error) {
          if (data == null) {
            this.$router
              .replace({ query: { start, end, by } })
              .catch((err) => {});
          } else {
            let department = data.id;
            this.$router
              .replace({
                query: { start, end, by, department },
              })
              .catch((err) => {});
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
    },
  },
  created() {
    this.getQueryParameters();
  },
  watch: {
    $route(to, from) {
      this.getQueryParameters();
    },
  },
};
</script>

<style>
#db-canvas .db-header .filter .-cmenu {
  width: auto;
}
</style>
