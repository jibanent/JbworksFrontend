<template>
  <div id="apdialogs" style="display: block;" v-if="showConfirmDeleteTask">
    <div class="__wtdialog __apalert __dialog __dialog_ontop">
      <div class="__dialogwrapper" style="top: 50%; left: 50%; transform: translate(-50%, -50%)">
        <div class="__dialogwrapper-inner">
          <div class="__dialogmain">
            <div class="__dialogclose" @click="hideConfirmDeleteTask">
              <span class="-ap icon-close"></span>
            </div>
            <div class="__dialogcontent">
              <div id="alert" style class="__apdialog" title>
                <table>
                  <tbody>
                    <tr>
                      <td class="icon">
                        <span
                          class="ficon ficon-exclamation-circle"
                          style="font-size:42px; color:#c65144"
                        ></span>
                      </td>
                      <td
                        class="text"
                      >Bạn có chắc mình muốn xóa công việc này?</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="__dialogbuttons unselectable">
              <div class="button er confirm-button" @click="hideConfirmDeleteTask">Close</div>
              <div class="button ss confirm-button" @click="handleDeleteTask">OK</div>
            </div>
            <loading :class="{ show: isSubmitting }" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Loading from '../common/Loading'
import { mapActions } from 'vuex';
export default {
  name: 'confirm-delete-task',
  props: {
    showConfirmDeleteTask: {type: Boolean, default: false},
    taskSelected: {type: Object, default: null},
    isSubmitting: {type: Boolean, default: false}
  },
  methods: {
    ...mapActions(['deleteTask']),
    hideConfirmDeleteTask() {
      this.$store.commit('TOGGLE_CONFIRM_DELETE_TASK')
    },
    handleDeleteTask() {
      this.deleteTask(this.taskSelected).then(response => {
        if(!response.error) {
          this.hideConfirmDeleteTask();
          this.$notify({
            group: "notify",
            type: "success",
            text: "Xóa công việc thành công!"
          });
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
</style>
