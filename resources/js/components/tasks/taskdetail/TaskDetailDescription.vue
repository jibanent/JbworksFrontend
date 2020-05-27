<template>
  <div class="task-desc" v-if="task">
    <div class="actions">
      <div
        class="action js-edit"
        @click="isEditing=true"
        v-if="$auth.can('edit task description')"
      >Chỉnh sửa</div>
    </div>
    <div class="title">Miêu tả công việc</div>
    <div class="edit-box js-task-content" :class="{editing: isEditing}">
      <div class="edit-display">
        <div class="desc acl-1">
          <div class="icon-desc -right"></div>
          <div class="no-content" v-if="task.description" v-html="task.description"></div>
          <div class="no-content" v-else>Chưa có mô tả cho công việc này</div>
        </div>
      </div>
      <div class="edit-form edit-content">
        <form @submit.prevent="handleUpdateTaskDescription">
          <div class="row edit-task-description">
            <ckeditor :editor="editor" v-model="description" :config="editorConfig"></ckeditor>
          </div>
          <div class="row clear-fix">
            <button class="button -cta url">Lưu</button>
            <div class="cancel url" @click="cancelEditTaskDescription">
              <span class="-ap icon-close"></span>
            </div>
          </div>
        </form>
      </div>
    </div>
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
import { mapActions } from "vuex";

export default {
  name: "task-detail-description",
  props: {
    task: { type: Object, default: null }
  },
  data() {
    return {
      isEditing: false,
      id: null,
      description: "",
      editor: ClassicEditor,
      editorConfig: {
        placeholder: "Mô tả công việc...",
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
    task(task) {
      this.id = task.id;
      this.description = task.description;
    }
  },
  components: {
    ckeditor: CKEditor.component
  },
  methods: {
    ...mapActions(["updateTaskDescription"]),
    cancelEditTaskDescription() {
      this.id = this.task.id;
      this.description = this.task.description;
      this.isEditing = false;
    },
    handleUpdateTaskDescription() {
      const { description, id } = this;
      this.updateTaskDescription({ description, id }).then(response => {
        if (!response.error) {
          this.cancelEditTaskDescription();
          this.$notify({
            group: "center",
            type: "success",
            text: "Cập nhật thành công!",
            position: "top center"
          });
        }
      });
    }
  }
};
</script>

<style>
.edit-task-description .ck-editor__editable {
  min-height: 100px;
}
</style>
