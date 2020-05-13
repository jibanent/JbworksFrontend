<template>
  <div id="apdialogs" style="width: 1937px; display: block;" v-if="showDialog">
    <div
      class="__customdialog -full __temp __dialog __dialog_ontop __canvas_closable"
      id="__apdialog_custom-selection"
      style="right: 17px;"
    >
      <div class="__closable" @click="closeDialogSelectProject"></div>
      <div class="__dialogwrapperscroller scroll-y forced-scroll">
        <div class="full-mask"></div>
        <div class="__dialogwrapper" style="left: 710px; top: 278px;">
          <div class="__dialogwrapper-inner">
            <div class="__dialogmain">
              <div class="__dialogcontent simple-form">
                <div id="custom-selection" class="__apdialog __canvas" style="width: 500px;">
                  <div class="title">
                    Select a project to create task
                    <div class="-dx-close" @click="closeDialogSelectProject"></div>
                  </div>
                  <div class="isearch">
                    <input type="text" placeholder="Type to quickly search" />
                  </div>
                  <div class="rh" style="max-height:769px; overflow-y:auto;">
                    <div class="list list-actions no-icon -border">
                      <div
                        class="li item unselectable"
                        v-for="project in projects"
                        :key="project.id"
                        @click="openAddTaskDialog(project)"
                      >
                        <div class="ap-xdot -name">{{ project.name }}</div>
                        <div class="-ricon">
                          <span class="ficon-angle-right"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="clear"></div>
      </div>
    </div>
  </div>
</template>


<script>
import { mapState } from "vuex";
export default {
  name: "select-project-dialog",
  computed: {
    ...mapState({
      showDialog: state => state.tasks.showDialogSelectProject,
      projects: state => state.tasks.myActiveProjects
    })
  },
  methods: {
    closeDialogSelectProject() {
      this.$store.commit("TOGGLE_DIALOG_SELECT_PROJECT");
    },
    openAddTaskDialog(project) {
      this.$emit('projectSelected', project);
      this.$store.commit("TOGGLE_ADD_TASK_DIALOG");
      this.closeDialogSelectProject();
    }
  }
};
</script>

<style>
</style>
