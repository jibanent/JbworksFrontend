<template>
  <div id="apdialogs" style="display: block;" v-if="showTaskActionOptionsDialog">
    <div
      class="__customdialog -full selection-list __temp __dialog __canvas_closable __dialog_ontop"
    >
      <div class="__closable"></div>
      <div class="__dialogwrapperscroller scroll-y forced-scroll" @click="$store.commit('TOGGLE_TASK_ACTION_OPTION_DIALOG')">
        <div class="__dialogwrapper" style="top: 50%; left: 50%; transform: translate(-50%, -50%)">
          <div class="__dialogwrapper-inner">
            <div class="__dialogmain">
              <div class="__dialogtitle ap-xdot">Untitled</div>
              <div class="__dialogcontent simple-form">
                <div id="custom-selection" class="__apdialog" title style="width: 400px;">
                  <div class="list list-actions -border">
                    <div class="li item unselectable" @click="$store.commit('TOGGLE_EDIT_TASK_DIALOG')">
                      <span class="-icon">
                        <span class="-ap icon-pen"></span>
                      </span> Chỉnh sửa thông tin công việc
                      <small>Chỉnh sửa các thông tin chính</small>
                      <div class="-ricon">
                        <span class="ficon-angle-right"></span>
                      </div>
                    </div>
                    <div class="li item unselectable">
                      <span class="-icon">
                        <span class="-ap icon-user5"></span>
                      </span> Giao lại cho người khác
                      <small>Giao công việc này cho người khác</small>
                      <div class="-ricon">
                        <span class="ficon-angle-right"></span>
                      </div>
                    </div>
                    <div class="li item unselectable">
                      <span class="-icon">
                        <span class="-ap icon-squared-plus"></span>
                      </span> Nhân bản công việc
                      <small>Nhân bản công việc này</small>
                      <div class="-ricon">
                        <span class="ficon-angle-right"></span>
                      </div>
                    </div>
                    <div class="li item unselectable">
                      <span class="-icon">
                        <span class="-ap icon-squared-plus"></span>
                      </span> Nhân bản công việc vào dự án khác
                      <small>Nhân bản công việc vào dự án-phòng ban khác</small>
                      <div class="-ricon">
                        <span class="ficon-angle-right"></span>
                      </div>
                    </div>
                    <div class="li item unselectable">
                      <span class="-icon">
                        <span class="-ap icon-delete"></span>
                      </span> Xóa công việc
                      <small>Xóa công việc này</small>
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
        <div class="clear"></div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "task-action-options-dialog",
  props: {
    showTaskActionOptionsDialog: { type: Boolean, default: false }
  }
};
</script>

<style>
</style>
