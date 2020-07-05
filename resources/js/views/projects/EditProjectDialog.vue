<template>
  <div id="apdialogs" v-if="showEditProjectDialog">
    <div class="__fdialog __temp __dialog __dialog_ontop __canvas_closable">
      <div class="__closable"></div>
      <div class="__fdialogwrapper scroll-y forced-scroll">
        <div class="__dialogwrapper">
          <div class="__dialogwrapper-inner">
            <div class="__dialogmain">
              <div class="__dialogtitlewrap">
                <div class="left relative">
                  <div
                    class="__dialogtitle unselectable ap-xdot"
                  >{{ $t('common.edit') }}: {{ projectEditing.name }}</div>
                  <div class="__dialogtitlerender tx-fill"></div>
                </div>
                <div class="clear"></div>
              </div>
              <div class="__dialogclose" @click="closeEditProjectDialog">
                <span class="-ap icon-close"></span>
              </div>
              <div class="__dialogcontent">
                <div class="__apdialog" style="width: 480px;">
                  <div class="form form-dialog -flat">
                    <form @submit.prevent="handleUpdateProject">
                      <div class="row -istext -active">
                        <div class="label">{{ $t('projects.project name') }}</div>
                        <div class="input data">
                          <input
                            type="text"
                            :placeholder="$t('projects.project name')"
                            class="std"
                            v-model="name"
                          />
                        </div>
                        <div
                          class="validate-error"
                          v-for="error in errors.name"
                          :key="error.id"
                        >{{ error }}</div>
                        <div class="clear"></div>
                      </div>
                      <div class="row -isselect -active">
                        <div class="label">{{ $t('departments.departments') }}</div>
                        <div class="select data js-improved-select">
                          <select-box
                            :options="departments"
                            :placeholder="$t('departments.departments')"
                            @input="onChangeDepartment"
                            :value="department"
                          />
                        </div>
                        <div
                          class="validate-error"
                          v-for="error in errors.department_id"
                          :key="error.id"
                        >{{ error }}</div>
                        <div class="clear"></div>
                      </div>
                      <div class="row -istext -active">
                        <div class="label">{{ $t('projects.project owner') }}</div>
                        <select-box
                          :options="users"
                          :placeholder="$t('common.type to search')"
                          @input="onChangeManager"
                          :value="manager"
                        />
                        <div
                          class="validate-error"
                          v-for="error in errors.manager_id"
                          :key="error.id"
                        >{{ error }}</div>
                        <div class="clear"></div>
                      </div>

                      <div class="row -isbase -active">
                        <div class="label">{{ $t('projects.start and end dates') }}</div>
                        <div class="input-group -count-2">
                          <div class="gi" style="width: 50%">
                            <div class="input data">
                              <span
                                class="-ap icon-uniF1072"
                                style="position: absolute; right:10px; top:10px; color:#aaa; font-size:16px;"
                              ></span>
                              <date-picker
                                v-model="start_date"
                                :input-props="{
                                  class: 'std hasDatepicker',
                                  placeholder: $t('projects.start date')
                                }"
                                :masks="masks"
                                :popover="popover"
                              />
                            </div>
                          </div>
                          <div class="gi" style="width: 50%">
                            <div class="input data">
                              <span
                                class="-ap icon-uniF1072"
                                style="position: absolute; right:10px; top:10px; color:#aaa; font-size:16px;"
                              ></span>
                              <date-picker
                                v-model="finish_date"
                                :input-props="{
                                  class: 'std hasDatepicker',
                                  placeholder:  $t('projects.end date')
                                }"
                                :masks="masks"
                                :popover="popover"
                              />
                            </div>
                          </div>
                          <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="row -istextarea -active">
                        <div class="label">{{ $t('projects.project description') }}</div>
                        <div class="input data">
                          <textarea
                            name="content"
                            :placeholder="$t('projects.short description of this project')"
                            v-model="description"
                          ></textarea>
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="form-buttons -two">
                        <button
                          type="submit"
                          class="button ok -success -rounded bold"
                        >{{ $t('common.save') }}</button>
                        <div
                          class="button cancel -passive-2 -rounded"
                          @click="closeEditProjectDialog"
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
import SelectBox from "../../components/SelectBox";
import DatePicker from "v-calendar/lib/components/date-picker.umd";
import moment from "moment";
import { mapActions } from "vuex";
import Loading from "../../components/Loading";
import { masks, message } from "../../helpers";
export default {
  name: "edit-project-dialog",
  props: {
    departments: { type: Array, default: [] },
    users: { type: Array, default: [] },
    showEditProjectDialog: { type: Boolean, default: false },
    projectEditing: { type: Object, default: null },
    isSubmitting: { type: Boolean, default: false }
  },
  data() {
    return {
      name: "",
      department: null,
      manager: null,
      start_date: "",
      finish_date: "",
      description: "",
      errors: {},
      popover: {
        visibility: "focus"
      }
    };
  },
  watch: {
    projectEditing: function(projectEditing) {
      this.resetForm(projectEditing);
    }
  },
  computed: {
    masks() {
      return masks();
    }
  },
  methods: {
    ...mapActions(["updateProjectQuickly"]),
    customLabel({ name, position }) {
      return `${name}`;
    },
    resetForm(projectEditing) {
      this.name = projectEditing.name;
      this.department = this.departments.find(
        department => department.id === projectEditing.department_id
      );
      this.manager = this.users.find(
        user => user.id === projectEditing.manager.id
      );
      this.description = projectEditing.description;
      this.start_date = projectEditing.start_date
        ? new Date(projectEditing.start_date)
        : "";
      this.finish_date = projectEditing.finish_date
        ? new Date(projectEditing.finish_date)
        : "";
    },
    closeEditProjectDialog() {
      this.resetForm(this.projectEditing);
      this.errors = {};
      this.$store.commit("SET_PROJECT_EDITING");
    },
    handleUpdateProject() {
      const data = {
        name: this.name ? this.name : "",
        department_id: this.department ? this.department.id : null,
        manager_id: this.manager ? this.manager.id : null,
        start_date: this.start_date
          ? moment(this.start_date).format("YYYY-MM-DD")
          : "",
        finish_date: this.finish_date
          ? moment(this.finish_date).format("YYYY-MM-DD")
          : "",
        description: this.description ? this.description : ""
      };
      const projectId = this.projectEditing.id;
      this.updateProjectQuickly({ data, projectId }).then(response => {
        if (!response.error) {
          this.closeEditProjectDialog();
          this.$notify(
            message(
              "success",
              this.$t("messages.project has been updated successfully")
            )
          );
        } else {
          this.errors = response.message;
        }
      });
    },
    onChangeDepartment(selected) {
      this.department = selected;
    },
    onChangeManager(selected) {
      this.manager = selected;
    }
  },
  components: {
    SelectBox,
    DatePicker,
    Loading
  }
};
</script>

<style></style>
