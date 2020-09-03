<template>
  <div>
    <user-header @search="handleSearch" />

    <div id="project-master" class="simple scroll-y forced-scroll" style="top:65px">
      <div id="collection" class="compact">
        <div class="table">
          <table>
            <thead>
              <tr class="theader">
                <th style="width:5px">&nbsp;</th>
                <th>
                  <div class="lead" style="margin-left:-20px">{{ $t('users.full name') }}</div>
                </th>
                <th style="width:20%">{{ $t('users.phone') }}</th>
                <th style="width:20%">{{ $t('users.email address') }}</th>
                <th style="width:20%">{{ $t('users.manager') }}</th>
              </tr>
            </thead>
            <tbody>
              <user-item v-for="user in users.data" :key="user.id" :user="user" :usersOnline="usersOnline" />
            </tbody>
          </table>
        </div>
        <pagination
          :page="page"
          :lastPage="users.meta.last_page"
          @pagination="handlePagination"
          v-if="users.meta"
        />
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions, mapState } from "vuex";
import UserHeader from "./UserHeader";
import UserItem from "./UserItem";
import Pagination from "../../components/Pagination";
export default {
  name: "users",
  data() {
    return {
      page: 1,
      params: {
        search: null
      }
    };
  },
  created() {
    this.handleGetUser();
    this.getRoles();
    if (this.$auth.isAdmin()) this.getDepartments();
    else this.getMyDepartments(this.currentUser.id);
  },
  computed: {
    ...mapState({
      users: state => state.users.users,
      currentUser: state => state.auth.currentUser,
      usersOnline: state => state.messages.usersOnline
    }),
  },
  methods: {
    ...mapActions([
      "getUsers",
      "getDepartments",
      "getRoles",
      "getMyDepartments",
      "getMyMembers"
    ]),
    handlePagination(val) {
      const lastPage = this.users.meta.last_page;
      if (val === "prev" && this.page > 1) this.page--;
      else if (val === "next" && this.page < lastPage) this.page++;
      else return false;
      this.handleGetUser();
    },
    handleGetUser() {
      const { page, params } = this;
      const data = { page, ...params };
       if (this.$auth.isAdmin()) this.getUsers(data);
       else this.getMyMembers(data)
    },
    handleSearch(query) {
      Object.keys(query).forEach(key => {
        this.params[key] = query[key];
      });
      this.handleGetUser();
    }
  },
  components: {
    UserHeader,
    UserItem,
    Pagination
  }
};
</script>


