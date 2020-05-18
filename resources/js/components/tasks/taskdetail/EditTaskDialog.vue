<template>
  <div id="apdialogs" style="display: block;" v-if="showEditTaskDialog">
    <div class="__fdialog __temp __dialog __canvas_closable __dialog_ontop">
      <div class="__closable"></div>
      <div class="__fdialogwrapper scroll-y forced-scroll">
        <div class="__dialogwrapper" style="top: 50%; left: 50%; transform: translate(-50%, -50%)">
          <div class="__dialogwrapper-inner">
            <div class="__dialogmain">
              <div class="__dialogtitlewrap">
                <div class="left relative">
                  <div class="__dialogtitle unselectable ap-xdot">{{ task.name }}</div>
                  <div class="__dialogtitlerender tx-fill"></div>
                </div>
                <div class="clear"></div>
              </div>
              <div class="__dialogclose" @click="closeEditTaskDialog">
                <span class="-ap icon-close"></span>
              </div>
              <div class="__dialogcontent">
                <div id="fly-edititem-dx" class="__apdialog" title style="width: 600px;">
                  <div class="form form-dialog -flat">
                    <form @submit.prevent="handleUpdateTask">
                      <div class="row -istext -big -active">
                        <div class="label">Tên công việc *</div>
                        <div class="input data">
                          <input v-model="name" type="text" placeholder="Tên công việc" class="std" />
                        </div>
                        <div
                          class="validate-error"
                          v-for="error in errors.name"
                          :key="error.name"
                        >{{ error }}</div>
                        <div class="clear"></div>
                      </div>
                      <div class="row -isfake -active" id="_uuid45583_65163_1589531608">
                        <div class="label">Thành viên thực hiện</div>
                        <div class="input data">
                          <div class="input-fake ap-xdot">{{ task.assigned_to.name }}</div>
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="row -html">
                        <span
                          class="link advlink"
                          @click="
                            hiddenAdvancedOptions = !hiddenAdvancedOptions
                          "
                          v-if="hiddenAdvancedOptions"
                        >+ Thêm lựa chọn nâng cao</span>
                        <span
                          class="link advlink"
                          @click="
                            hiddenAdvancedOptions = !hiddenAdvancedOptions
                          "
                          v-if="!hiddenAdvancedOptions"
                        >- Ẩn lựa chọn nâng cao</span>
                      </div>
                      <div class="wrapper" :class="{ hidden: hiddenAdvancedOptions }">
                        <div class="wtitle">Tùy chọn nâng cao</div>
                        <div class="__ph"></div>
                        <div class="row -islist -active">
                          <div class="label">Mức độ ưu tiên?</div>
                          <div class="list-radio data">
                            <div class="options">
                              <div
                                class="opt"
                                :class="{ selected: is_urgent === 0 }"
                                @click="checkIsUrgent(0)"
                              >
                                <div class="circle">
                                  <div class="cin"></div>
                                </div>Bình thường
                              </div>
                              <div
                                class="opt"
                                :class="{ selected: is_urgent === 1 }"
                                @click="checkIsUrgent(1)"
                              >
                                <div class="circle">
                                  <div class="cin"></div>
                                </div>Khẩn cấp
                              </div>
                            </div>
                          </div>
                          <div class="clear"></div>
                        </div>
                        <div class="row -istextarea -active">
                          <div class="label">Mô tả thêm về công việc</div>
                          <div class="input data">
                            <textarea placeholder="Mô tả công việc" v-model="description"></textarea>
                          </div>
                          <div class="clear"></div>
                        </div>
                      </div>
                      <div class="form-buttons -two">
                        <button
                          type="submit"
                          class="button ok -success -rounded bold"
                        >Chỉnh sửa công việc</button>
                        <div
                          class="button cancel -passive-2 -rounded"
                          @click="closeEditTaskDialog"
                        >Huỷ bỏ</div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <loading :class="{ show: isSubmitting }" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions } from "vuex";
import Loading from "../../common/Loading";
export default {
  name: "edit-task-dialog",
  props: {
    showEditTaskDialog: { type: Boolean, default: false },
    task: { type: Object, default: null },
    isSubmitting: { type: Boolean, default: false },
    currentUser: { type: Object, default: null }
  },
  watch: {
    task: function(task) {
      this.name = task.name;
      this.is_urgent = task.is_urgent;
      this.description = task.description;
    }
  },
  data() {
    return {
      hiddenAdvancedOptions: true,
      name: "",
      is_urgent: null,
      description: "",
      errors: {}
    };
  },
  methods: {
    ...mapActions(["updateTask"]),
    checkIsUrgent(value) {
      this.is_urgent = value;
    },
    closeEditTaskDialog() {
      this.$store.commit("TOGGLE_EDIT_TASK_DIALOG");
      this.name = this.task.name;
      this.is_urgent = this.task.is_urgent;
      this.description = this.task.description;
      this.errors = {};
    },
    handleUpdateTask() {
      const { name, is_urgent, description } = this;
      const data = { name, is_urgent, description };
      this.updateTask({
        data,
        taskId: this.task.id,
        currentUser: this.currentUser
      }).then(response => {
        if (!response.error) {
          this.closeEditTaskDialog();
          this.$notify({
            group: "notify",
            type: "success",
            text: "Chỉnh sửa công việc thành công!"
          });
        } else {
          this.errors = response.message;
        }
      });
    }
  },
  components: {
    Loading
  }
};
</script>

<style>
#apdialogs {
  z-index: 99999;
}
</style>
