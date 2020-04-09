<template>
  <div>
    <user-header />

    <div id="project-master" class="simple scroll-y forced-scroll" style="top:65px">
      <div id="collection" class="compact">
        <div class="table">
          <table>
            <thead>
              <tr class="theader">
                <th style="width:5px">&nbsp;</th>
                <th>
                  <div class="lead" style="margin-left:-20px">Họ và tên</div>
                </th>
                <th style="width:20%">Số điện thoại</th>
                <th style="width:20%">Email</th>
                <th style="width:20%">Người quản lý</th>
                <th style="width:150px">&nbsp;</th>
              </tr>
            </thead>
            <tbody>
              <user-item v-for="user in users" :key="user.id" :user="user" />
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions, mapState } from "vuex";
import UserHeader from "./UserHeader";
import UserItem from "./UserItem";
export default {
  name: "users",
  data() {
    return {};
  },
  created() {
    this.getUsers();
  },
  computed: {
    ...mapState({
      users: state => state.users.users
    })
  },
  methods: {
    ...mapActions(["getUsers"])
  },
  components: {
    UserHeader,
    UserItem
  }
};
</script>


