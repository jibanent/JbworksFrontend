<template>
  <div
    id="apdialogs"
    class="__fdialog __temp __dialog __canvas_closable __dialog_ontop"
    v-if="showAddTaskDialog"
  >
    <div class="__dialogwrapper">
      <div class="__dialogmain">
        <div class="simple-form">
          <div class="__apdialog">
            <div id="tform-dialog">
              <div class="header">
                <div class="title">{{ $t('tasks.create a new task') }}</div>
                <div class="close" @click="closeAddTaskDialog">
                  <span class="-ap icon-close"></span>
                </div>
              </div>
              <div id="js-tform-body" class="tform-body js-tform">
                <div class="board-add-wrap">
                  <div class="inline-form">
                    <form @submit.prevent="handleCreateTask">
                      <input type="hidden" v-model="projectId" />
                      <div class="formbox">
                        <input
                          v-model="name"
                          :placeholder="$t('tasks.task name')"
                          class="-big __ap_enter_binded"
                        />
                        <div
                          class="validate-error"
                          v-for="error in errors.name"
                          :key="error.id"
                        >{{ error }}</div>
                        <div class="relative" style="margin-top: 5px">
                          <ckeditor
                            :editor="editor"
                            v-model="description"
                            :config="{...editorConfig, placeholder: $t('tasks.task description'),}"
                          ></ckeditor>
                        </div>
                        <div class="frows">
                          <div class="frow">
                            <span class="icon">
                              <span class="-ap icon-uniF13B"></span>
                            </span>
                            <select-box
                              :options="users.data"
                              :placeholder="$t('tasks.assign to')"
                              @input="onChange"
                            />
                            <div
                              class="validate-error"
                              v-for="error in errors.assigned_to"
                              :key="error.id"
                            >{{ error }}</div>
                          </div>
                          <div class="frow">
                            <span class="icon">
                              <span class="-ap icon-uniF1072"></span>
                            </span>
                            <div class="input">
                              <date-picker
                                v-model="dueOnValue"
                                :input-props="{
                                  placeholder: $t('tasks.deadline')
                                }"
                                :masks="masks"
                                :popover="popover"
                              />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="buttons">
                        <button class="submit">{{ $t('tasks.add task') }}</button>
                        <div class="cancel" @click="closeAddTaskDialog">
                          <span class="-ap icon-close"></span>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <loading :class="{ show: isSubmitting }" />
          </div>
        </div>
      </div>
    </div>
    <div class="clear"></div>
  </div>
</template>

<script>
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
import DatePicker from "v-calendar/lib/components/date-picker.umd";
import Loading from "../../components/Loading";
import moment from "moment";
import { masks, message } from "../../helpers";
import { mapActions } from "vuex";
import SelectBox from "../../components/SelectBox";
export default {
  name: "add-task-dialog",
  props: {
    showAddTaskDialog: { type: Boolean, default: false },
    users: { type: Object, default: {} },
    project: { type: Object, default: null },
    currentUser: { type: Object, default: null },
    isSubmitting: { type: Boolean, default: false }
  },
  updated() {
    this.projectId = parseInt(this.$route.params.id) || this.project.id;
    this.createdBy = this.currentUser.id;
  },
  data() {
    return {
      createdBy: null,
      projectId: null,
      name: "",
      description: "",
      assignedTo: null,
      dueOn: "",
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
      },
      popover: {
        visibility: "focus"
      },
      errors: {}
    };
  },
  computed: {
    setProjectId: {
      get() {
        return this.$route.params.id;
      },
      set(val) {
        this.projectId = val;
      }
    },
    dueOnValue: {
      get() {
        return;
      },
      set(val) {
        this.dueOn = val ? moment(val).format("YYYY-MM-DD") : "";
      }
    },
    masks() {
      return masks();
    }
  },
  methods: {
    ...mapActions(["createTask"]),
    closeAddTaskDialog() {
      this.$store.commit("TOGGLE_ADD_TASK_DIALOG");
      this.name = "";
      this.description = "";
      this.dueOn = "";
      this.projectId = null;
      this.assignedTo = null;
      this.createdBy = null;
      this.errors = {};
    },
    onChange(selected) {
      this.assignedTo = selected;
    },
    handleCreateTask() {
      const data = {
        name: this.name,
        description: this.description,
        due_on: this.dueOn,
        project_id: this.projectId,
        assigned_to: this.assignedTo ? this.assignedTo.id : null,
        created_by: this.createdBy,
        status_id: 1
      };
      const route = this.$route.name;
      this.createTask({ data, route }).then(response => {
        if (!response.error) {
          this.closeAddTaskDialog();
          this.$notify(
            message(
              "success",
              this.$t("messages.new task has been created successfully")
            )
          );
        } else {
          this.errors = response.message;
        }
      });
    }
  },
  components: {
    ckeditor: CKEditor.component,
    SelectBox,
    DatePicker,
    Loading
  }
};
</script>

<style>
.relative ol {
  list-style: decimal inside !important;
}
.relative ul {
  list-style: disc inside !important;
}
.relative .ck-editor__editable_inline {
  min-height: 200px !important;
}
button.submit {
  border: none;
}
</style>
