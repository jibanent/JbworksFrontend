<template>
  <div id="apdialogs" v-if="showProjectAdd">
    <div class="__fdialog __temp __dialog __dialog_ontop">
      <div class="__fdialogwrapper scroll-y forced-scroll">
        <div class="__dialogwrapper">
          <div class="__dialogmain">
            <div class="__dialogtitlewrap">
              <div class="left relative">
                <div class="__dialogtitle unselectable ap-xdot">
                  {{ $t("projects.create a new project") }}
                </div>
                <div class="__dialogtitlerender tx-fill"></div>
              </div>
              <div class="clear"></div>
            </div>
            <div class="__dialogclose" @click="closeProjectAdd">
              <span class="-ap icon-close"></span>
            </div>
            <div class="__dialogcontent">
              <div class="__apdialog" style="width: 480px;">
                <div class="form form-dialog -flat">
                  <form method="post" @submit.prevent="handleCreateProject">
                    <div class="row -istext -big -active">
                      <div class="label">{{ $t("projects.project name") }}</div>
                      <div class="input data">
                        <input
                          :placeholder="$t('projects.project name')"
                          class="std"
                          v-model="name"
                        />
                      </div>
                      <div
                        class="validate-error"
                        v-for="error in errors.name"
                        :key="error.id"
                      >
                        {{ error }}
                      </div>
                      <div class="clear"></div>
                    </div>
                    <div class="row -istext -big -active">
                      <div class="label">
                        {{ $t("projects.project owner") }}
                      </div>
                      <select-box
                        :options="users.data"
                        :placeholder="$t('common.type to search')"
                        @input="onChangeManager"
                      />
                      <div
                        class="validate-error"
                        v-for="error in errors.manager_id"
                        :key="error.manager_id"
                      >
                        {{ error }}
                      </div>
                      <div class="clear"></div>
                    </div>
                    <div class="row -istext -big -active">
                      <div class="label">
                        {{ $t("projects.project members") }}
                      </div>

                      <select-box
                        :options="users.data"
                        :placeholder="$t('common.type to search')"
                        @input="onChangeMembers"
                        :multiple="true"
                      />
                      <div class="clear"></div>
                    </div>
                    <div class="row -isselect -active">
                      <div class="label">
                        {{ $t("departments.departments") }}
                      </div>
                      <treeselect
                        v-model="department"
                        :options="departments.data"
                        :normalizer="normalizer"
                        :placeholder="$t('common.type to search')"
                      />
                      <div
                        class="validate-error"
                        v-for="error in errors.department_id"
                        :key="error.department_id"
                      >
                        {{ error }}
                      </div>
                      <div class="clear"></div>
                    </div>
                    <div class="row -islist -active">
                      <div class="label">{{ $t("projects.project type") }}</div>
                      <div class="list-radio data">
                        <div style="display:none">
                          <input style="display:none" name="external" />
                        </div>
                        <div class="options">
                          <div
                            class="opt"
                            :class="{ selected: isInternal === 1 }"
                            @click="checkIsInternal(1)"
                          >
                            <div class="circle">
                              <div class="cin"></div>
                            </div>
                            {{ $t("projects.internal projects") }}
                          </div>
                          <div
                            class="opt"
                            :class="{ selected: isInternal === 0 }"
                            @click="checkIsInternal(0)"
                          >
                            <div class="circle">
                              <div class="cin"></div>
                            </div>
                            {{ $t("projects.external projects") }}
                          </div>
                        </div>
                      </div>
                      <div class="clear"></div>
                    </div>
                    <div
                      class="wrapper hidden"
                      style="display: block;"
                      v-if="showAdvancedOptions"
                    >
                      <div class="wtitle">{{ $t("common.more options") }}</div>
                      <div class="__ph"></div>
                      <div class="row -istext -active">
                        <div class="label">{{ $t("projects.start date") }}</div>
                        <div class="input data">
                          <span
                            class="-ap icon-uniF1072"
                            style="position: absolute; right:10px; top:10px; color:#aaa; font-size:16px;"
                          ></span>
                          <date-picker
                            v-model="startDateValue"
                            :input-props="{
                              class: 'std hasDatepicker',
                              placeholder: $t('projects.start date')
                            }"
                            :masks="masks"
                            :popover="popover"
                          />
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="row -istext -active">
                        <div class="label">{{ $t("projects.end date") }}</div>
                        <div class="input data">
                          <span
                            class="-ap icon-uniF1072"
                            style="position: absolute; right:10px; top:10px; color:#aaa; font-size:16px;"
                          ></span>
                          <date-picker
                            v-model="finishDateValue"
                            :input-props="{
                              class: 'std hasDatepicker',
                              placeholder: $t('projects.end date')
                            }"
                            :masks="masks"
                            :popover="popover"
                          />
                        </div>
                        <div
                          class="validate-error"
                          v-for="error in errors.finish_date"
                          :key="error.finish_date"
                        >
                          {{ error }}
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="row">
                        <div class="label">
                          {{ $t("projects.current status") }}
                        </div>
                        <div class="select data">
                          <select v-model="openStatus">
                            <option
                              :value="item.value.replace(' ', '_')"
                              v-for="item in projectStatuses.open"
                              :key="item.id"
                              >{{ $t(`projects.${item.value}`) }}</option
                            >
                          </select>
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="row -istextarea -active">
                        <div class="label">
                          {{ $t("projects.project description") }}
                        </div>
                        <div class="input data">
                          <textarea
                            name="content"
                            :placeholder="
                              $t('projects.short description of this project')
                            "
                            v-model="description"
                          ></textarea>
                        </div>
                        <div class="clear"></div>
                      </div>
                    </div>
                    <div class="row -html">
                      <span
                        class="link"
                        @click="showAdvancedOptions = !showAdvancedOptions"
                      >
                        {{
                          !showAdvancedOptions
                            ? `+ ${$t("common.more options")}`
                            : `- ${$t("common.hide option")}`
                        }}
                      </span>
                    </div>
                    <div class="form-buttons -two">
                      <button class="button ok -success -rounded bold">
                        {{ $t("projects.add project") }}
                      </button>
                      <div
                        class="button cancel -passive-2 -rounded"
                        @click="closeProjectAdd"
                      >
                        {{ $t("common.cancel") }}
                      </div>
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
</template>

<script>
import { mapState, mapActions, mapGetters } from "vuex";
import DatePicker from "v-calendar/lib/components/date-picker.umd";
import moment from "moment";
import Loading from "../../components/Loading";
import { projectStatuses } from "../../config/status";
import SelectBox from "../../components/SelectBox";
import Treeselect from "@riophae/vue-treeselect";
import "@riophae/vue-treeselect/dist/vue-treeselect.css";
import { message, masks } from "../../helpers";
export default {
  name: "add-project-dialog",
  props: {
    showProjectAdd: { type: Boolean, default: false },
    departments: { type: Object, default: {} },
    users: { type: Object, default: {} },
    currentUser: { type: Object, default: null },
    isSubmitting: { type: Boolean, default: false }
  },
  data() {
    return {
      name: "",
      manager: null,
      followers: [],
      department: null,
      isInternal: 1,
      startDate: "",
      finishDate: "",
      openStatus: projectStatuses.open[0].value.replace(" ", "_"),
      description: "",
      popover: {
        visibility: "focus"
      },
      showAdvancedOptions: false,
      errors: {},
      projectStatuses,
      normalizer(node) {
        return {
          id: node.id,
          label: node.name,
          children: node.children
        };
      }
    };
  },
  computed: {
    startDateValue: {
      get() {
        return;
      },
      set(val) {
        this.startDate = val ? moment(val).format("YYYY-MM-DD") : "";
      }
    },
    finishDateValue: {
      get() {
        return;
      },
      set(val) {
        this.finishDate = val ? moment(val).format("YYYY-MM-DD") : "";
      }
    },
    masks() {
      return masks();
    }
  },
  methods: {
    ...mapActions(["createProject", "getUsers"]),
    closeProjectAdd() {
      this.$store.commit("TOGGLE_PROJECT_ADD");
      this.errors = {};
      this.name = "";
      this.manager = null;
      this.followers = [];
      this.department = null;
      this.isInternal = 1;
      this.startDate = "";
      this.finishDate = "";
      this.statusId = 1;
      this.description = "";
    },
    checkIsInternal(value) {
      this.isInternal = value;
    },
    handleCreateProject(event) {
      const data = {
        name: this.name,
        manager_id: this.manager ? this.manager.id : null,
        followers: this.followers.map(follower => {
          return follower.id;
        }),
        department_id: this.department,
        is_internal: this.isInternal,
        start_date: this.startDate,
        finish_date: this.finishDate,
        open_status: this.openStatus,
        description: this.description
      };

      let currentUserId = this.currentUser.id;
      if (this.$route.name === "projects-admin") currentUserId = null;

      this.createProject({ data, currentUserId }).then(response => {
        if (!response.error) {
          this.closeProjectAdd();
          this.$notify(
            message(
              "success",
              this.$t("messages.new project has been created successfully")
            )
          );
        } else {
          this.errors = response.message;
        }
      });
      event.target.reset();
    },
    onChangeManager(selected) {
      this.manager = selected;
    },
    onChangeMembers(selected) {
      this.followers = selected;
    },
    onChangeDepartment(selected) {
      this.department = selected;
    }
  },
  components: {
    DatePicker,
    Loading,
    SelectBox,
    Treeselect
  }
};
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style>
.option__image {
  width: 24px;
  height: 24px;
  border-radius: 3px;
  object-fit: cover;
  object-position: center;
  float: left;
}
.option__desc {
  margin-left: 30px;
}
.option__title {
  font-size: 12px;
  font-weight: bold;
}
.option__small {
  font-size: 12px;
  font-weight: normal;
  opacity: 0.8;
}
button.button {
  border: none;
}
</style>
