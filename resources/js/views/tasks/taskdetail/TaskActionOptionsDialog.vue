<template>
  <div id="apdialogs" v-if="showTaskActionOptionsDialog">
    <div
      class="__customdialog -full selection-list __temp __dialog __canvas_closable __dialog_ontop"
    >
      <div class="__closable"></div>
      <div
        class="__dialogwrapperscroller scroll-y forced-scroll"
        @click="$store.commit('TOGGLE_TASK_ACTION_OPTION_DIALOG')"
      >
        <div class="__dialogwrapper">
          <div class="__dialogwrapper-inner">
            <div class="__dialogmain">
              <div class="__dialogtitle ap-xdot">Untitled</div>
              <div class="__dialogcontent simple-form">
                <div id="custom-selection" class="__apdialog" style="width: 400px;">
                  <div class="list list-actions -border">
                    <div
                      class="li item unselectable"
                      @click="$store.commit('TOGGLE_EDIT_TASK_DIALOG')"
                    >
                      <span class="-icon">
                        <span class="-ap icon-pen"></span>
                      </span>
                      {{ $t('tasks.edit this task') }}
                      <small>{{ $t('tasks.edit general information') }}</small>
                      <div class="-ricon">
                        <span class="ficon-angle-right"></span>
                      </div>
                    </div>
                    <div
                      class="li item unselectable"
                      @click="$store.commit('TOGGLE_MY_MEMBERS_DIALOG')"
                      v-if="task.status.slug !== 'done'"
                    >
                      <span class="-icon">
                        <span class="-ap icon-user5"></span>
                      </span>
                      {{ $t('tasks.reassign this task') }}
                      <small>{{ $t('tasks.reassign this task') }}</small>
                      <div class="-ricon">
                        <span class="ficon-angle-right"></span>
                      </div>
                    </div>
                    <div class="li item unselectable">
                      <span class="-icon">
                        <span class="-ap icon-squared-plus"></span>
                      </span>
                      {{ $t('tasks.duplicate task') }}
                      <small>{{ $t('tasks.duplicate this task') }}</small>
                      <div class="-ricon">
                        <span class="ficon-angle-right"></span>
                      </div>
                    </div>
                    <div class="li item unselectable">
                      <span class="-icon">
                        <span class="-ap icon-squared-plus"></span>
                      </span>
                      {{ $t('tasks.copy this task to other project') }}
                      <small>{{ $t('tasks.copy this task to other project') }}</small>
                      <div class="-ricon">
                        <span class="ficon-angle-right"></span>
                      </div>
                    </div>
                    <div class="li item unselectable" @click="showConfirmDeleteTask">
                      <span class="-icon">
                        <span class="-ap icon-delete"></span>
                      </span>
                      {{ $t('tasks.delete task') }}
                      <small>{{ $t('tasks.delete this task') }}</small>
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
    showTaskActionOptionsDialog: { type: Boolean, default: false },
    task: { type: Object, default: null }
  },
  methods: {
    showConfirmDeleteTask() {
      this.$store.commit("TOGGLE_CONFIRM_DELETE_TASK");
      this.$store.commit("SET_TASK_EDITING", this.task);
    }
  }
};
</script>

<style>
</style>
