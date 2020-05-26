<template>
  <div id="ie-wrapper-global" class="ie-wrapper-global" v-if="showEditTaskStartTime">
    <div class="ie-close" @click="hideEditTaskStartTime"></div>
    <div class="ie-wrapper scroll-y">
      <div class="ie-close" @click="hideEditTaskStartTime"></div>
      <div
        class="ie-real-wrapper"
        :style="`padding-top:${coordinatesShowEditTaskStartTime.y}px;padding-left:${coordinatesShowEditTaskStartTime.x}px;`"
      >
        <div class="ie-close" @click="hideEditTaskStartTime"></div>
        <div class="ie-real">
          <div id="ie-body" class="ie-body" style="top: 0px; left: -30px;">
            <div class="cform">
              <div class="title">Chọn tg bắt đầu</div>
              <div class="side" @click="removeStartTime">
                <span class="action url">Xóa tg bắt đầu</span>
              </div>
              <div class="extra">
                <div class="row" style="padding-right:0px">
                  <div class="input">
                    <date-picker
                      v-model="date"
                      :input-props="{
                        placeholder: 'chọn ngày'
                      }"
                      :masks="masks"
                      :popover="popover"
                    />
                  </div>
                </div>
                <div class="sep-10"></div>
                <div class="row">
                  <div class="input __timeselectw">
                    <vue-timepicker v-model="time" />
                    <div class="__hiddenselect" style="position:absolute; top: 0px; left: 0px">
                      <div class="-tstitle">
                        Select time
                        <span class="-tsclose">
                          <span class="-ap icon-close"></span>
                        </span>
                      </div>
                      <div class="-tsbox -first" data-name="hour">
                        <div class="-tsn -up">
                          <span class="-ap icon-chevron-thin-up"></span>
                        </div>
                        <div class="-tsn -down">
                          <span class="-ap icon-chevron-thin-down"></span>
                        </div>
                        <div class="-tslabel">
                          <div class="-tsinput -hour">23</div>
                        </div>
                      </div>
                      <div class="-tsbox -second" data-name="min">
                        <div class="-tsn -up">
                          <span class="-ap icon-chevron-thin-up"></span>
                        </div>
                        <div class="-tsn -down">
                          <span class="-ap icon-chevron-thin-down"></span>
                        </div>
                        <div class="-tslabel">
                          <div class="-tsinput -min">59</div>
                        </div>
                      </div>
                      <div class="-tsr">:</div>
                      <div class="clear"></div>
                    </div>
                  </div>
                  <div class="save" @click="handleUpdateTaskStartTime">Lưu</div>
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
import DatePicker from "v-calendar/lib/components/date-picker.umd";
import VueTimepicker from "vue2-timepicker";
import "vue2-timepicker/dist/VueTimepicker.css";
import { viDateFormat } from "../../constants";
import moment from "moment";
import { mapActions } from "vuex";
export default {
  name: "edit-task-start-time",
  props: {
    showEditTaskStartTime: { type: Boolean, default: false },
    coordinatesShowEditTaskStartTime: { type: Object, default: null },
    taskEditing: { type: Object, default: null }
  },
  data() {
    return {
      date: "",
      time: "00:00",
      masks: {
        input: viDateFormat
      },
      popover: {
        visibility: "focus"
      }
    };
  },
  watch: {
    taskEditing(task) {
      this.date = task.start_date ? new Date(task.start_date) : "";
      this.time = task.start_date
        ? new Date(task.start_date).toTimeString()
        : "00:00";
    }
  },
  methods: {
    ...mapActions(["updateTaskStartTime"]),
    hideEditTaskStartTime() {
      this.$store.commit("TOGGLE_EDIT_TASK_START_TIME");
    },
    handleUpdateTaskStartTime() {
      const date = this.date ? moment(this.date).format("YYYY-MM-DD") : "";
      const time = this.time ? this.time : "23:59";
      const start_date = date
        ? moment(`${date} ${time}`).format("YYYY-MM-DD HH:mm:ss")
        : "";
      const id = this.taskEditing.id;
      this.updateTaskStartTime({ start_date, id }).then(response => {
        if (!response.error) {
          this.hideEditTaskStartTime();
          this.$notify({
            group: "center",
            type: "success",
            text: "Cập nhật thành công!",
            position: "top center"
          });
        }
      });
    },
    removeStartTime() {
      const id = this.taskEditing.id;
      this.updateTaskStartTime({ start_date: "", id }).then(response => {
        if (!response.error) {
          this.hideEditTaskStartTime();
          this.$notify({
            group: "center",
            type: "success",
            text: "Cập nhật thành công!",
            position: "top center"
          });
        }
      });
    }
  },
  components: {
    DatePicker,
    VueTimepicker
  }
};
</script>

<style></style>
