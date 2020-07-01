<template>
  <div id="setting">
    <div class="edit-box">
      <form @submit.prevent="handleUpdateProject">
        <div class="title">
          <span>Chỉnh sửa dự án</span>
        </div>

        <div class="box form" id="js-edit-form">
          <div class="row">
            <div class="label">Tên dự án</div>
            <div class="input">
              <input type="text" placeholder="Tên" v-model="name" />
            </div>
            <div class="validate-error" v-for="error in errors.name" :key="error.id">{{ error }}</div>
          </div>

          <div class="row">
            <div class="label">Miêu tả chung</div>
            <div class="input">
              <ckeditor :editor="editor" v-model="description" :config="editorConfig"></ckeditor>
            </div>
          </div>

          <div class="row">
            <div class="label">Phân loại</div>
            <div class="select editable">
              <select v-model.number="is_internal">
                <option value="1">Dự án nội bộ (chỉ dành cho các thành viên trong công ty)</option>
                <option value="0">Dự án làm việc với khách hàng</option>
              </select>
            </div>

            <div class="sep-10"></div>
          </div>

          <div class="row">
            <div class="label">Trạng thái hiện tại</div>
            <div class="select editable">
              <select v-model.number="active">
                <option value="1">Đang thực hiện</option>
                <option value="0">Đóng</option>
              </select>
            </div>

            <div class="sep-10"></div>

            <div class="select editable" v-if="project">
              <select v-model="open_status" v-if="project.active">
                <option
                  :value="item.value"
                  v-for="item in projectStatuses.open"
                  :key="item.id"
                >{{ item.name }}</option>
              </select>
              <select v-model="close_status" v-else>
                <option
                  :value="item.value"
                  v-for="item in projectStatuses.close"
                  :key="item.id"
                >{{ item.name }}</option>
              </select>
            </div>
          </div>

          <div class="on-edit">
            <button class="button -cta">Lưu</button>
            <div class="button -cancel">Hủy</div>
          </div>
        </div>
      </form>
    </div>

    <div class="edit-box">
      <form @submit.prevent="handleUpdateDepartmentIdOfProject">
        <div class="title">Phòng ban</div>

        <div class="box form" id="js-edit-dept-form">
          <div class="row">
            <div class="select">
              <select v-model="department_id">
                <option :value="null">Chưa chọn</option>
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
            <button type="submit" class="button -cta">Lưu</button>
            <div class="button -cancel">Hủy</div>
          </div>
        </div>
      </form>
    </div>

    <div class="edit-box">
      <div class="title">
        <span>Thời gian thực hiện</span>
      </div>

      <div class="box form">
        <div class="period">
          <div id="js-project-period">
            <span
              class="a"
              @click="$store.commit('TOGGLE_EDIT_PROJECT_DURATION_DIALOG')"
              v-if="!startDate || !finishDate"
            >Đặt thời gian bắt đầu và kết thúc dự án</span>
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
        placeholder: "Miêu tả...",
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
          this.$notify({
            group: "notify",
            type: "success",
            text: "Cập nhật dự án thành công!"
          });
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
            this.$notify({
              group: "notify",
              type: "success",
              text: "Cập nhật dự án thành công!"
            });
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
          ? moment(this.project.start_date).format("DD/MM/YYYY")
          : "";
      }
    },
    finishDate() {
      if (this.project) {
        return this.project.finish_date
          ? moment(this.project.finish_date).format("DD/MM/YYYY")
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
