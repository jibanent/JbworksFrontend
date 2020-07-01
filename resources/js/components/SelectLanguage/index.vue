<template>
  <div id="apdialogs" v-if="showSelectLanguage">
    <div class="__fdialog __temp __dialog __dialog_ontop __canvas_closable">
      <div class="__closable"></div>
      <div class="__fdialogwrapper scroll-y forced-scroll">
        <div class="__dialogwrapper">
          <div class="__dialogwrapper-inner">
            <div class="__dialogmain">
              <div class="__dialogtitlewrap">
                <div class="left relative">
                  <div class="__dialogtitle unselectable ap-xdot">Thay đổi ngôn ngữ</div>
                  <div class="__dialogtitlerender tx-fill"></div>
                </div>
                <div class="clear"></div>
              </div>
              <div class="__dialogclose" @click="hideSelectLanguage">
                <span class="-ap icon-close"></span>
              </div>
              <div class="__dialogcontent">
                <div class="__apdialog">
                  <div class="form form-dialog form-inline">
                    <form @submit.prevent="handleSetLanguage">
                      <div class="form-rows">
                        <div class="row -isselect">
                          <div class="label">
                            Tùy chọn ngôn ngữ
                            <div class="sublabel">Select your language</div>
                          </div>
                          <div class="select data">
                            <select v-model="language">
                              <option value="vi">Tiếng Việt | Vietnamese</option>
                              <option value="ja">日本人 | Japanese</option>
                            </select>
                          </div>
                          <div class="clear"></div>
                        </div>
                      </div>
                      <div class="form-buttons -two">
                        <button class="button ok -success -rounded bold">Thay đổi ngôn ngữ</button>
                        <div
                          class="button cancel -passive-2 -rounded"
                          @click="hideSelectLanguage"
                        >Bỏ qua</div>
                      </div>
                    </form>
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
export default {
  name: "select-language",
  props: {
    showSelectLanguage: { type: Boolean, default: false }
  },
  data() {
    return {
      language: "vi"
    };
  },
  methods: {
    hideSelectLanguage() {
      this.$store.commit("TOGGLE_SELECT_LANGUAGE");
    },
    handleSetLanguage() {
      const { language } = this;
      this.$i18n.locale = language;
      this.$store.dispatch("setLanguage", language);
      this.hideSelectLanguage();
      this.$store.commit('SET_COMPONENT_KEY');
      this.$notify({
        group: "notify",
        type: "success",
        text: "Đổi ngôn ngữ thành công!"
      });
    }
  }
};
</script>

<style>
</style>
