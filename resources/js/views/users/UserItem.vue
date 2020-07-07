<template>
  <tr class="li item-9136">
    <td></td>
    <td>
      <div class="user">
        <div class="avatar avatar-32">
          <div class="image">
            <img :src="avatar(user.avatar)" />
          </div>
        </div>
        <div class="title url ap-xdot">{{ user.name }}</div>
        <div class="info ap-xdot">{{ user.position }}</div>
      </div>
    </td>
    <td>
      <div class="relative">
        <div class="absolute ap-xdot">{{ user.phone }}</div>
      </div>
    </td>
    <td>
      <div class="relative">
        <div class="absolute ap-xdot">{{ user.email }}</div>
      </div>
    </td>
    <td>
      <div class="users clear-fix">
        <div class="avatar avatar-32 -circled url">
          <div class="image">
            <img :src="avatar(user.department.manager.avatar)" />
          </div>
        </div>
      </div>
    </td>
  </tr>
</template>

<script>
import { getAvatar } from "../../helpers";
export default {
  name: "user-item",
  props: {
    user: { type: Object, default: null }
  },
  methods: {
    avatar(avatar) {
      return getAvatar(avatar);
    }
  }
};
</script>

<style>
</style>
