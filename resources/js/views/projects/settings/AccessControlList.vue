<template>
  <div id="setting">
    <div id="acl">
      <div class="title">Phân quyền sử dụng theo loại tài khoản</div>
      <div class="table">
        <table>
          <tr class="acl-header">
            <th>Phân quyền</th>
            <th
              style="width:110px"
              v-for="role in acl.roles"
              :key="role.id"
            >{{ role.name.replace(/^\w/, role => role.toUpperCase()) }}</th>
          </tr>
          <tr class="field" v-for="permission in acl.permissions" :key="permission.id">
            <td class="role">
              <div
                class="role-name"
              >{{ permission.name.replace(/^\w/, permission => permission.toUpperCase()) }}</div>
            </td>
            <td v-for="role in acl.roles" :key="role.id">
              <div
                class="status js-acl-atom"
                :class="{'-on': checked(role, permission), 'locked': role.name === 'admin'}"
                @click="handleGiveOrRevokePermission(role, permission)"
              ></div>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions, mapState } from "vuex";
export default {
  name: "access-control-list",
  created() {
    const projectId = this.$route.params.id;
    this.getProjectById(projectId);
    this.getAccessControlList();
  },
  methods: {
    ...mapActions([
      "getProjectById",
      "getAccessControlList",
      "giveOrRevokePermission"
    ]),
    checked(role, permission) {
      return role.permissions
        .map(item => {
          return item.name;
        })
        .includes(permission.name);
    },
    handleGiveOrRevokePermission(role, permission) {
      const data = {
        role: role.id,
        permission: permission.name,
        checked: this.checked(role, permission) ? false : true
      };
      if (role.name !== "admin") {
        this.giveOrRevokePermission(data);
      }
    }
  },
  computed: {
    ...mapState({
      project: state => state.projects.project,
      acl: state => state.roles.accessControlList
    })
  },
};
</script>

<style>
</style>
