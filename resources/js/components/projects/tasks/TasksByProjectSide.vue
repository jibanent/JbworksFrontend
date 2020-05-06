<template>
  <div id="project-side-canvas">
    <div id="project-side">
      <tasks-by-project-side-overview :project="project" />
      <div class="section js-me-overview">
        <div id="js-side-me">
          <div class="box">
            <div class="box-title">Công việc của tôi</div>
            <div class="mstats">
              <div class="stat">
                <em>
                  <span class="s d -bg-alt3"></span>0
                </em> Phải làm
              </div>
              <div class="stat">
                <em>
                  <span class="s d -bg-alt5"></span>0
                </em> Đang làm
              </div>
              <div class="stat">
                <em>
                  <span class="s d -bg-success"></span>1
                  <span></span>
                </em> Hoàn thành
              </div>
            </div>
            <div class="bar -infow">
              <div class="c" style="background-color: #49E33B; width:100.00%"></div>
              <span class="-infobox -up -w200">
                <span class="-box block normal">
                  Current completion:
                  55.56%
                </span>
              </span>
            </div>
          </div>
          <div class="subsection active">
            <div class="subheader">
              <div class="icon">
                <span class="ficon-asterisk red"></span>
              </div>
              <div class="title -dd url" data-url=":active:parent:parent">
                <b class="red ap-f15">
                  Cần lưu
                  ý
                </b>
              </div>
              <div class="side">
                <span class="count"></span>
              </div>
            </div>
            <div class="body" id="js-side-attentions"></div>
          </div>
          <div class="subsection">
            <div class="subheader">
              <div class="icon">
                <span class="ficon-inbox"></span>
              </div>
              <div class="title -dd url" data-url=":active:parent:parent">Mới được giao</div>
              <div class="side">
                <span class="count"></span>
              </div>
            </div>
            <div class="body" id="js-side-assigned"></div>
          </div>
          <div class="subsection">
            <div class="subheader">
              <div class="icon">
                <span class="ficon-inbox"></span>
              </div>
              <div class="title -dd url" data-url=":active:parent:parent">Giao đi &amp; quá hạn</div>
              <div class="side">
                <span class="count">1</span>
              </div>
            </div>
            <div class="body" id="js-side-assigning-late">
              <div class="task-elist">
                <div class="itask url" data-url="task/2487874" style="padding-right: 50px;">
                  <div class="sicon -doing"></div>
                  <div class="iname">
                    triển khai thực hiện Nghị định số 10/2020/NĐ-CP ngày 17/01/2020 của
                    chính phủ qu...
                  </div>
                  <div class="iside clear-fix">
                    <div class="tlabel -red">overdue</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <tasks-by-project-side-stats :project="project" />

    </div>
  </div>
</template>

<script>
import TasksByProjectSideOverview from "./TasksByProjectSideOverview";
import TasksByProjectSideStats from './TasksByProjectSideStats'
export default {
  name: "tasks-by-project-side",
  props: {
    project: { type: Object, default: null }
  },
  components: {
    TasksByProjectSideOverview,
    TasksByProjectSideStats
  }
};
</script>

<style>
</style>
