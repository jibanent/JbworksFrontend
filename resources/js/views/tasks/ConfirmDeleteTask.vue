<template>
  <div id="apdialogs" v-if="showConfirmDeleteTask">
    <div class="__wtdialog __apalert __dialog __dialog_ontop">
      <div class="__dialogwrapper">
        <div class="__dialogwrapper-inner">
          <div class="__dialogmain">
            <div class="__dialogclose" @click="hideConfirmDeleteTask">
              <span class="-ap icon-close"></span>
            </div>
            <div class="__dialogcontent">
              <div class="__apdialog">
                <table>
                  <tbody>
                    <tr>
                      <td class="icon">
                        <span
                          class="ficon ficon-exclamation-circle"
                          style="font-size:42px; color:#c65144"
                        ></span>
                      </td>
                      <td class="text">{{ $t('tasks.please confirm to remove this task') }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="__dialogbuttons unselectable">
              <div
                class="button er confirm-button"
                @click="hideConfirmDeleteTask"
              >{{ $t('common.close') }}</div>
              <div class="button ss confirm-button" @click="handleDeleteTask">{{ $t('common.ok') }}</div>
            </div>
            <loading :class="{ show: isSubmitting }" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Loading from "../../components/Loading";
import { mapActions } from "vuex";
import { message } from "../../helpers";
export default {
  name: "confirm-delete-task",
  props: {
    showConfirmDeleteTask: { type: Boolean, default: false },
    taskSelected: { type: Object, default: null },
    isSubmitting: { type: Boolean, default: false }
  },
  methods: {
    ...mapActions(["deleteTask"]),
    hideConfirmDeleteTask() {
      this.$store.commit("TOGGLE_CONFIRM_DELETE_TASK");
    },
    handleDeleteTask() {
      this.deleteTask(this.taskSelected).then(response => {
        if (!response.error) {
          this.hideConfirmDeleteTask();
          this.$notify(
            message("success", this.$t("messages.delete completed"))
          );
          if (this.$route.name === "task-detail") {
            this.$router.push("/tasks");
          }
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
