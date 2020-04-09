<template>
  <div class="section">
    <div class="overview" v-if="currentUser">
      <div class="box projinfo -with-image">
        <div class="image">
          <img :src="avatar" />
        </div>
        <div class="projname">{{ currentUser.name }}</div>
        <div class="projdesc">{{ currentUser.position }}</div>
        <div id="js-me-side-stats" v-if="isShowStats">
          <div class="row">
            <span class="ficon-check-square-o icon"></span> CV được giao
            <div class="v -dd url inline">
              <b>{{ percentage }}</b>%
            </div>
          </div>
          <div class="bar -infow">
            <div class="c" style="background-color: #49E33B; width:20.833333333333332%"></div>
          </div>
          <div class="row -upper">
            <div class="v -full">{{ myCompletedTask }}/ {{ myTotalTask }} hoàn thành</div>
          </div>
        </div>
      </div>
    </div>
    <div class="subsection">
      <div class="subheader">
        <div class="icon">
          <span class="ficon-asterisk"></span>
        </div>
        <div class="title -dd" title="In the last 07 days">Mới được giao</div>
      </div>
    </div>
    <div class="subsection">
      <div class="subheader">
        <div class="icon">
          <span class="ficon-asterisk"></span>
        </div>
        <div class="title -dd" title="In the last 07 days">Mới giao đi</div>
      </div>
    </div>
  </div>
</template>

<script>
import { getAvatar } from "../../helpers";
import { mapState } from "vuex";
export default {
  name: "task-side-info",
  data() {
    return {
      isShowStats: true
    };
  },
  props: {
    currentUser: { type: Object, default: null }
  },
  created() {
    if (this.$route.name === "tasks-department") {
      this.isShowStats = false;
    }

    if (this.$route.name === "tasks") {
      this.isShowStats = true;
    }
  },
  watch: {
    $route(to, from) {
      if (to.name === "tasks-department") {
        this.isShowStats = false;
      }

      if (to.name === "tasks") {
        this.isShowStats = true;
      }
    }
  },
  computed: {
    ...mapState({
      myTotalTask: state => state.tasks.myTotalTask,
      myCompletedTask: state => state.tasks.myCompletedTask
    }),
    percentage() {
      return (this.myCompletedTask / this.myTotalTask) * 100 || 0;
    },
    avatar() {
      return getAvatar(this.currentUser.avatar);
    }
  }
};
</script>

<style scoped>
.image img {
  object-fit: cover;
  object-position: center;
}
</style>
