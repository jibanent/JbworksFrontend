<template>
  <div id="apdialogs" style="display: block;" v-if="showEditTaskDialog">
    <div class="__fdialog __temp __dialog __canvas_closable __dialog_ontop">
      <div class="__closable"></div>
      <div class="__fdialogwrapper scroll-y forced-scroll">
        <div class="__dialogwrapper">
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
                        <div class="label">{{ $t('tasks.task name') }} *</div>
                        <div class="input data">
                          <input
                            v-model="name"
                            type="text"
                            :placeholder="$t('tasks.task name')"
                            class="std"
                          />
                        </div>
                        <div
                          class="validate-error"
                          v-for="error in errors.name"
                          :key="error.name"
                        >{{ error }}</div>
                        <div class="clear"></div>
                      </div>
                      <div class="row -isfake -active">
                        <div class="label">{{ $t('tasks.assignee') }}</div>
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
                        >+ {{ $t('common.more options') }}</span>
                        <span
                          class="link advlink"
                          @click="
                            hiddenAdvancedOptions = !hiddenAdvancedOptions
                          "
                          v-if="!hiddenAdvancedOptions"
                        >- {{ $t('common.hide option') }}</span>
                      </div>
                      <div class="wrapper" :class="{ hidden: hiddenAdvancedOptions }">
                        <div class="wtitle">{{ $t('common.more options') }}</div>
                        <div class="__ph"></div>
                        <div class="row -islist -active">
                          <div class="label">{{ $t('tasks.task priority') }}?</div>
                          <div class="list-radio data">
                            <div class="options">
                              <div
                                class="opt"
                                :class="{ selected: is_urgent === 0 }"
                                @click="checkIsUrgent(0)"
                              >
                                <div class="circle">
                                  <div class="cin"></div>
                                </div>
                                {{ $t('tasks.normal') }}
                              </div>
                              <div
                                class="opt"
                                :class="{ selected: is_urgent === 1 }"
                                @click="checkIsUrgent(1)"
                              >
                                <div class="circle">
                                  <div class="cin"></div>
                                </div>
                                {{ $t('tasks.urgent') }}
                              </div>
                            </div>
                          </div>
                          <div class="clear"></div>
                        </div>
                        <div class="row -istextarea -active">
                          <div class="label">{{ $t('tasks.more description about task') }}</div>
                          <div class="input data">
                            <textarea
                              :placeholder="$t('tasks.task description')"
                              v-model="description"
                            ></textarea>
                          </div>
                          <div class="clear"></div>
                        </div>
                      </div>
                      <div class="form-buttons -two">
                        <button
                          type="submit"
                          class="button ok -success -rounded bold"
                        >{{ $t('tasks.edit task') }}</button>
                        <div
                          class="button cancel -passive-2 -rounded"
                          @click="closeEditTaskDialog"
                        >{{ $t('common.cancel') }}</div>
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
import Loading from "../../../components/Loading";
import { message } from "../../../helpers";
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
          this.$notify(
            message(
              "success",
              this.$t("messages.task has been updated successfully")
            )
          );
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
