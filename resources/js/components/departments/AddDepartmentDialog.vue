<template>
  <div id="apdialogs" style="display: block;" v-if="showAddDepartmentDialog">
    <div class="__fdialog __temp __dialog __dialog_ontop">
      <div class="__fdialogwrapper scroll-y forced-scroll">
        <div class="__dialogwrapper" style="top: 50%; left: 50%; transform: translate(-50%, -50%)">
          <div class="__dialogwrapper-inner">
            <div class="__dialogmain">
              <div class="__dialogtitlewrap">
                <div class="left relative">
                  <div class="__dialogtitle unselectable ap-xdot">Tạo mới phòng ban</div>
                  <div class="__dialogtitlerender tx-fill"></div>
                </div>
                <div class="clear"></div>
              </div>
              <div class="__dialogclose" @click="closeAddDepartmentDialog">
                <span class="-ap icon-close"></span>
              </div>
              <div class="__dialogcontent">
                <div id="fly-tasklist-dx" class="__apdialog" title style="width: 480px;">
                  <div class="form form-dialog -flat">
                    <form @submit.prevent="handleCreateDepartment">
                      <div class="row -istext -big -active">
                        <div class="label">Tên phòng ban *</div>
                        <div class="input data">
                          <input
                            v-model="name"
                            placeholder="Tên phòng ban"
                            class="std __ap_enter_binded"
                          />
                        </div>
                        <div
                          class="validate-error"
                          v-for="error in errors.name"
                          :key="error.id"
                        >{{ error }}</div>
                        <div class="clear"></div>
                      </div>
                      <div class="row -istext -big -active" id="_uuid12707_36104_1590370472">
                        <div class="label">Quản lý phòng ban *</div>
                        <div class="input data">
                          <multiselect
                            v-model="manager"
                            label="name"
                            track-by="id"
                            placeholder="Quản lý phòng ban *"
                            open-direction="bottom"
                            :options="users"
                            :searchable="true"
                            :internal-search="true"
                            :clear-on-select="true"
                            :close-on-select="true"
                            :options-limit="300"
                            :limit="10"
                            :max-height="600"
                            :custom-label="customLabel"
                          >
                            <template slot="option" slot-scope="props">
                              <img class="option__image" :src="props.option.avatar" />
                              <div class="option__desc">
                                <span class="option__title">{{ props.option.name }}</span>
                                <span>-</span>
                                <span class="option__small">{{ props.option.position }}</span>
                              </div>
                            </template>
                          </multiselect>
                        </div>
                        <div
                          class="validate-error"
                          v-for="error in errors.manager_id"
                          :key="error.id"
                        >{{ error }}</div>
                        <div class="clear"></div>
                      </div>
                      <div class="form-buttons -two">
                        <button type="submit" class="button ok -success -rounded bold">Create</button>
                        <div
                          class="button cancel -passive-2 -rounded"
                          @click="closeAddDepartmentDialog"
                        >Hủy</div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <loading :class="{show: isSubmitting}" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Multiselect from "vue-multiselect";
import { mapActions } from "vuex";
import Loading from '../common/Loading'
export default {
  name: "add-department-dialog",
  props: {
    users: { type: Array, default: [] },
    currentUser: { type: Object, default: null },
    showAddDepartmentDialog: { type: Boolean, default: false },
    isSubmitting: { type: Boolean, default: false}
  },
  data() {
    return {
      name: "",
      manager: null,
      errors: {}
    };
  },
  methods: {
    ...mapActions(["createDepartment"]),
    handleCreateDepartment() {
      const data = {
        name: this.name,
        manager_id: this.manager ? this.manager.id : null,
        created_by: this.currentUser ? this.currentUser.id : null
      };
      this.createDepartment(data).then(response => {
        if (!response.error) {
          this.closeAddDepartmentDialog();
          this.$notify({
            group: "notify",
            type: "success",
            text: "Thêm mới phòng ban thành công!"
          });
        } else {
          this.errors = response.message;
        }
      });
    },
    closeAddDepartmentDialog() {
      this.name = "";
      this.manager = "";
      this.errors = {};
      this.$store.commit("TOGGLE_ADD_DEPARTMENT_DIALOG");
    },
    customLabel({ name, position }) {
      return `${name}`;
    }
  },
  components: {
    Multiselect,
    Loading
  }
};
</script>

<style>
</style>
