<template>
  <div class="section js-project-overview" v-if="project">
    <div class="overview">
      <div id="js-project-overview">
        <div class="box projinfo">
          <div class="projname">{{ project.name }}</div>
          <div class="projdesc">
            <span class="icon-desc"></span>
            <span
              class="text-a"
              v-html="project.description ? project.description : 'Chưa có mô tả'"
            ></span>
          </div>
          <div class="row">
            <span class="ficon-check-square-o icon"></span>
            {{ project.stats.completed_ontime + project.stats.completed_late }}/{{ project.stats.total }} hoàn thành
            <div class="v -dd url inline">
              <b>{{ ((project.stats.completed_ontime + project.stats.completed_late)/project.stats.total).toFixed(3) * 100 || 0 }}</b>%
            </div>
          </div>
          <div class="bar -infow">
            <div
              class="c"
              style="background-color: #49E33B"
              :style="`width: ${((project.stats.completed_ontime + project.stats.completed_late)/project.stats.total) * 100}%`"
            ></div>
          </div>
          <div class="row">
            <span class="ficon-bookmark-o icon"></span>
            <div class="v -full">
              <span class="url">
                <span
                  class="none"
                >{{project.start_date ? formatDate(project.start_date) : 'Ngày bắt đầu' }}</span>
              </span> -
              <span class="url">
                <span
                  class="none"
                >{{project.finish_date ? formatDate(project.finish_date) : 'Ngày kết thúc' }}</span>
              </span>
            </div>
          </div>
          <div class="row">
            <span class="ficon-folder-o icon"></span> Phòng ban
            <div class="v -dd url inline">{{ project.department }}</div>
          </div>
        </div>
        <div class="subsection">
          <div class="subheader">
            <div class="icon">
              <div class="icon-desc -left" style="width:12px; margin-top:4px;"></div>
            </div>
            <div class="title -dd url">{{ project.participants.length }} thành viên</div>
            <div class="users">
              <project-participants
                v-for="item in project.participants"
                :key="item.id"
                :participant="item"
              />
            </div>
          </div>
        </div>

        <div class="subsection">
          <div class="subheader">
            <div class="icon">
              <span class="ficon-circle" :style="`color:${project.status.color}`"></span>
            </div>
            <div class="title -dd url">Trạng thái</div>
            <div
              class="side url inline"
              :style="`color: #FFF; background-color: ${project.status.color}`"
            >{{ project.status.name }}</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import moment from "moment";
import ProjectParticipants from "../ProjectParticipants";
export default {
  name: "tasks-by-project-side-overview",
  props: {
    project: { type: Object, default: null }
  },
  methods: {
    formatDate(date) {
      return moment(date).format("DD/MM/YYYY");
    }
  },
  components: {
    ProjectParticipants
  }
};
</script>

<style>
</style>
