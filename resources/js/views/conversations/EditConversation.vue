<template>
  <div id="apdialogs" style="display: block;" v-if="openEditConversation">
    <div
      class="__customdialog -full selection-list __temp __dialog __canvas_closable"
      style="right: 17px; display: none;"
    >
      <div class="__closable"></div>
      <div class="__dialogwrapperscroller scroll-y forced-scroll">
        <div class="full-mask"></div>
        <div class="__dialogwrapper" style="left: 760px; top: 210.5px;">
          <div class="__dialogwrapper-inner">
            <div class="__dialogmain">
              <div class="__dialogtitle ap-xdot">Untitled</div>
              <div class="__dialogcontent simple-form">
                <div id="custom-selection" class="__apdialog" title style="width: 400px;"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="clear"></div>
      </div>
    </div>
    <div class="__fdialog __temp __dialog __canvas_closable __dialog_ontop">
      <div class="__closable"></div>
      <div class="__fdialogwrapper scroll-y forced-scroll">
        <div class="__dialogwrapper">
          <div class="__dialogwrapper-inner">
            <div class="__dialogmain">
              <div class="__dialogtitlewrap">
                <div class="left relative">
                  <div class="__dialogtitle unselectable ap-xdot">Edit conversation</div>
                  <div class="__dialogtitlerender tx-fill"></div>
                </div>
                <div class="clear"></div>
              </div>
              <div class="__dialogclose" @click="$store.commit('TOGGLE_EDIT_CONVERSATION')">
                <span class="-ap icon-close"></span>
              </div>
              <div class="__dialogcontent">
                <div id="popform" class="__apdialog" title style="width: 450px;">
                  <div class="form form-dialog">
                    <form @submit.prevent="handleUpdateConversation">
                      <div class="form-rows">
                        <div class="row -istext" id="_uuid65252_8808_1599445325">
                          <div class="label">Conversation name *</div>
                          <div class="input data">
                            <input type="text" v-model="name" />
                          </div>
                          <div
                            class="validate-error"
                            v-for="error in errors.name"
                            :key="error.id"
                          >{{ error }}</div>
                          <div class="clear"></div>
                        </div>
                      </div>
                      <div class="form-buttons -two">
                        <button type="submit" class="button ok -success -rounded bold">Save</button>
                        <div
                          class="button cancel -passive-2 -rounded"
                          @click="$store.commit('TOGGLE_EDIT_CONVERSATION')"
                        >Cancel</div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <loading :class="{ show: isSubmitting }" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions, mapState } from "vuex";
import Loading from "../../components/Loading";
export default {
  name: "edit-conversation",
  data() {
    return {
      name: "",
      errors: [],
    };
  },
  watch: {
    conversation(conversation) {
      this.name = conversation.name;
    },
  },
  computed: {
    ...mapState({
      openEditConversation: (state) => state.conversations.openEditConversation,
      conversation: (state) => state.conversations.conversation,
      isSubmitting: state => state.isSubmitting
    }),
  },
  methods: {
    ...mapActions(["updateConversation"]),
    handleUpdateConversation() {
      const data = { name: this.name };
      const { id } = this.conversation;
      this.updateConversation({ data, id }).then((response) => {
        if (!response.error) {
          this.$store.commit("TOGGLE_EDIT_CONVERSATION");
        } else {
          this.errors = response.message;
        }
      });
    },
  },
  components: {
    Loading
  }
};
</script>

<style>
</style>
