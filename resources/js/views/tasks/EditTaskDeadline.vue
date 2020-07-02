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
              <div class="title">{{ $t("tasks.set deadline") }}</div>
              <div class="side" @click="removeDeadline">
                <span class="action url">
                  {{
                  $t("tasks.remove deadline")
                  }}
                </span>
              </div>
              <div class="extra">
                <div class="row" style="padding-right:0px">
                  <div class="input">
                    <date-picker
                      v-model="date"
                      :input-props="{
                        placeholder: $t('tasks.choose date')
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
                  </div>
                  <div class="save" @click="handleUpdateTaskDeadline">{{ $t("common.save") }}</div>
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
import moment from "moment";
import { mapActions } from "vuex";
import { masks, message } from "../../helpers";
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
  computed: {
    masks() {
      return masks();
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
          this.$notify(
            message("success", this.$t("messages.updated successfully"))
          );
        }
      });
    },
    removeDeadline() {
      const id = this.taskEditing.id;
      this.updateTaskDeadline({ due_on: "", id }).then(response => {
        if (!response.error) {
          this.hideEditTaskDeadline();
          this.$notify(
            message("success", this.$t("messages.updated successfully"))
          );
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
