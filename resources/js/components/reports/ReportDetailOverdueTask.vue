<template>
  <div class="box std" data-col="8,9" style="width: 33.33%;">
    <div class="inner">
      <div class="header">
        Công việc không đúng hạn
        <div class="side"></div>
      </div>
      <div class="body -fit">
        <div class="scrollbox scroll-y -smaller" id="js-task-late-report">
          <div class="istats">
            <div class="istat">
              <div
                class="percent"
                data-bg="#e5e5e5"
                data-percent="31.6"
                data-text="31.6%"
                data-color="#c34343"
              >
                <svg class="Sektor" viewBox="0 0 100 100">
                  <circle
                    class="Sektor-circle"
                    stroke-width="10"
                    fill="none"
                    stroke="#e5e5e5"
                    cx="50"
                    cy="50"
                    r="45"
                  />
                  <path
                    class="Sektor-sector"
                    stroke-width="10"
                    fill="none"
                    stroke="#c34343"
                    d="M50,5 A45,45 1 0 1 91.1858527679413,68.13078960711482  "
                  />
                </svg>
                <div class="inner-text">31.6%</div>
              </div>
              <div class="stat">
                <div class="number">
                  <em style="color:#c34343">367</em>
                </div>
                <div class="sub">overdue tasks</div>
                <div class="sub ap-xdot">
                  over
                  <em>1163</em> active tasks
                </div>
              </div>
            </div>
            <div class="istat">
              <div
                class="percent"
                data-bg="#e5e5e5"
                data-percent="14.6"
                data-text="14.6%"
                data-color="#f7e015"
              >
                <svg class="Sektor" viewBox="0 0 100 100">
                  <circle
                    class="Sektor-circle"
                    stroke-width="10"
                    fill="none"
                    stroke="#e5e5e5"
                    cx="50"
                    cy="50"
                    r="45"
                  />
                  <path
                    class="Sektor-sector"
                    stroke-width="10"
                    fill="none"
                    stroke="#f7e015"
                    d="M50,5 A45,45 1 0 1 85.72956793915259,22.643136603742757  "
                  />
                </svg>
                <div class="inner-text">14.6%</div>
              </div>
              <div class="stat">
                <div class="number">
                  <em style="color:#f7e015">41</em>
                </div>
                <div class="sub">late completed tasks</div>
                <div class="sub ap-xdot">
                  over
                  <em>280</em> completed tasks
                </div>
              </div>
            </div>
            <div class="istat">
              <div class="plain">
                <span class="icon ficon-exclamation-circle"></span>
                <b class="js-count" data-key="tasks_no_deadline">753</b>
                tasks are created without deadline
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="s" style="padding-bottom:112.5%"></div>
  </div>
</template>

<script>
export default {
  name: "report-detail-overdue-task"
};
</script>

<style>
</style>
