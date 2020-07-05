<template>
  <div id="setting">
    <div class="edit-box">
      <form @submit.prevent="handleUpdateProject">
        <div class="title">
          <span>{{ $t('projects.edit project') }}</span>
        </div>

        <div class="box form">
          <div class="row">
            <div class="label">{{ $t('projects.project name') }}</div>
            <div class="input">
              <input :placeholder="$t('projects.project name')" v-model="name" />
            </div>
            <div class="validate-error" v-for="error in errors.name" :key="error.id">{{ error }}</div>
          </div>

          <div class="row">
            <div class="label">{{ $t('projects.project description') }}</div>
            <div class="input">
              <ckeditor
                :editor="editor"
                v-model="description"
                :config="{...editorConfig, placeholder: $t('projects.project description') + '...' }"
              ></ckeditor>
            </div>
          </div>

          <div class="row">
            <div class="label">{{ $t('projects.project type') }}</div>
            <div class="select editable">
              <select v-model.number="is_internal">
                <option value="1">{{ $t('projects.internal projects') }}</option>
                <option value="0">{{ $t('projects.external projects') }}</option>
              </select>
            </div>

            <div class="sep-10"></div>
          </div>

          <div class="row">
            <div class="label">{{ $t('projects.current status') }}</div>
            <div class="select editable">
              <select v-model.number="active">
                <option value="1">{{ $t('projects.active') }}</option>
                <option value="0">{{ $t('projects.closed') }}</option>
              </select>
            </div>

            <div class="sep-10"></div>

            <div class="select editable" v-if="project">
              <select v-model="open_status" v-if="project.active">
                <option
                  :value="item.value.replace(' ', '_')"
                  v-for="item in projectStatuses.open"
                  :key="item.id"
                >{{ $t(`projects.${item.value}`) }}</option>
              </select>
              <select v-model="close_status" v-else>
                <option
                  :value="item.value.replace(' ', '_')"
                  v-for="item in projectStatuses.close"
                  :key="item.id"
                >{{ $t(`projects.${item.value}`) }}</option>
              </select>
            </div>
          </div>

          <div class="on-edit">
            <button class="button -cta">{{ $t('common.save') }}</button>
            <div class="button -cancel">{{ $t('common.cancel') }}</div>
          </div>
        </div>
      </form>
    </div>

    <div class="edit-box">
      <form @submit.prevent="handleUpdateDepartmentIdOfProject">
        <div class="title">{{ $t('departments.departments') }}</div>

        <div class="box form" id="js-edit-dept-form">
          <div class="row">
            <div class="select">
              <select v-model="department_id">
                <option :value="null">{{ $t('common.not specified') }}</option>
                <option
                  :value="department.id"
                  v-for="department in departments"
                  :key="department.id"
                >{{ department.name }}</option>
              </select>
            </div>
            <div
              class="validate-error"
              v-for="error in errors.department_id"
              :key="error.id"
            >{{ error }}</div>
          </div>

          <div class="on-edit">
            <button type="submit" class="button -cta">{{ $t('common.save') }}</button>
            <div class="button -cancel">{{ $t('common.cancel') }}</div>
          </div>
        </div>
      </form>
    </div>

    <div class="edit-box">
      <div class="title">
        <span>{{ $t('projects.project dates') }}</span>
      </div>

      <div class="box form">
        <div class="period">
          <div id="js-project-period">
            <span
              class="a"
              @click="$store.commit('TOGGLE_EDIT_PROJECT_DURATION_DIALOG')"
              v-if="!startDate || !finishDate"
            >{{ $t('projects.setup project date') }}</span>
            <span
              class="pointer"
              @click="$store.commit('TOGGLE_EDIT_PROJECT_DURATION_DIALOG')"
              v-else
            >
              <span class="-ap icon-uniF1072 ap-f16"></span> &nbsp;
              <em>{{ startDate }}</em> -
              <em>{{ finishDate }}</em>
            </span>
          </div>
        </div>
      </div>
    </div>
    <div class="fx">© JBWork 2020</div>
    <div class="sep-20"></div>
  </div>
</template>

<script>
import { mapActions, mapState } from "vuex";
import moment from "moment";
import { projectStatuses } from "../../../config/status";
import {message} from '../../../helpers'
import i18n from '../../../lang'
import CKEditor from "@ckeditor/ckeditor5-vue";
import ClassicEditor from "@ckeditor/ckeditor5-editor-classic/src/classiceditor";
import EssentialsPlugin from "@ckeditor/ckeditor5-essentials/src/essentials";
import BoldPlugin from "@ckeditor/ckeditor5-basic-styles/src/bold";
import ItalicPlugin from "@ckeditor/ckeditor5-basic-styles/src/italic";
import LinkPlugin from "@ckeditor/ckeditor5-link/src/link";
import ParagraphPlugin from "@ckeditor/ckeditor5-paragraph/src/paragraph";
import Heading from "@ckeditor/ckeditor5-heading/src/heading";
import Alignment from "@ckeditor/ckeditor5-alignment/src/alignment";
import List from "@ckeditor/ckeditor5-list/src/list";
import Font from "@ckeditor/ckeditor5-font/src/font";
import CodeBlock from "@ckeditor/ckeditor5-code-block/src/codeblock";
import Multiselect from "vue-multiselect";
import DatePicker from "v-calendar/lib/components/date-picker.umd";
export default {
  name: "project-editing",
  data() {
    return {
      projectStatuses,
      name: "",
      description: "",
      is_internal: true,
      active: true,
      open_status: "",
      close_status: "",
      errors: {},
      department_id: null,
      editor: ClassicEditor,
      editorConfig: {
        plugins: [
          EssentialsPlugin,
          BoldPlugin,
          ItalicPlugin,
          LinkPlugin,
          ParagraphPlugin,
          Heading,
          Alignment,
          List,
          Font,
          CodeBlock
        ],
        toolbar: [
          "heading",
          "|",
          "fontSize",
          "fontFamily",
          "fontColor",
          "fontBackgroundColor",
          "bold",
          "italic",
          "bulletedList",
          "numberedList",
          "link",
          "alignment",
          "codeBlock"
        ]
      }
    };
  },
  watch: {
    project(project) {
      this.name = project.name;
      this.description = project.description || "";
      this.active = project.active;
      this.is_internal = project.is_internal;
      this.open_status = project.open_status;
      this.close_status = project.close_status;
      this.department_id = project.department_id;
    }
  },
  created() {
    const projectId = this.$route.params.id;
    this.getProjectById(projectId);
    this.getMyDepartments(this.currentUser.id);
  },
  methods: {
    ...mapActions([
      "getProjectById",
      "updateProject",
      "getMyDepartments",
      "updateDepartmentIdOfProject"
    ]),
    handleUpdateProject() {
      const {
        name,
        description,
        is_internal,
        active,
        open_status,
        close_status
      } = this;

      const data = {
        name,
        description,
        is_internal,
        active,
        open_status,
        close_status
      };
      const projectId = this.project.id;
      this.updateProject({ data, projectId }).then(response => {
        if (!response.error) {
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
    handleUpdateDepartmentIdOfProject() {
      const { department_id } = this;
      const projectId = this.project.id;
      this.updateDepartmentIdOfProject({ department_id, projectId }).then(
        response => {
          if (!response.error) {
            this.$notify(
              message(
                "success",
                this.$t("messages.project has been updated successfully")
              )
            );
          } else {
            this.errors = response.message;
          }
        }
      );
    }
  },
  computed: {
    ...mapState({
      project: state => state.projects.project,
      currentUser: state => state.auth.currentUser,
      departments: state => state.departments.departments
    }),
    startDate() {
      if (this.project) {
        return this.project.start_date
          ? moment(this.project.start_date).locale(i18n.locale).format("L")
          : "";
      }
    },
    finishDate() {
      if (this.project) {
        return this.project.finish_date
          ? moment(this.project.finish_date).locale(i18n.locale).format("L")
          : "";
      }
    }
  },
  components: {
    ckeditor: CKEditor.component
  }
};
</script>

<style>
</style>
