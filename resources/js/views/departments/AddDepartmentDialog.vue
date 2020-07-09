<template>
  <div id="apdialogs" v-if="showAddDepartmentDialog">
    <div class="__fdialog __temp __dialog __dialog_ontop">
      <div class="__fdialogwrapper scroll-y forced-scroll">
        <div class="__dialogwrapper">
          <div class="__dialogwrapper-inner">
            <div class="__dialogmain">
              <div class="__dialogtitlewrap">
                <div class="left relative">
                  <div
                    class="__dialogtitle unselectable ap-xdot"
                  >{{ $t('departments.create a new department') }}</div>
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
                        <div class="label">{{ $t('departments.department name') }} *</div>
                        <div class="input data">
                          <input
                            v-model="name"
                            :placeholder="$t('departments.department name')"
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
                        <div class="label">{{ $t('departments.department manager') }}*</div>
                        <select-box
                          :options="users.data"
                          :vModel="manager"
                          :placeholder="$t('departments.department manager')"
                          @search-change="handleSearchUsers"
                          :isLoading="isLoading"
                          @input="onChange"
                        />
                        <div
                          class="validate-error"
                          v-for="error in errors.manager_id"
                          :key="error.id"
                        >{{ error }}</div>
                        <div class="clear"></div>
                      </div>
                      <div class="form-buttons -two">
                        <button
                          type="submit"
                          class="button ok -success -rounded bold"
                        >{{ $t('common.save') }}</button>
                        <div
                          class="button cancel -passive-2 -rounded"
                          @click="closeAddDepartmentDialog"
                        >{{ $t('common.cancel') }}</div>
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
import Multiselect from "vue-multiselect";
import { mapActions } from "vuex";
import Loading from "../../components/Loading";
import SelectBox from "../../components/SelectBox";
import { message } from "../../helpers";
export default {
  name: "add-department-dialog",
  props: {
    users: { type: Object, default: null },
    currentUser: { type: Object, default: null },
    showAddDepartmentDialog: { type: Boolean, default: false },
    isSubmitting: { type: Boolean, default: false }
  },
  data() {
    return {
      page: 1,
      name: "",
      manager: null,
      errors: {},
      isLoading: false
    };
  },
  methods: {
    ...mapActions(["createDepartment", "getUsers"]),
    handleCreateDepartment() {
      const data = {
        name: this.name,
        manager_id: this.manager ? this.manager.id : null,
        created_by: this.currentUser ? this.currentUser.id : null
      };
      this.createDepartment(data).then(response => {
        if (!response.error) {
          this.closeAddDepartmentDialog();
          this.$notify(
            message(
              "success",
              this.$t("messages.new department has been created successfully")
            )
          );
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
    handleSearchUsers(search) {
      this.isLoading = true;
      this.getUsers({ search }).then(() => {
        this.isLoading = false;
      });
    },
    onChange(selected) {
      this.manager = selected;
    }
  },
  components: {
    Loading,
    SelectBox
  }
};
</script>

<style></style>
