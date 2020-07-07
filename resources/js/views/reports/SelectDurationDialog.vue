<template>
  <div id="apdialogs" style="display: block;" v-if="showSelectDurationDialog">
    <div class="__fdialog __temp __dialog __dialog_ontop">
      <div class="__fdialogwrapper scroll-y forced-scroll">
        <div class="__dialogwrapper">
          <div class="__dialogwrapper-inner">
            <div class="__dialogmain">
              <div class="__dialogtitlewrap">
                <div class="left relative">
                  <div class="__dialogtitle unselectable ap-xdot">{{ $t('report.select duration') }}</div>
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
                    <form @submit.prevent="checkForm">
                      <div class="row -istext -active">
                        <div class="label">{{ $t('projects.start date') }} *</div>
                        <div class="input data">
                          <span
                            class="-ap icon-uniF1072"
                            style="position: absolute; right:10px; top:10px; color:#aaa; font-size:16px;"
                          ></span>
                          <date-picker
                            v-model="startDate"
                            :input-props="{
                              class: 'std hasDatepicker',
                              placeholder: $t('projects.start date')
                            }"
                            :masks="masks"
                            :popover="popover"
                          />
                          <div class="error" v-if="errors[0]">{{ errors[0] }}</div>
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="row -istext -active">
                        <div class="label">{{ $t('projects.end date') }} *</div>
                        <div class="input data">
                          <span
                            class="-ap icon-uniF1072"
                            style="position: absolute; right:10px; top:10px; color:#aaa; font-size:16px;"
                          ></span>
                          <date-picker
                            v-model="endDate"
                            :input-props="{
                              class: 'std hasDatepicker',
                              placeholder: $t('projects.end date')
                            }"
                            :masks="masks"
                            :popover="popover"
                          />
                          <div class="error" v-if="errors[1]">{{ errors[1] }}</div>
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="form-buttons -two">
                        <button
                          type="submit"
                          class="button ok -success -rounded bold"
                        >{{ $t('common.ok') }}</button>
                        <div
                          class="button cancel -passive-2 -rounded"
                          @click="closeSelectDurationDialog"
                        >{{ $t('common.cancel') }}</div>
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
// import Datepicker from "vuejs-datepicker";
import DatePicker from "v-calendar/lib/components/date-picker.umd";
import moment from "moment";
import { mapState, mapActions } from "vuex";
import i18n from "../../lang";
import { masks } from "../../helpers";
export default {
  name: "select-duration-dialog",
  data() {
    return {
      startDate: "",
      endDate: "",
      errors: [],
      popover: {
        visibility: "focus"
      }
    };
  },
  created() {
    this.startDate = new Date(moment().subtract(1, "month"));
    this.endDate = new Date(moment());
  },
  computed: {
    ...mapState({
      showSelectDurationDialog: state => state.reports.showSelectDurationDialog
    }),
    masks() {
      return masks();
    }
  },
  methods: {
    ...mapActions(["getReports"]),
    closeSelectDurationDialog() {
      this.$store.commit("TOGGLE_SELECT_DURATION_DIALOG");
    },
    checkForm() {
      this.errors = [];
      if (!this.startDate) {
        this.errors.push("The start date field is required.");
      }
      if (!this.endDate) {
        this.errors.push("The end date field is required.");
      }
      if (!this.errors.length) {
        this.$store.commit("TOGGLE_SELECT_DURATION_DIALOG");
        let { by, department } = this.$route.query;
        const start = moment(this.startDate).format("YYYY-MM-DD");
        const end = moment(this.endDate).format("YYYY-MM-DD");
        const query = { start, end };
        this.getReports(query).then(response => {
          if (!response.error) {
            this.$router
              .replace({
                query: {
                  start: moment(this.startDate).format("YYYY-MM-DD"),
                  end: moment(this.endDate).format("YYYY-MM-DD"),
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
    // Datepicker,
    DatePicker
  }
};
</script>

<style scoped>
.error {
  margin-top: 5px;
  color: red;
}
</style>
