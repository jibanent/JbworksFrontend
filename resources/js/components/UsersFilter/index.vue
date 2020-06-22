<template>
  <div class="dd -cmenuw" data-param="user">
    <em>{{ userSelected }}</em>
    <div class="-cmenu -padding -no-icon">
      <div
        class="-item url"
        :class="{ active: !userId }"
        @click="handleFilterByUser()"
      >
        Tất cả
      </div>
      <div
        class="-item url"
        :class="{ active: user.id === userId }"
        v-for="user in users"
        :key="user.id"
        @click="handleFilterByUser(user.id)"
      >
        {{ user.name }}
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "users-filter",
  props: {
    users: { type: Array, default: () => [] },
    userId: { type: Number }
  },
  computed: {
    userSelected() {
      const user = this.users.filter(user => user.id === this.userId);
      if (user[0]) return user[0].name;
      return "Tất cả thành viên";
    }
  },
  methods: {
    handleFilterByUser(userId) {
      this.$emit("filterTasksByUser", userId);
    }
  }
};
</script>

<style></style>
