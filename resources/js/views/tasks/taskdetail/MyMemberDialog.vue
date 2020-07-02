<template>
  <div id="apdialogs" v-if="showMyMembersDialog">
    <div class="__fdialog __temp __dialog __canvas_closable __dialog_ontop">
      <div class="__closable"></div>
      <div class="__fdialogwrapper scroll-y forced-scroll">
        <div class="__dialogwrapper">
          <div class="__dialogwrapper-inner">
            <div class="__dialogmain">
              <div id="custom-selection" class="__apdialog __canvas">
                <div class="title">
                  {{ $t('tasks.select one person to reassign task') }}
                  <div class="-close" @click="closeMyMembersDialog"></div>
                </div>
                <div class="isearch">
                  <input
                    :value="strSearch"
                    @input="handleSearchMyUser"
                    :placeholder="$t('tasks.type here to quickly filter people')"
                  />
                </div>
                <div class="rh" style="max-height:273px; min-height:150px; overflow-y:auto;">
                  <div class="list list-actions with-image -border">
                    <div
                      class="li item unselectable"
                      v-for="item in myMembers"
                      :key="item.id"
                      @click="assignTaskToOtherUser(item.id)"
                    >
                      <div class="image">
                        <div class="avatar">
                          <img :src="avatar(item.avatar)" />
                        </div>
                      </div>
                      <b>{{ item.name }}</b>
                      <div class="sub">{{ item.username }}</div>
                      <div class="-ricon">
                        <span class="-select"></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { getAvatar, message } from "../../../helpers";
import { mapActions } from "vuex";
export default {
  name: "my-member-dialog",
  props: {
    showMyMembersDialog: { type: Boolean, default: false },
    myMembers: { type: Array, default: [] },
    strSearch: { type: String, default: "" },
    task: { type: Object, default: null }
  },
  methods: {
    ...mapActions(["updateAssignedTo"]),
    avatar(url) {
      return getAvatar(url);
    },
    handleSearchMyUser(e) {
      this.$emit("handleSearchMyUser", e.target.value);
    },
    closeMyMembersDialog() {
      this.$emit("handleSearchMyUser", "");
      this.$store.commit("TOGGLE_MY_MEMBERS_DIALOG");
    },
    assignTaskToOtherUser(assignedTo) {
      this.updateAssignedTo({ taskId: this.task.id, assignedTo }).then(
        response => {
          if (!response.error) {
            this.closeMyMembersDialog();
            this.$notify(
              message("success", this.$t("messages.updated successfully"))
            );
          }
        }
      );
    }
  }
};
</script>

<style>
</style>
