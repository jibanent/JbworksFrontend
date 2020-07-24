<template>
  <div id="apdialogs" v-if="showEditDepartmentDialog">
    <div class="__fdialog __temp __dialog __dialog_ontop">
      <div class="__fdialogwrapper scroll-y forced-scroll">
        <div class="__dialogwrapper">
          <div class="__dialogwrapper-inner">
            <div class="__dialogmain">
              <div class="__dialogtitlewrap">
                <div class="left relative">
                  <div
                    class="__dialogtitle unselectable ap-xdot"
                  >{{ $t('departments.edit department') }}</div>
                  <div class="__dialogtitlerender tx-fill"></div>
                </div>
                <div class="clear"></div>
              </div>
              <div class="__dialogclose" @click="closeEditDepartmentDialog">
                <span class="-ap icon-close"></span>
              </div>
              <div class="__dialogcontent">
                <div id="fly-tasklist-dx" class="__apdialog" title style="width: 480px;">
                  <div class="form form-dialog -flat">
                    <form @submit.prevent="handleUpdateDepartment">
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
                        <div class="label">{{ $t('departments.department manager') }}*</div>
                        <select-box
                          :options="users.data"
                          :vModel="manager"
                          :placeholder="$t('departments.department manager')"
                          :isLoading="isLoading"
                          @input="onChange"
                          :value="manager"
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
                          @click="closeEditDepartmentDialog"
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
  name: "edit-department-dialog",
  props: {
    departments: { type: Object, default: {} },
    department: { type: Object, default: {} },
    users: { type: Object, default: null },
    currentUser: { type: Object, default: null },
    showEditDepartmentDialog: { type: Boolean, default: false },
    isSubmitting: { type: Boolean, default: false }
  },
  data() {
    return {
      page: 1,
      name: "",
      manager: {},
      errors: {},
      isLoading: false,
      errors: {},
      normalizer(node) {
        return {
          id: node.id,
          label: node.name,
          children: node.children
        };
      }
    };
  },
  watch: {
    department(department) {
      this.setFormData(department);
    }
  },
  computed: {
    departmentsTree() {
      let arr = [];
      if (this.$auth.isAdmin()) {
        arr.push({ id: 0, name: "== ROOT ==" }, ...this.departments.data);
      } else {
        arr.push(...this.departments.data);
      }
      return arr;
    }
  },
  methods: {
    ...mapActions(["updateDepartment"]),
    handleUpdateDepartment() {
      const data = {
        name: this.name,
        manager_id: this.manager ? this.manager.id : null
      };
      const id = this.department.id;
      this.updateDepartment({ data, id }).then(response => {
        console.log(response);
        if (!response.error) {
          this.closeEditDepartmentDialog();
          this.$notify(
            message("success", this.$t("messages.updated successfully"))
          );
        } else {
          this.errors = response.message;
        }
      });
    },
    closeEditDepartmentDialog() {
      this.setFormData(this.department);
      this.$store.commit("TOGGLE_EDIT_DEPARTMENT_DIALOG");
    },
    onChange(selected) {
      this.manager = selected;
    },
    setFormData(department) {
      this.name = department.name;
      this.parent_id = department.parent_id;
      this.manager = this.users.data.find(user => {
        console.log('user', user);
        console.log('department', department);
        return user.id === department.manager.id;
      });
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
