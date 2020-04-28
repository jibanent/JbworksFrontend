<template>
  <div id="apdialogs" style="display: block;" v-if="showSelectDurationDialog">
    <div class="__fdialog __temp __dialog __dialog_ontop">
      <div class="__fdialogwrapper scroll-y forced-scroll">
        <div class="__dialogwrapper" style="top: 126.5px; left: 700px;">
          <div class="__dialogwrapper-inner">
            <div class="__dialogmain">
              <div class="__dialogtitlewrap">
                <div class="left relative">
                  <div class="__dialogtitle unselectable ap-xdot">
                    Select duration
                  </div>
                  <div class="__dialogtitlerender tx-fill"></div>
                </div>
                <div class="clear"></div>
              </div>
              <div class="__dialogclose" @click="closeSelectDurationDialog">
                <span class="-ap icon-close"></span>
              </div>
              <div class="__dialogcontent">
                <div class="__apdialog">
                  <div class="form form-dialog -flat">
                    <form method="get">
                      <div class="row -istext -active">
                        <div class="label">Start date *</div>
                        <div class="input data">
                          <span
                            class="-ap icon-uniF1072"
                            style="position: absolute; right:10px; top:10px; color:#aaa; font-size:16px;"
                          ></span>
                          <datepicker
                            name="start"
                            input-class="std hasDatepicker"
                            placeholder="Start date"
                            format="dd/MM/yyyy"
                            :value="startDate"
                            @input="startDate = formatDate($event)"
                          ></datepicker>
                          <div class="error" v-if="errors[0]">
                            {{ errors[0] }}
                          </div>
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="row -istext -active">
                        <div class="label">End date *</div>
                        <div class="input data">
                          <span
                            class="-ap icon-uniF1072"
                            style="position: absolute; right:10px; top:10px; color:#aaa; font-size:16px;"
                          ></span>
                          <datepicker
                            name="end"
                            input-class="std hasDatepicker"
                            placeholder="End date"
                            format="dd/MM/yyyy"
                            :value="endDate"
                            @input="endDate = formatDate($event)"
                          ></datepicker>
                          <div class="error" v-if="errors[1]">
                            {{ errors[1] }}
                          </div>
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="form-buttons -two">
                        <div
                          @click="checkForm"
                          class="button ok -success -rounded bold"
                        >
                          Okay
                        </div>
                        <div
                          class="button cancel -passive-2 -rounded"
                          @click="closeSelectDurationDialog"
                        >
                          Hủy
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Datepicker from "vuejs-datepicker";
import moment from "moment";
import { mapState, mapActions } from "vuex";
export default {
  name: "select-duration-dialog",
  data() {
    return {
      startDate: moment()
        .subtract(1, "months")
        .format("YYYY-MM-DD"),
      endDate: moment().format("YYYY-MM-DD"),
      errors: []
    };
  },
  computed: {
    ...mapState({
      showSelectDurationDialog: state => state.reports.showSelectDurationDialog
    })
  },
  methods: {
    ...mapActions(["getReports"]),
    closeSelectDurationDialog() {
      this.$store.commit("TOGGLE_SELECT_DURATION_DIALOG");
    },
    formatDate(event) {
      return moment(event).format("YYYY-MM-DD");
    },
    checkForm() {
      this.errors = [];
      if (this.startDate === "Invalid date") {
        this.errors.push("Ngày bắt đầu không hợp lệ");
      }
      if (this.endDate === "Invalid date") {
        this.errors.push("Ngày kết thúc không hợp lệ");
      }

      if (!this.errors.length) {
        this.$store.commit("TOGGLE_SELECT_DURATION_DIALOG");
        let { by, department } = this.$route.query;

        const query = { start: this.startDate, end: this.endDate };
        this.getReports(query).then(response => {
          if (!response.error) {
            this.$router
              .replace({
                query: {
                  start: this.startDate,
                  end: this.endDate,
                  by,
                  department
                }
              })
              .catch(err => {});
          }
        });
      }
    }
  },
  components: {
    Datepicker
  }
};
</script>

<style scoped>
.error {
  margin-top: 5px;
  color: red;
}
</style>
