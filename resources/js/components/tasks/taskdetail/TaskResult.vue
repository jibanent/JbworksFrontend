<template>
  <div class="section task-result" :class="{editing: isShowResultForm}" v-if="task">
    <div class="top">
      <div class="completion-slider" v-if="task">
        <p class="slider-value">{{ percentCompleteValue }}%</p>
        <vue-slider
          v-bind:value="task.percent_complete"
          v-on:change="handleSlider($event)"
          v-on:drag-end="dragEnd"
          v-bind="options"
          :disabled="task.status.slug === 'done'"
        />
      </div>Kết quả công việc
    </div>
    <div class="postform" :class="{hidden: !task.result}">
      <div class="textarea -wc-1">
        <div class="completion">
          <div class="label">Hoàn thành</div>
          <span style="font-size: 24px">{{ percentCompleteValue }}%</span>
          <div class="bar">
            <div class="b" :style="`width: ${percentCompleteValue}%`"></div>
          </div>
        </div>
        <textarea
          rows="5"
          placeholder="Cập nhật kết quả công việc"
          v-bind:value="task.result"
          v-on:input="result = $event.target.value"
        ></textarea>
      </div>
      <div class="display">
        <div class="content">{{ task.result }}</div>
      </div>
      <div class="submit">
        <div class="button js-result-save -cta" @click="handleUpdateTaskResult">Lưu</div>
        <div class="button js-result-cancel -cancel" @click="toggleResultForm">Bỏ qua</div>
      </div>
      <div class="files"></div>
    </div>
    <div class="cta-block" v-if="$auth.can('edit task result')">
      <span
        class="a normal std js-result-clickable"
        @click="toggleResultForm"
      >Cập nhật kết quả công việc</span>
    </div>
  </div>
</template>

<script>
import VueSlider from "vue-slider-component";
import "vue-slider-component/theme/antd.css";
import { mapActions } from "vuex";
export default {
  name: "task-result",
  props: {
    task: { type: Object, default: null }
  },
  watch: {
    task: function(newTask) {
      this.percentComplete = newTask.percent_complete;
      this.result = newTask.result;
    }
  },
  computed: {
    percentCompleteValue() {
      if (this.percentComplete === 0) return 0;
      return this.percentComplete
        ? this.percentComplete
        : this.task.percent_complete;
    }
  },
  methods: {
    ...mapActions(["updateTaskResult"]),
    handleUpdateTaskResult() {
      if (this.result === null) this.result = this.task.result;
      if (this.result === "") this.result = null;
      const { percentComplete, result } = this;
      this.updateTaskResult({
        taskId: this.task.id,
        data: { percentComplete, result }
      }).then(response => {
        if (!response.error) {
          this.isShowResultForm = false;
          this.$notify({
            group: "center",
            type: "success",
            text: "Cập nhật thành công!",
            position: "top center"
          });
        }
      });
    },
    handleSlider(e) {
      this.percentComplete = e;
    },
    toggleResultForm() {
      this.isShowResultForm = !this.isShowResultForm;
    },
    dragEnd() {
      this.isShowResultForm = true;
    }
  },
  data() {
    return {
      isShowResultForm: false,
      percentComplete: 0,
      result: "",
      options: {
        dotSize: 1,
        height: 20,
        tooltip: "none",
        railStyle: {
          backgroundColor: "#EEEEEE",
          position: "relative",
          borderRadius: 0
        },
        dotStyle: {
          borderRadius: 0,
          position: "absolute",
          top: -30,
          right: -5,
          border: "none",
          height: 8,
          borderLeft: "6px solid transparent",
          borderRight: "6px solid transparent",
          borderTop: "20px solid #7ABD1A",
          display: "none"
        },

        processStyle: {
          backgroundColor: "#7ABD1A",
          borderRadius: 0
        }
      }
    };
  },
  components: {
    VueSlider
  }
};
</script>

<style>
.completion-slider {
  background: none !important;
  box-shadow: none !important;
}
.slider-value {
  position: absolute;
  z-index: 999;
  height: 100%;
  line-height: 23px;
  padding-left: 5px;
  font-size: 11px;
  color: #fff;
}
.vue-slider-dot-handle-disabled {
  border-color: transparent !important;
}
.completion-slider:hover .vue-slider-dot-handle {
  display: block !important;
}
</style>
