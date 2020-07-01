<template>
  <div id="ie-wrapper-global" class="ie-wrapper-global" v-if="showEditTaskDeadline">
    <div class="ie-close" @click="hideEditTaskDeadline"></div>
    <div class="ie-wrapper scroll-y">
      <div class="ie-close" @click="hideEditTaskDeadline"></div>
      <div
        class="ie-real-wrapper"
        :style="
          `padding-top:${coordinatesShowEditTaskDeadline.y}px;padding-left:${coordinatesShowEditTaskDeadline.x}px;`
        "
      >
        <div class="ie-close" @click="hideEditTaskDeadline"></div>
        <div class="ie-real">
          <div id="ie-body" class="ie-body" style="top: 0px; left: -30px;">
            <div class="cform">
              <div class="title">Chọn deadline</div>
              <div class="side" @click="removeDeadline">
                <span class="action url">Bỏ deadline</span>
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
                  <div class="save" @click="handleUpdateTaskDeadline">Lưu</div>
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
  name: "edit-task-deadline",
  props: {
    showEditTaskDeadline: { type: Boolean, default: false },
    coordinatesShowEditTaskDeadline: { type: Object, default: null },
    taskEditing: { type: Object, default: null }
  },
  data() {
    return {
      date: "",
      time: "23:59",
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
      this.date = task.due_on ? new Date(task.due_on) : "";
      this.time = task.due_on ? new Date(task.due_on).toTimeString() : "23:59";
    }
  },
  methods: {
    ...mapActions(["updateTaskDeadline"]),
    hideEditTaskDeadline() {
      this.$store.commit("TOGGLE_EDIT_TASK_DEADLINE");
    },
    handleUpdateTaskDeadline() {
      const date = this.date ? moment(this.date).format("YYYY-MM-DD") : "";
      const time = this.time ? this.time : "23:59";
      const due_on = date
        ? moment(`${date} ${time}`).format("YYYY-MM-DD HH:mm:ss")
        : "";
      const id = this.taskEditing.id;
      this.updateTaskDeadline({ due_on, id }).then(response => {
        if (!response.error) {
          this.hideEditTaskDeadline();
          this.$notify({
            group: "center",
            type: "success",
            text: "Cập nhật thành công!",
            position: "top center"
          });
        }
      });
    },
    removeDeadline() {
      const id = this.taskEditing.id;
      this.updateTaskDeadline({ due_on: "", id }).then(response => {
        if (!response.error) {
          this.hideEditTaskDeadline();
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
