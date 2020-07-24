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
                      <div class="row -istext -big -active">
                        <div class="label">{{ $t('departments.departments') }}</div>
                        <treeselect
                          v-model="parent_id"
                          :options="departmentsTree"
                          :normalizer="normalizer"
                          :placeholder="$t('departments.departments')"
                          :clearable="false"
                        />
                        <div class="clear"></div>
                      </div>
                      <div class="row -istext -big -active">
                        <div class="label">{{ $t('departments.department manager') }}*</div>
                        <select-box
                          :options="users.data"
                          :vModel="manager"
                          :placeholder="$t('departments.department manager')"
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
import Treeselect from "@riophae/vue-treeselect";
import "@riophae/vue-treeselect/dist/vue-treeselect.css";
export default {
  name: "add-department-dialog",
  props: {
    departments: { type: Object, default: null },
    users: { type: Object, default: null },
    currentUser: { type: Object, default: null },
    showAddDepartmentDialog: { type: Boolean, default: false },
    isSubmitting: { type: Boolean, default: false }
  },
  data() {
    return {
      page: 1,
      parent_id: 0,
      name: "",
      manager: null,
      errors: {},
      isLoading: false,
      normalizer(node) {
        return {
          id: node.id,
          label: node.name,
          children: node.children
        };
      }
    };
  },
  computed: {
    departmentsTree() {
      let arr = [];
      if (this.$auth.isAdmin()) {
        arr.push({ id: 0, name: "== ROOT ==" }, ...this.departments.data);
      } else {
        this.parent_id = this.departments.data[0].id;
        arr.push(...this.departments.data);
      }
      return arr;
    }
  },
  methods: {
    ...mapActions(["createDepartment"]),
    handleCreateDepartment() {
      const data = {
        parent_id: this.parent_id,
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
      if (this.$auth.isAdmin()) this.parent_id = 0;
      else this.parent_id = this.departments.data[0].id;
      this.name = "";
      this.manager = "";
      this.errors = {};
      this.$store.commit("TOGGLE_ADD_DEPARTMENT_DIALOG");
    },
    onChange(selected) {
      this.manager = selected;
    }
  },
  components: {
    Loading,
    SelectBox,
    Treeselect
  }
};
</script>

<style></style>
