<template>
  <div>
    <div id="header">
      <div class="nav">
        <span class="icon"></span>
      </div>
      <div class="title">
        <div class="icon -svg">
          <svg
            id="b9968c63-1737-4c46-9df2-e7447143ce17"
            data-name="Layer 1"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 14 14"
          >
            <title>icon music</title>
            <path
              d="M3,14a.5.5,0,0,1-.5-.5V1.5a.5.5,0,0,1,1,0v12A.5.5,0,0,1,3,14Z"
            ></path>
            <path
              d="M10.28,7.71H3.71A1.21,1.21,0,0,1,2.5,6.5v-5A1.22,1.22,0,0,1,3.71.28h6.57a1.22,1.22,0,0,1,1.15.81,1.2,1.2,0,0,1-.38,1.35L9.35,3.83a.22.22,0,0,0,0,.34l1.7,1.39a1.21,1.21,0,0,1-.77,2.15ZM3.71,1.28a.22.22,0,0,0-.21.22v5a.21.21,0,0,0,.21.21h6.57a.21.21,0,0,0,.21-.14.23.23,0,0,0-.07-.24L8.72,4.94A1.2,1.2,0,0,1,8.27,4a1.18,1.18,0,0,1,.45-.94l1.7-1.39h0a.23.23,0,0,0,.07-.24.2.2,0,0,0-.21-.15Z"
            ></path>
          </svg>
        </div>
        <div class="name">Báo cáo</div>
      </div>

      <div class="main">
        <div class="tabs auto-active-url">
          <div class="tab url active" data-url="reports">Báo cáo tổng hợp</div>
          <div class="tab url" data-url="reports/members">Members</div>
        </div>
      </div>
    </div>
    <div id="project-master" class="simple scroll-y forced-scroll -gray">
      <div class="canvas">
        <div id="db-canvas">
          <div id="db-wrapper">
            <div class="db-header">
              <div class="filters" id="js-db-filters">
                <div class="filter -dd js-duration">
                  From: <em>18/02 - 19/03/20</em>
                </div>

                <div class="filter -dd -cmenuw js-by" title="Click to updates">
                  <em>By created dates</em>
                  <div class="-cmenu -padding -no-icon">
                    <div
                      class="-item url active"
                      data-urlparam="by"
                      data-value=""
                    >
                      By created dates
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="by"
                      data-value="deadline"
                    >
                      By deadline
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="by"
                      data-value="started"
                    >
                      By started date
                    </div>
                  </div>
                </div>

                <div class="filter -dd -cmenuw js-department">
                  <em>All departments</em>

                  <div class="-cmenu -padding -no-icon">
                    <div
                      class="-item url active"
                      data-urlparam="dept"
                      data-value=""
                    >
                      All departments
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="1278"
                    >
                      BỆNH VIỆN
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="1277"
                    >
                      THÔNG TIN
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="1276"
                    >
                      TRUNG TÂM THƯƠNG MẠI
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="1275"
                    >
                      DỰ ÁN CÔNG NGHIỆP
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="1218"
                    >
                      Nhà mát Vina
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="1215"
                    >
                      2020 - Dự án
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="1195"
                    >
                      phòng tài chính
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="1194"
                    >
                      Quản lý khách hàng
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="1193"
                    >
                      Dự án thi công, xây dựng
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="1166"
                    >
                      Công ty Ogandi
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="1128"
                    >
                      DSDA Cty thiết bị ABB
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="1093"
                    >
                      TestEverpia
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="1064"
                    >
                      Trung tâm Quang Điện Tử
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="1059"
                    >
                      Phòng Công Nghệ
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="999"
                    >
                      DSDA Cty WTG
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="998"
                    >
                      Eurohomes
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="997"
                    >
                      Sawadika
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="996"
                    >
                      Khối cửa hàng
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="990"
                    >
                      Quản lí lớp học
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="989"
                    >
                      Tedi
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="936"
                    >
                      Mua hàng
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="913"
                    >
                      Back Office
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="900"
                    >
                      Phòng Lập Trình
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="888"
                    >
                      HR
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="883"
                    >
                      PHÒNG BAN DEMO
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="874"
                    >
                      Multispace
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="822"
                    >
                      Royal
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="745"
                    >
                      Tiến độ Sông Đuống
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="708"
                    >
                      Quản lý kỹ thuât
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="707"
                    >
                      Công ty xây dựng
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="706"
                    >
                      Trường cấp 3
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="695"
                    >
                      Phòng CNTT
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="690"
                    >
                      Viettin Bank
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="677"
                    >
                      Tòa soạn báo
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="675"
                    >
                      Phòng nghiệp vụ
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="674"
                    >
                      01 - Phòng ban
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="669"
                    >
                      KSTD DA1
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="565"
                    >
                      Departments
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="564"
                    >
                      Projects
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="537"
                    >
                      CHI NHÁNH
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="495"
                    >
                      Phòng QLCL
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="442"
                    >
                      DSDA Cty PETROVIETNAM GAS
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="426"
                    >
                      Trường mầm non Mặt Trời
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="415"
                    >
                      Cơ sở D8
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="360"
                    >
                      03 - Phòng ban
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="359"
                    >
                      Phòng công nghệ thông tin
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="347"
                    >
                      Cơ sở Fitness Nguyễn Trãi
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="346"
                    >
                      Cơ sở Fitness Láng
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="341"
                    >
                      Dự án mẫu
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="331"
                    >
                      HỘI ĐỒNG QUẢN TRỊ
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="330"
                    >
                      CÔNG TY C
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="329"
                    >
                      CÔNG TY B
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="328"
                    >
                      CÔNG TY A
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="166"
                    >
                      PHÒNG THI CÔNG
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="164"
                    >
                      Phòng Hành Chính Nhân Sự
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="148"
                    >
                      Test
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="125"
                    >
                      Solar power
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="dept"
                      data-value="104"
                    >
                      Phòng Hành Chính NS
                    </div>
                    <div class="-item url" data-urlparam="dept" data-value="97">
                      BOD
                    </div>
                    <div class="-item url" data-urlparam="dept" data-value="95">
                      BOD
                    </div>
                    <div class="-item url" data-urlparam="dept" data-value="89">
                      Phòng thiết kế
                    </div>
                    <div class="-item url" data-urlparam="dept" data-value="69">
                      HN
                    </div>
                    <div class="-item url" data-urlparam="dept" data-value="67">
                      Phòng Đào tạo
                    </div>
                    <div class="-item url" data-urlparam="dept" data-value="49">
                      02 - Phòng ban
                    </div>
                    <div class="-item url" data-urlparam="dept" data-value="48">
                      2019 - Dự án
                    </div>
                    <div class="-item url" data-urlparam="dept" data-value="40">
                      Phòng Kế toán
                    </div>
                    <div class="-item url" data-urlparam="dept" data-value="29">
                      Phòng kế hoạch
                    </div>
                    <div class="-item url" data-urlparam="dept" data-value="5">
                      Phòng Nhân sự
                    </div>
                  </div>
                </div>

                <div class="filter -dd -cmenuw js-assignees hidden">
                  <em>Everyone</em>
                  <div class="-cmenu -padding -no-icon">
                    <div
                      class="-item url active"
                      data-urlparam="assignees"
                      data-value=""
                    >
                      Everyone
                    </div>
                    <div
                      class="-item"
                      data-urlparam="assignees"
                      data-value="custom"
                    >
                      Choose assignees
                    </div>
                  </div>
                </div>

                <div class="filter -dd -cmenuw js-subtaskopt">
                  <em>Tasks and subtasks</em>
                  <div class="-cmenu -padding -no-icon">
                    <div
                      class="-item url active"
                      data-urlparam="subtaskopt"
                      data-value=""
                    >
                      Tasks and subtasks
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="subtaskopt"
                      data-value="excluded"
                    >
                      Exclude subtasks
                    </div>
                  </div>
                </div>

                <div class="filter -dd -cmenuw js-status">
                  <em>All statuses</em>
                  <div class="-cmenu -padding -no-icon">
                    <div
                      class="-item url active"
                      data-urlparam="status"
                      data-value=""
                    >
                      All statuses
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="status"
                      data-value="active"
                    >
                      Active tasks
                    </div>
                    <div
                      class="-item url"
                      data-urlparam="status"
                      data-value="done"
                    >
                      Done tasks
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="db-grid" data-col="15">
              <div class="box std" data-col="3,2" style="width: 20%;">
                <div class="inner">
                  <div class="header">
                    Dự án
                    <div class="side"></div>
                  </div>
                  <div class="body">
                    <div class="bigcount">
                      <div class="count js-count" data-key="real_projects">
                        70
                      </div>
                      <div class="txt">dự án</div>

                      <div class="info ap-xdot">
                        <span class="dot -bg-alt1"></span>
                        <b class="js-count" data-key="real_projects_internal"
                          >62</b
                        >
                        internal projects
                      </div>

                      <div class="info ap-xdot">
                        <span class="dot -bg-alt5-edge"></span>
                        <b class="js-count" data-key="real_projects_external"
                          >8</b
                        >
                        external projects
                      </div>
                    </div>
                  </div>
                </div>
                <div class="s" style="padding-bottom:66.66666666666667%"></div>
              </div>

              <div class="box std" data-col="3,2" style="width: 20%;">
                <div class="inner">
                  <div class="header">
                    Teams
                    <div class="side"></div>
                  </div>
                  <div class="body">
                    <div class="bigcount">
                      <div class="count js-count" data-key="real_teams">26</div>
                      <div class="txt">teams</div>

                      <div class="info ap-xdot">
                        <span class="dot -bg-alt1"></span>
                        <b class="js-count" data-key="real_teams_internal"
                          >26</b
                        >
                        internal teams
                      </div>

                      <div class="info ap-xdot">
                        <span class="dot -bg-alt5-edge"></span>
                        <b class="js-count" data-key="real_teams_external">0</b>
                        external teams
                      </div>
                    </div>
                  </div>
                </div>
                <div class="s" style="padding-bottom:66.66666666666667%"></div>
              </div>

              <div class="box std" data-col="3,2" style="width: 20%;">
                <div class="inner">
                  <div class="header">
                    Công việc
                    <div class="side"></div>
                  </div>
                  <div class="body">
                    <div class="bigcount">
                      <div
                        class="count js-count"
                        style="font-size:30px"
                        data-key="tasks"
                      >
                        1,443
                      </div>
                      <div class="txt">tasks</div>

                      <div class="info ap-xdot">
                        <span class="square -bg-alt1-edge"></span> &nbsp;
                        <b class="js-count" data-key="tasks_active">1,163</b>
                        active
                      </div>

                      <div class="info ap-xdot">
                        <span class="square -bg-success"></span> &nbsp;
                        <b class="js-count" data-key="tasks_done">280</b> done
                      </div>
                    </div>
                  </div>
                </div>
                <div class="s" style="padding-bottom:66.66666666666667%"></div>
              </div>

              <div class="box std" data-col="3,2" style="width: 20%;">
                <div class="inner">
                  <div class="header">
                    Mục tiêu
                    <div class="side"></div>
                  </div>
                  <div class="body">
                    <div class="bigcount">
                      <div class="count js-count" data-key="milestones">2</div>
                      <div class="txt">mục tiêu</div>

                      <div class="info ap-xdot">
                        <span class="dot -bg-success"></span> completed
                      </div>

                      <div class="info ap-xdot">
                        <span class="dot -bg-main"></span> in progress
                      </div>
                    </div>
                  </div>
                </div>
                <div class="s" style="padding-bottom:66.66666666666667%"></div>
              </div>

              <div class="box std" data-col="3,2" style="width: 20%;">
                <div class="inner">
                  <div class="header">
                    Thành viên
                    <div class="side"></div>
                  </div>
                  <div class="body">
                    <div class="bigcount">
                      <div class="count js-count" data-key="people">59</div>
                      <div class="txt">active members</div>

                      <div class="info ap-xdot">
                        <span class="square -bg-gray"></span> &nbsp;
                        <b class="js-count" data-key="people_internal">59</b>
                        employees
                      </div>

                      <div class="info ap-xdot">
                        <span class="square -bg-gray"></span> &nbsp;
                        <b class="js-count" data-key="people_guest">0</b> guests
                      </div>
                    </div>
                  </div>
                </div>
                <div class="s" style="padding-bottom:66.66666666666667%"></div>
              </div>
            </div>
            <div class="db-title">Report about tasks</div>

            <div class="db-grid" data-col="30">
              <div class="box std" data-col="8,9" style="width: 26.6667%;">
                <div class="inner">
                  <div class="header">
                    Báo cáo trạng thái công việc
                    <div class="side"></div>
                  </div>
                  <div class="body">
                    <div class="graph">
                      <div
                        id="js-task-status-report"
                        data-highcharts-chart="1"
                        style="height: 170.597px; overflow: hidden;"
                      >
                        <div
                          id="highcharts-z3dbuhk-98"
                          dir="ltr"
                          class="highcharts-container "
                          style="position: relative; overflow: hidden; width: 284px; height: 171px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"
                        >
                          <svg
                            version="1.1"
                            class="highcharts-root"
                            style='font-family:"Lucida Grande", "Lucida Sans Unicode", Arial, Helvetica, sans-serif;font-size:12px;'
                            xmlns="http://www.w3.org/2000/svg"
                            width="284"
                            height="171"
                            viewBox="0 0 284 171"
                          >
                            <desc>Created with Highcharts 7.2.1</desc>
                            <defs>
                              <clipPath id="highcharts-z3dbuhk-103-">
                                <rect
                                  x="0"
                                  y="0"
                                  width="264"
                                  height="146"
                                  fill="none"
                                ></rect>
                              </clipPath>
                            </defs>
                            <rect
                              fill="rgba(255, 255, 255, 0.0)"
                              class="highcharts-background"
                              x="0"
                              y="0"
                              width="284"
                              height="171"
                              rx="0"
                              ry="0"
                            ></rect>
                            <rect
                              fill="none"
                              class="highcharts-plot-background"
                              x="10"
                              y="10"
                              width="264"
                              height="146"
                            ></rect>
                            <rect
                              fill="none"
                              class="highcharts-plot-border"
                              data-z-index="1"
                              x="10"
                              y="10"
                              width="264"
                              height="146"
                            ></rect>
                            <g class="highcharts-series-group" data-z-index="3">
                              <g
                                data-z-index="0.1"
                                class="highcharts-series highcharts-series-0 highcharts-pie-series highcharts-tracker"
                                transform="translate(10,10) scale(1 1)"
                                style="cursor:pointer;"
                              >
                                <path
                                  fill="#f54e3b"
                                  d="M 131.9871685881672 10.00000130670739 A 63 63 0 0 1 194.97870719953497 74.63781545823763 L 182.38296575962798 74.31025236659009 A 50.4 50.4 0 0 0 131.98973487053377 22.600001045365914 Z"
                                  transform="translate(0,0)"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  stroke-linejoin="round"
                                  class="highcharts-point highcharts-color-0"
                                ></path>
                                <path
                                  fill="#389dd9"
                                  d="M 194.97703789499872 74.70079333603304 A 63 63 0 1 1 72.82832372634168 51.37333296678888 L 84.66265898107335 55.69866637343111 A 50.4 50.4 0 1 0 182.38163031599896 74.36063466882644 Z"
                                  transform="translate(0,0)"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  stroke-linejoin="round"
                                  class="highcharts-point highcharts-color-1"
                                ></path>
                                <path
                                  fill="#14cc3f"
                                  d="M 72.84997997560612 51.31417211370979 A 63 63 0 0 1 120.75901128833546 11.010967318531009 L 123.00720903066836 23.40877385482481 A 50.4 50.4 0 0 0 84.67998398048489 55.651337690967836 Z"
                                  transform="translate(0,0)"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  stroke-linejoin="round"
                                  class="highcharts-point highcharts-color-2"
                                ></path>
                                <path
                                  fill="#f7e015"
                                  d="M 120.82100593117933 10.999757326206598 A 63 63 0 0 1 131.9124942639015 10.00006077188526 L 131.92999541112118 22.600048617508214 A 50.4 50.4 0 0 0 123.05680474494346 23.39980586096528 Z"
                                  transform="translate(0,0)"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  stroke-linejoin="round"
                                  class="highcharts-point highcharts-color-3"
                                ></path>
                              </g>
                              <g
                                data-z-index="0.1"
                                class="highcharts-markers highcharts-series-0 highcharts-pie-series"
                                transform="translate(10,10) scale(1 1)"
                              ></g>
                            </g>
                            <text
                              x="142"
                              text-anchor="middle"
                              class="highcharts-title"
                              data-z-index="4"
                              style="color:#333333;font-size:13px;font-weight:normal;fill:#333333;"
                              y="93"
                            ></text>
                            <text
                              x="142"
                              text-anchor="middle"
                              class="highcharts-subtitle"
                              data-z-index="4"
                              style="color:#666666;fill:#666666;"
                              y="24"
                            ></text>
                            <text
                              x="10"
                              text-anchor="start"
                              class="highcharts-caption"
                              data-z-index="4"
                              style="color:#666666;fill:#666666;"
                              y="168"
                            ></text>
                          </svg>
                        </div>
                      </div>
                      <div class="legends -inline">
                        <div class="legend">
                          <div
                            class="circle"
                            style="background-color:#14cc3f"
                          ></div>
                          239 done ontime
                        </div>
                        <div class="legend">
                          <div
                            class="circle"
                            style="background-color:#f7e015"
                          ></div>
                          41 done late
                        </div>
                        <div class="legend">
                          <div
                            class="circle"
                            style="background-color:#389dd9"
                          ></div>
                          796 in progress
                        </div>
                        <div class="legend">
                          <div
                            class="circle"
                            style="background-color:#f54e3b"
                          ></div>
                          367 overdue
                        </div>
                      </div>
                      <div class="gcount">1,443<em>tasks</em></div>
                    </div>
                  </div>
                </div>
                <div class="s" style="padding-bottom:112.5%"></div>
              </div>

              <div class="box std" data-col="8,9" style="width: 26.6667%;">
                <div class="inner">
                  <div class="header">
                    Thành viên xuất sắc
                    <div class="side"></div>
                  </div>
                  <div class="body -fit">
                    <div class="scrollbox scroll-y -smaller">
                      <div class="list" id="js-top-performers">
                        <div class="item">
                          <div class="icon">
                            <div class="avatar">
                              <img
                                src="https://data-gcdn.basecdn.net/avatar/sys121/d4/a6/12/a6/91/8208ff221b7a78ca51b0ec4fe632c89f/0.giangle_121.jpg"
                              />
                            </div>
                          </div>
                          <div class="name">
                            <span class="url" data-username="giangle"
                              >Đan Thảo</span
                            >
                          </div>
                          <div class="info"><em>26</em>/48 completed tasks</div>
                          <div class="side">
                            <div class="bar">
                              <div class="c" style="width: 54.2%"></div>
                              <div class="txt">54.2%</div>
                            </div>
                          </div>
                        </div>
                        <div class="item">
                          <div class="icon">
                            <div class="avatar">
                              <img
                                src="https://data-gcdn.basecdn.net/avatar/sys121/95/17/5c/cd/23/a4ecbba291849fb3ef99a65e574bdf9f/0.linhdan_121.jpg"
                              />
                            </div>
                          </div>
                          <div class="name">
                            <span class="url" data-username="linhdan"
                              >Linh Đan</span
                            >
                          </div>
                          <div class="info"><em>24</em>/65 completed tasks</div>
                          <div class="side">
                            <div class="bar">
                              <div class="c" style="width: 36.9%"></div>
                              <div class="txt">36.9%</div>
                            </div>
                          </div>
                        </div>
                        <div class="item">
                          <div class="icon">
                            <div class="avatar">
                              <img
                                src="https://data-gcdn.basecdn.net/avatar/sys121/23/80/01/93/ed/c7a0167e5b71217c66f6c00adcef2c2c/0.vunguyen_121.jpg"
                              />
                            </div>
                          </div>
                          <div class="name">
                            <span class="url" data-username="vunguyen"
                              >Nguyễn Trang</span
                            >
                          </div>
                          <div class="info"><em>20</em>/21 completed tasks</div>
                          <div class="side">
                            <div class="bar">
                              <div class="c" style="width: 95.2%"></div>
                              <div class="txt">95.2%</div>
                            </div>
                          </div>
                        </div>
                        <div class="item">
                          <div class="icon">
                            <div class="avatar">
                              <img
                                src="https://data-gcdn.basecdn.net/avatar/sys121/bf/cb/99/5c/c4/4f2d919fdc90fcff8406d552282383a2/0.tuyetnguyen_121.jpg"
                              />
                            </div>
                          </div>
                          <div class="name">
                            <span class="url" data-username="tuyetnguyen"
                              >Hồng Nhung</span
                            >
                          </div>
                          <div class="info">
                            <em>15</em>/132 completed tasks
                          </div>
                          <div class="side">
                            <div class="bar">
                              <div class="c" style="width: 11.4%"></div>
                              <div class="txt">11.4%</div>
                            </div>
                          </div>
                        </div>
                        <div class="item">
                          <div class="icon">
                            <div class="avatar">
                              <img
                                src="https://data-gcdn.basecdn.net/avatar/sys121/ba/f9/d1/47/30/e7a5093c5bf356d492e3279e55b99a82/0.vuanh_121.jpg"
                              />
                            </div>
                          </div>
                          <div class="name">
                            <span class="url" data-username="vuanh"
                              >Hồng Anh</span
                            >
                          </div>
                          <div class="info"><em>15</em>/47 completed tasks</div>
                          <div class="side">
                            <div class="bar">
                              <div class="c" style="width: 31.9%"></div>
                              <div class="txt">31.9%</div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="s" style="padding-bottom:112.5%"></div>
              </div>

              <div class="box std" data-col="8,9" style="width: 26.6667%;">
                <div class="inner">
                  <div class="header">
                    Công việc không đúng hạn
                    <div class="side"></div>
                  </div>
                  <div class="body -fit">
                    <div
                      class="scrollbox scroll-y -smaller"
                      id="js-task-late-report"
                    >
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
                              ></circle>
                              <path
                                class="Sektor-sector"
                                stroke-width="10"
                                fill="none"
                                stroke="#c34343"
                                d="M50,5 A45,45 1 0 1 91.1858527679413,68.13078960711482  "
                              ></path>
                            </svg>
                            <div class="inner-text">31.6%</div>
                          </div>
                          <div class="stat">
                            <div class="number">
                              <em style="color:#c34343">367</em>
                            </div>
                            <div class="sub">overdue tasks</div>
                            <div class="sub ap-xdot">
                              over <em>1163</em> active tasks
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
                              ></circle>
                              <path
                                class="Sektor-sector"
                                stroke-width="10"
                                fill="none"
                                stroke="#f7e015"
                                d="M50,5 A45,45 1 0 1 85.72956793915259,22.643136603742757  "
                              ></path>
                            </svg>
                            <div class="inner-text">14.6%</div>
                          </div>
                          <div class="stat">
                            <div class="number">
                              <em style="color:#f7e015">41</em>
                            </div>
                            <div class="sub">late completed tasks</div>
                            <div class="sub ap-xdot">
                              over <em>280</em> completed tasks
                            </div>
                          </div>
                        </div>
                        <div class="istat">
                          <div class="plain">
                            <span class="icon ficon-exclamation-circle"></span>
                            <b class="js-count" data-key="tasks_no_deadline"
                              >753</b
                            >
                            tasks are created without deadline
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="s" style="padding-bottom:112.5%"></div>
              </div>

              <div class="box std" data-col="6,4.5" style="width: 20%;">
                <div class="inner">
                  <div class="header">
                    Ma trận Eisenhower
                    <div class="side"></div>
                  </div>
                  <div class="body -fit">
                    <div class="eshm">
                      <div class="x"><span>Urgent</span></div>
                      <div class="y"><span>Important</span></div>

                      <div class="area x00">
                        <span class="js-count" data-key="esn_00">1,355</span>
                      </div>

                      <div class="area x01">
                        <span class="js-count" data-key="esn_01">7</span>
                      </div>
                      <div class="area x10">
                        <span class="js-count" data-key="esn_10">76</span>
                      </div>
                      <div class="area x11">
                        <span class="js-count" data-key="esn_11">5</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="s" style="padding-bottom:75%"></div>
              </div>

              <div class="box std" data-col="6,4.5" style="width: 20%;">
                <div class="inner">
                  <div class="header">
                    CV chờ review
                    <div class="side"></div>
                  </div>
                  <div class="body">
                    <div class="bigcount">
                      <div class="count">
                        <b class="js-count text-success" data-key="tasks_review"
                          >23</b
                        >
                      </div>
                      <div class="txt">in review</div>

                      <div class="info ap-xdot">
                        <span class="square -bg-gray"></span> &nbsp;
                        <b
                          ><b
                            class="js-count red"
                            data-key="tasks_review_overdue"
                            >7</b
                          >/<b class="js-count" data-key="tasks_review"
                            >23</b
                          ></b
                        >
                        overdue
                      </div>
                    </div>

                    <div class="ecount">
                      <b
                        ><span
                          class="js-count"
                          data-key="projects_require_review"
                          >22</span
                        >/<span class="js-count" data-key="projects"
                          >124</span
                        ></b
                      >
                      teams and projects enabling task reviews
                    </div>
                  </div>
                </div>
                <div class="s" style="padding-bottom:75%"></div>
              </div>
            </div>

            <div class="db-grid" data-col="10">
              <div class="box std" data-col="6,3" style="width: 60%;">
                <div class="inner">
                  <div class="header">
                    Quá trình hoàn thành theo ngày
                    <div class="side">
                      <div class="ilegends">
                        <div class="legend">
                          <span
                            class="dot"
                            style="background-color:#48856c"
                          ></span>
                          Total tasks
                        </div>
                        <div class="legend">
                          <span
                            class="dot"
                            style="background-color:#389dd9"
                          ></span>
                          Total in progress
                        </div>
                        <div class="legend">
                          <span
                            class="dot"
                            style="background-color:#14cc3f"
                          ></span>
                          Total done
                        </div>
                        <div class="legend">
                          <span
                            class="dot"
                            style="background-color:#f54e3b"
                          ></span>
                          Total overdue
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="body -fit">
                    <div class="graph -fit">
                      <div
                        id="js-task-daily-report"
                        data-highcharts-chart="2"
                        style="overflow: hidden;"
                      >
                        <div
                          id="highcharts-z3dbuhk-104"
                          dir="ltr"
                          class="highcharts-container "
                          style="position: relative; overflow: hidden; width: 686px; height: 285px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"
                        >
                          <svg
                            version="1.1"
                            class="highcharts-root"
                            style='font-family:"Lucida Grande", "Lucida Sans Unicode", Arial, Helvetica, sans-serif;font-size:12px;'
                            xmlns="http://www.w3.org/2000/svg"
                            width="686"
                            height="285"
                            viewBox="0 0 686 285"
                          >
                            <desc>Created with Highcharts 7.2.1</desc>
                            <defs>
                              <clipPath id="highcharts-z3dbuhk-105-">
                                <rect
                                  x="0"
                                  y="0"
                                  width="595"
                                  height="218"
                                  fill="none"
                                ></rect>
                              </clipPath>
                            </defs>
                            <rect
                              fill="#ffffff"
                              class="highcharts-background"
                              x="0"
                              y="0"
                              width="686"
                              height="285"
                              rx="0"
                              ry="0"
                            ></rect>
                            <rect
                              fill="none"
                              class="highcharts-plot-background"
                              x="81"
                              y="10"
                              width="595"
                              height="218"
                            ></rect>
                            <g
                              class="highcharts-grid highcharts-xaxis-grid"
                              data-z-index="1"
                            >
                              <path
                                fill="none"
                                data-z-index="1"
                                class="highcharts-grid-line"
                                d="M 100.5 10 L 100.5 228"
                                opacity="1"
                              ></path>
                              <path
                                fill="none"
                                data-z-index="1"
                                class="highcharts-grid-line"
                                d="M 120.5 10 L 120.5 228"
                                opacity="1"
                              ></path>
                              <path
                                fill="none"
                                data-z-index="1"
                                class="highcharts-grid-line"
                                d="M 140.5 10 L 140.5 228"
                                opacity="1"
                              ></path>
                              <path
                                fill="none"
                                data-z-index="1"
                                class="highcharts-grid-line"
                                d="M 159.5 10 L 159.5 228"
                                opacity="1"
                              ></path>
                              <path
                                fill="none"
                                data-z-index="1"
                                class="highcharts-grid-line"
                                d="M 179.5 10 L 179.5 228"
                                opacity="1"
                              ></path>
                              <path
                                fill="none"
                                data-z-index="1"
                                class="highcharts-grid-line"
                                d="M 199.5 10 L 199.5 228"
                                opacity="1"
                              ></path>
                              <path
                                fill="none"
                                data-z-index="1"
                                class="highcharts-grid-line"
                                d="M 219.5 10 L 219.5 228"
                                opacity="1"
                              ></path>
                              <path
                                fill="none"
                                data-z-index="1"
                                class="highcharts-grid-line"
                                d="M 239.5 10 L 239.5 228"
                                opacity="1"
                              ></path>
                              <path
                                fill="none"
                                data-z-index="1"
                                class="highcharts-grid-line"
                                d="M 259.5 10 L 259.5 228"
                                opacity="1"
                              ></path>
                              <path
                                fill="none"
                                data-z-index="1"
                                class="highcharts-grid-line"
                                d="M 278.5 10 L 278.5 228"
                                opacity="1"
                              ></path>
                              <path
                                fill="none"
                                data-z-index="1"
                                class="highcharts-grid-line"
                                d="M 298.5 10 L 298.5 228"
                                opacity="1"
                              ></path>
                              <path
                                fill="none"
                                data-z-index="1"
                                class="highcharts-grid-line"
                                d="M 318.5 10 L 318.5 228"
                                opacity="1"
                              ></path>
                              <path
                                fill="none"
                                data-z-index="1"
                                class="highcharts-grid-line"
                                d="M 338.5 10 L 338.5 228"
                                opacity="1"
                              ></path>
                              <path
                                fill="none"
                                data-z-index="1"
                                class="highcharts-grid-line"
                                d="M 358.5 10 L 358.5 228"
                                opacity="1"
                              ></path>
                              <path
                                fill="none"
                                data-z-index="1"
                                class="highcharts-grid-line"
                                d="M 378.5 10 L 378.5 228"
                                opacity="1"
                              ></path>
                              <path
                                fill="none"
                                data-z-index="1"
                                class="highcharts-grid-line"
                                d="M 397.5 10 L 397.5 228"
                                opacity="1"
                              ></path>
                              <path
                                fill="none"
                                data-z-index="1"
                                class="highcharts-grid-line"
                                d="M 417.5 10 L 417.5 228"
                                opacity="1"
                              ></path>
                              <path
                                fill="none"
                                data-z-index="1"
                                class="highcharts-grid-line"
                                d="M 437.5 10 L 437.5 228"
                                opacity="1"
                              ></path>
                              <path
                                fill="none"
                                data-z-index="1"
                                class="highcharts-grid-line"
                                d="M 457.5 10 L 457.5 228"
                                opacity="1"
                              ></path>
                              <path
                                fill="none"
                                data-z-index="1"
                                class="highcharts-grid-line"
                                d="M 477.5 10 L 477.5 228"
                                opacity="1"
                              ></path>
                              <path
                                fill="none"
                                data-z-index="1"
                                class="highcharts-grid-line"
                                d="M 497.5 10 L 497.5 228"
                                opacity="1"
                              ></path>
                              <path
                                fill="none"
                                data-z-index="1"
                                class="highcharts-grid-line"
                                d="M 516.5 10 L 516.5 228"
                                opacity="1"
                              ></path>
                              <path
                                fill="none"
                                data-z-index="1"
                                class="highcharts-grid-line"
                                d="M 536.5 10 L 536.5 228"
                                opacity="1"
                              ></path>
                              <path
                                fill="none"
                                data-z-index="1"
                                class="highcharts-grid-line"
                                d="M 556.5 10 L 556.5 228"
                                opacity="1"
                              ></path>
                              <path
                                fill="none"
                                data-z-index="1"
                                class="highcharts-grid-line"
                                d="M 576.5 10 L 576.5 228"
                                opacity="1"
                              ></path>
                              <path
                                fill="none"
                                data-z-index="1"
                                class="highcharts-grid-line"
                                d="M 596.5 10 L 596.5 228"
                                opacity="1"
                              ></path>
                              <path
                                fill="none"
                                data-z-index="1"
                                class="highcharts-grid-line"
                                d="M 615.5 10 L 615.5 228"
                                opacity="1"
                              ></path>
                              <path
                                fill="none"
                                data-z-index="1"
                                class="highcharts-grid-line"
                                d="M 635.5 10 L 635.5 228"
                                opacity="1"
                              ></path>
                              <path
                                fill="none"
                                data-z-index="1"
                                class="highcharts-grid-line"
                                d="M 655.5 10 L 655.5 228"
                                opacity="1"
                              ></path>
                              <path
                                fill="none"
                                data-z-index="1"
                                class="highcharts-grid-line"
                                d="M 675.5 10 L 675.5 228"
                                opacity="1"
                              ></path>
                              <path
                                fill="none"
                                data-z-index="1"
                                class="highcharts-grid-line"
                                d="M 80.5 10 L 80.5 228"
                                opacity="1"
                              ></path>
                            </g>
                            <g
                              class="highcharts-grid highcharts-yaxis-grid"
                              data-z-index="1"
                            >
                              <path
                                fill="none"
                                stroke="#e6e6e6"
                                stroke-width="1"
                                data-z-index="1"
                                class="highcharts-grid-line"
                                d="M 81 228.5 L 676 228.5"
                                opacity="1"
                              ></path>
                              <path
                                fill="none"
                                stroke="#e6e6e6"
                                stroke-width="1"
                                data-z-index="1"
                                class="highcharts-grid-line"
                                d="M 81 174.5 L 676 174.5"
                                opacity="1"
                              ></path>
                              <path
                                fill="none"
                                stroke="#e6e6e6"
                                stroke-width="1"
                                data-z-index="1"
                                class="highcharts-grid-line"
                                d="M 81 119.5 L 676 119.5"
                                opacity="1"
                              ></path>
                              <path
                                fill="none"
                                stroke="#e6e6e6"
                                stroke-width="1"
                                data-z-index="1"
                                class="highcharts-grid-line"
                                d="M 81 65.5 L 676 65.5"
                                opacity="1"
                              ></path>
                              <path
                                fill="none"
                                stroke="#e6e6e6"
                                stroke-width="1"
                                data-z-index="1"
                                class="highcharts-grid-line"
                                d="M 81 9.5 L 676 9.5"
                                opacity="1"
                              ></path>
                            </g>
                            <rect
                              fill="none"
                              class="highcharts-plot-border"
                              data-z-index="1"
                              x="81"
                              y="10"
                              width="595"
                              height="218"
                            ></rect>
                            <g
                              class="highcharts-axis highcharts-xaxis"
                              data-z-index="2"
                            >
                              <path
                                fill="none"
                                class="highcharts-axis-line"
                                stroke="#ccd6eb"
                                stroke-width="1"
                                data-z-index="7"
                                d="M 81 228.5 L 676 228.5"
                              ></path>
                            </g>
                            <g
                              class="highcharts-axis highcharts-yaxis"
                              data-z-index="2"
                            >
                              <text
                                x="26.125"
                                data-z-index="7"
                                text-anchor="middle"
                                transform="translate(0,0) rotate(270 26.125 119)"
                                class="highcharts-axis-title"
                                style="color:#666666;fill:#666666;"
                                y="119"
                              >
                                <tspan>Number of tasks</tspan>
                              </text>
                              <path
                                fill="none"
                                class="highcharts-axis-line"
                                data-z-index="7"
                                d="M 81 10 L 81 228"
                              ></path>
                            </g>
                            <g class="highcharts-series-group" data-z-index="3">
                              <g
                                data-z-index="0.1"
                                class="highcharts-series highcharts-series-0 highcharts-line-series"
                                transform="translate(81,10) scale(1 1)"
                                clip-path="url(#highcharts-z3dbuhk-105-)"
                              >
                                <path
                                  fill="none"
                                  d="M 9.9166666666667 204.266 L 29.75 192.821 L 49.583333333333 189.333 L 69.416666666667 181.485 L 89.25 180.286 L 109.08333333333 172.656 L 128.91666666667 169.93099999999998 L 148.75 164.808 L 168.58333333333 161.32 L 188.41666666667 158.377 L 208.25 156.197 L 228.08333333333 154.78 L 247.91666666667 144.643 L 267.75 135.487 L 287.58333333333 128.184 L 307.41666666667 119.355 L 327.25 115.104 L 347.08333333333 113.796 L 366.91666666667 113.142 L 386.75 109.872 L 406.58333333333 87.52699999999999 L 426.41666666667 85.34700000000001 L 446.25 80.44200000000001 L 466.08333333333 77.826 L 485.91666666667 76.73599999999999 L 505.75 75.97300000000001 L 525.58333333333 72.48500000000001 L 545.41666666667 65.50900000000001 L 565.25 61.912000000000006 L 585.08333333333 60.712999999999994"
                                  class="highcharts-graph"
                                  data-z-index="1"
                                  stroke="#48856c"
                                  stroke-width="1"
                                  stroke-linejoin="round"
                                  stroke-linecap="round"
                                ></path>
                                <path
                                  fill="none"
                                  d="M -0.08333333333330017 204.266 L 9.9166666666667 204.266 L 29.75 192.821 L 49.583333333333 189.333 L 69.416666666667 181.485 L 89.25 180.286 L 109.08333333333 172.656 L 128.91666666667 169.93099999999998 L 148.75 164.808 L 168.58333333333 161.32 L 188.41666666667 158.377 L 208.25 156.197 L 228.08333333333 154.78 L 247.91666666667 144.643 L 267.75 135.487 L 287.58333333333 128.184 L 307.41666666667 119.355 L 327.25 115.104 L 347.08333333333 113.796 L 366.91666666667 113.142 L 386.75 109.872 L 406.58333333333 87.52699999999999 L 426.41666666667 85.34700000000001 L 446.25 80.44200000000001 L 466.08333333333 77.826 L 485.91666666667 76.73599999999999 L 505.75 75.97300000000001 L 525.58333333333 72.48500000000001 L 545.41666666667 65.50900000000001 L 565.25 61.912000000000006 L 585.08333333333 60.712999999999994 L 595.08333333333 60.712999999999994"
                                  visibility="visible"
                                  data-z-index="2"
                                  class="highcharts-tracker-line"
                                  stroke-linejoin="round"
                                  stroke="rgba(192,192,192,0.0001)"
                                  stroke-width="21"
                                ></path>
                              </g>
                              <g
                                data-z-index="0.1"
                                class="highcharts-markers highcharts-series-0 highcharts-line-series highcharts-tracker"
                                transform="translate(81,10) scale(1 1)"
                              >
                                <path
                                  fill="#48856c"
                                  d="M 9 207 A 3 3 0 1 1 9.002999999500002 206.99999850000012 Z"
                                  opacity="1"
                                  class="highcharts-point"
                                ></path>
                                <path
                                  fill="#48856c"
                                  d="M 29 196 A 3 3 0 1 1 29.002999999500002 195.99999850000012 Z"
                                  opacity="1"
                                  class="highcharts-point"
                                ></path>
                                <path
                                  fill="#48856c"
                                  d="M 49 192 A 3 3 0 1 1 49.002999999500005 191.99999850000012 Z"
                                  opacity="1"
                                  class="highcharts-point"
                                ></path>
                                <path
                                  fill="#48856c"
                                  d="M 69 184 A 3 3 0 1 1 69.0029999995 183.99999850000012 Z"
                                  opacity="1"
                                  class="highcharts-point"
                                ></path>
                                <path
                                  fill="#48856c"
                                  d="M 89 183 A 3 3 0 1 1 89.0029999995 182.99999850000012 Z"
                                  opacity="1"
                                  class="highcharts-point"
                                ></path>
                                <path
                                  fill="#48856c"
                                  d="M 109 176 A 3 3 0 1 1 109.0029999995 175.99999850000012 Z"
                                  opacity="1"
                                  class="highcharts-point"
                                ></path>
                                <path
                                  fill="#48856c"
                                  d="M 128 173 A 3 3 0 1 1 128.0029999995 172.99999850000012 Z"
                                  opacity="1"
                                  class="highcharts-point"
                                ></path>
                                <path
                                  fill="#48856c"
                                  d="M 148 168 A 3 3 0 1 1 148.0029999995 167.99999850000012 Z"
                                  opacity="1"
                                  class="highcharts-point"
                                ></path>
                                <path
                                  fill="#48856c"
                                  d="M 168 164 A 3 3 0 1 1 168.0029999995 163.99999850000012 Z"
                                  opacity="1"
                                  class="highcharts-point"
                                ></path>
                                <path
                                  fill="#48856c"
                                  d="M 188 161 A 3 3 0 1 1 188.0029999995 160.99999850000012 Z"
                                  opacity="1"
                                  class="highcharts-point"
                                ></path>
                                <path
                                  fill="#48856c"
                                  d="M 208 159 A 3 3 0 1 1 208.0029999995 158.99999850000012 Z"
                                  opacity="1"
                                  class="highcharts-point"
                                ></path>
                                <path
                                  fill="#48856c"
                                  d="M 228 158 A 3 3 0 1 1 228.0029999995 157.99999850000012 Z"
                                  opacity="1"
                                  class="highcharts-point"
                                ></path>
                                <path
                                  fill="#48856c"
                                  d="M 247 148 A 3 3 0 1 1 247.0029999995 147.99999850000012 Z"
                                  opacity="1"
                                  class="highcharts-point"
                                ></path>
                                <path
                                  fill="#48856c"
                                  d="M 267 138 A 3 3 0 1 1 267.0029999995 137.99999850000012 Z"
                                  opacity="1"
                                  class="highcharts-point"
                                ></path>
                                <path
                                  fill="#48856c"
                                  d="M 287 131 A 3 3 0 1 1 287.0029999995 130.99999850000012 Z"
                                  opacity="1"
                                  class="highcharts-point"
                                ></path>
                                <path
                                  fill="#48856c"
                                  d="M 307 122 A 3 3 0 1 1 307.0029999995 121.99999850000013 Z"
                                  opacity="1"
                                  class="highcharts-point"
                                ></path>
                                <path
                                  fill="#48856c"
                                  d="M 327 118 A 3 3 0 1 1 327.0029999995 117.99999850000013 Z"
                                  opacity="1"
                                  class="highcharts-point"
                                ></path>
                                <path
                                  fill="#48856c"
                                  d="M 347 117 A 3 3 0 1 1 347.0029999995 116.99999850000013 Z"
                                  opacity="1"
                                  class="highcharts-point"
                                ></path>
                                <path
                                  fill="#48856c"
                                  d="M 366 116 A 3 3 0 1 1 366.0029999995 115.99999850000013 Z"
                                  opacity="1"
                                  class="highcharts-point"
                                ></path>
                                <path
                                  fill="#48856c"
                                  d="M 386 113 A 3 3 0 1 1 386.0029999995 112.99999850000013 Z"
                                  opacity="1"
                                  class="highcharts-point"
                                ></path>
                                <path
                                  fill="#48856c"
                                  d="M 406 91 A 3 3 0 1 1 406.0029999995 90.99999850000013 Z"
                                  opacity="1"
                                  class="highcharts-point"
                                ></path>
                                <path
                                  fill="#48856c"
                                  d="M 426 88 A 3 3 0 1 1 426.0029999995 87.99999850000013 Z"
                                  opacity="1"
                                  class="highcharts-point"
                                ></path>
                                <path
                                  fill="#48856c"
                                  d="M 446 83 A 3 3 0 1 1 446.0029999995 82.99999850000013 Z"
                                  opacity="1"
                                  class="highcharts-point"
                                ></path>
                                <path
                                  fill="#48856c"
                                  d="M 466 81 A 3 3 0 1 1 466.0029999995 80.99999850000013 Z"
                                  opacity="1"
                                  class="highcharts-point"
                                ></path>
                                <path
                                  fill="#48856c"
                                  d="M 485 80 A 3 3 0 1 1 485.0029999995 79.99999850000013 Z"
                                  opacity="1"
                                  class="highcharts-point"
                                ></path>
                                <path
                                  fill="#48856c"
                                  d="M 505 79 A 3 3 0 1 1 505.0029999995 78.99999850000013 Z"
                                  opacity="1"
                                  class="highcharts-point"
                                ></path>
                                <path
                                  fill="#48856c"
                                  d="M 525 75 A 3 3 0 1 1 525.0029999995 74.99999850000013 Z"
                                  opacity="1"
                                  class="highcharts-point"
                                ></path>
                                <path
                                  fill="#48856c"
                                  d="M 545 69 A 3 3 0 1 1 545.0029999995 68.99999850000013 Z"
                                  opacity="1"
                                  class="highcharts-point"
                                ></path>
                                <path
                                  fill="#48856c"
                                  d="M 565 65 A 3 3 0 1 1 565.0029999995 64.99999850000013 Z"
                                  opacity="1"
                                  class="highcharts-point"
                                ></path>
                                <path
                                  fill="#48856c"
                                  d="M 585 64 A 3 3 0 1 1 585.0029999995 63.999998500000125 Z"
                                  opacity="1"
                                  class="highcharts-point"
                                ></path>
                              </g>
                              <g
                                data-z-index="0.1"
                                class="highcharts-series highcharts-series-1 highcharts-column-series highcharts-tracker"
                                transform="translate(81,10) scale(1 1)"
                                clip-path="url(#highcharts-z3dbuhk-105-)"
                              >
                                <rect
                                  x="4.5"
                                  y="208.5"
                                  width="10"
                                  height="6"
                                  fill="#14cc3f"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="24.5"
                                  y="205.5"
                                  width="10"
                                  height="7"
                                  fill="#14cc3f"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="44.5"
                                  y="203.5"
                                  width="10"
                                  height="8"
                                  fill="#14cc3f"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="64.5"
                                  y="198.5"
                                  width="10"
                                  height="12"
                                  fill="#14cc3f"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="83.5"
                                  y="197.5"
                                  width="10"
                                  height="12"
                                  fill="#14cc3f"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="103.5"
                                  y="192.5"
                                  width="10"
                                  height="16"
                                  fill="#14cc3f"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="123.5"
                                  y="190.5"
                                  width="10"
                                  height="16"
                                  fill="#14cc3f"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="143.5"
                                  y="187.5"
                                  width="10"
                                  height="18"
                                  fill="#14cc3f"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="163.5"
                                  y="185.5"
                                  width="10"
                                  height="18"
                                  fill="#14cc3f"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="183.5"
                                  y="183.5"
                                  width="10"
                                  height="19"
                                  fill="#14cc3f"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="202.5"
                                  y="182.5"
                                  width="10"
                                  height="19"
                                  fill="#14cc3f"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="222.5"
                                  y="182.5"
                                  width="10"
                                  height="18"
                                  fill="#14cc3f"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="242.5"
                                  y="177.5"
                                  width="10"
                                  height="21"
                                  fill="#14cc3f"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="262.5"
                                  y="173.5"
                                  width="10"
                                  height="23"
                                  fill="#14cc3f"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="282.5"
                                  y="169.5"
                                  width="10"
                                  height="24"
                                  fill="#14cc3f"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="302.5"
                                  y="166.5"
                                  width="10"
                                  height="24"
                                  fill="#14cc3f"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="321.5"
                                  y="164.5"
                                  width="10"
                                  height="25"
                                  fill="#14cc3f"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="341.5"
                                  y="164.5"
                                  width="10"
                                  height="25"
                                  fill="#14cc3f"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="361.5"
                                  y="163.5"
                                  width="10"
                                  height="25"
                                  fill="#14cc3f"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="381.5"
                                  y="162.5"
                                  width="10"
                                  height="25"
                                  fill="#14cc3f"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="401.5"
                                  y="160.5"
                                  width="10"
                                  height="26"
                                  fill="#14cc3f"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="421.5"
                                  y="159.5"
                                  width="10"
                                  height="26"
                                  fill="#14cc3f"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="440.5"
                                  y="156.5"
                                  width="10"
                                  height="27"
                                  fill="#14cc3f"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="460.5"
                                  y="154.5"
                                  width="10"
                                  height="29"
                                  fill="#14cc3f"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="480.5"
                                  y="153.5"
                                  width="10"
                                  height="29"
                                  fill="#14cc3f"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="500.5"
                                  y="153.5"
                                  width="10"
                                  height="29"
                                  fill="#14cc3f"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="520.5"
                                  y="151.5"
                                  width="10"
                                  height="30"
                                  fill="#14cc3f"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="540.5"
                                  y="149.5"
                                  width="10"
                                  height="30"
                                  fill="#14cc3f"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="559.5"
                                  y="147.5"
                                  width="10"
                                  height="31"
                                  fill="#14cc3f"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="579.5"
                                  y="147.5"
                                  width="10"
                                  height="31"
                                  fill="#14cc3f"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                              </g>
                              <g
                                data-z-index="0.1"
                                class="highcharts-markers highcharts-series-1 highcharts-column-series"
                                transform="translate(81,10) scale(1 1)"
                                clip-path="none"
                              ></g>
                              <g
                                data-z-index="0.1"
                                class="highcharts-series highcharts-series-2 highcharts-column-series highcharts-tracker"
                                transform="translate(81,10) scale(1 1)"
                                clip-path="url(#highcharts-z3dbuhk-105-)"
                              >
                                <rect
                                  x="4.5"
                                  y="214.5"
                                  width="10"
                                  height="4"
                                  fill="#f54e3b"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="24.5"
                                  y="212.5"
                                  width="10"
                                  height="6"
                                  fill="#f54e3b"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="44.5"
                                  y="211.5"
                                  width="10"
                                  height="7"
                                  fill="#f54e3b"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="64.5"
                                  y="210.5"
                                  width="10"
                                  height="8"
                                  fill="#f54e3b"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="83.5"
                                  y="209.5"
                                  width="10"
                                  height="9"
                                  fill="#f54e3b"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="103.5"
                                  y="208.5"
                                  width="10"
                                  height="10"
                                  fill="#f54e3b"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="123.5"
                                  y="206.5"
                                  width="10"
                                  height="12"
                                  fill="#f54e3b"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="143.5"
                                  y="205.5"
                                  width="10"
                                  height="13"
                                  fill="#f54e3b"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="163.5"
                                  y="203.5"
                                  width="10"
                                  height="15"
                                  fill="#f54e3b"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="183.5"
                                  y="202.5"
                                  width="10"
                                  height="16"
                                  fill="#f54e3b"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="202.5"
                                  y="201.5"
                                  width="10"
                                  height="17"
                                  fill="#f54e3b"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="222.5"
                                  y="200.5"
                                  width="10"
                                  height="18"
                                  fill="#f54e3b"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="242.5"
                                  y="198.5"
                                  width="10"
                                  height="20"
                                  fill="#f54e3b"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="262.5"
                                  y="196.5"
                                  width="10"
                                  height="22"
                                  fill="#f54e3b"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="282.5"
                                  y="193.5"
                                  width="10"
                                  height="25"
                                  fill="#f54e3b"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="302.5"
                                  y="190.5"
                                  width="10"
                                  height="28"
                                  fill="#f54e3b"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="321.5"
                                  y="189.5"
                                  width="10"
                                  height="29"
                                  fill="#f54e3b"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="341.5"
                                  y="189.5"
                                  width="10"
                                  height="29"
                                  fill="#f54e3b"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="361.5"
                                  y="188.5"
                                  width="10"
                                  height="30"
                                  fill="#f54e3b"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="381.5"
                                  y="187.5"
                                  width="10"
                                  height="31"
                                  fill="#f54e3b"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="401.5"
                                  y="186.5"
                                  width="10"
                                  height="32"
                                  fill="#f54e3b"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="421.5"
                                  y="185.5"
                                  width="10"
                                  height="33"
                                  fill="#f54e3b"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="440.5"
                                  y="183.5"
                                  width="10"
                                  height="35"
                                  fill="#f54e3b"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="460.5"
                                  y="183.5"
                                  width="10"
                                  height="35"
                                  fill="#f54e3b"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="480.5"
                                  y="182.5"
                                  width="10"
                                  height="36"
                                  fill="#f54e3b"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="500.5"
                                  y="182.5"
                                  width="10"
                                  height="36"
                                  fill="#f54e3b"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="520.5"
                                  y="181.5"
                                  width="10"
                                  height="37"
                                  fill="#f54e3b"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="540.5"
                                  y="179.5"
                                  width="10"
                                  height="39"
                                  fill="#f54e3b"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="559.5"
                                  y="178.5"
                                  width="10"
                                  height="40"
                                  fill="#f54e3b"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                                <rect
                                  x="579.5"
                                  y="178.5"
                                  width="10"
                                  height="40"
                                  fill="#f54e3b"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point"
                                ></rect>
                              </g>
                              <g
                                data-z-index="0.1"
                                class="highcharts-markers highcharts-series-2 highcharts-column-series"
                                transform="translate(81,10) scale(1 1)"
                                clip-path="none"
                              ></g>
                            </g>
                            <text
                              x="343"
                              text-anchor="middle"
                              class="highcharts-title"
                              data-z-index="4"
                              style="color:#333333;font-size:18px;display:none;fill:#333333;"
                              y="24"
                            >
                              <tspan>Chart title</tspan>
                            </text>
                            <text
                              x="343"
                              text-anchor="middle"
                              class="highcharts-subtitle"
                              data-z-index="4"
                              style="color:#666666;fill:#666666;"
                              y="24"
                            ></text>
                            <text
                              x="10"
                              text-anchor="start"
                              class="highcharts-caption"
                              data-z-index="4"
                              style="color:#666666;fill:#666666;"
                              y="282"
                            ></text>
                            <g class="highcharts-legend" data-z-index="7">
                              <rect
                                fill="none"
                                class="highcharts-legend-box"
                                rx="0"
                                ry="0"
                                x="0"
                                y="0"
                                width="8"
                                height="8"
                                visibility="hidden"
                              ></rect>
                              <g data-z-index="1">
                                <g></g>
                              </g>
                            </g>
                            <g
                              class="highcharts-axis-labels highcharts-xaxis-labels"
                              data-z-index="7"
                            >
                              <text
                                x="93.509391531014"
                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                text-anchor="end"
                                transform="translate(0,0) rotate(-45 93.509391531014 244)"
                                y="244"
                                opacity="1"
                              >
                                19/02
                              </text>
                              <text
                                x="113.342724864354"
                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                text-anchor="end"
                                transform="translate(0,0) rotate(-45 113.342724864354 244)"
                                y="244"
                                opacity="1"
                              >
                                20/02
                              </text>
                              <text
                                x="133.17605819768403"
                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                text-anchor="end"
                                transform="translate(0,0) rotate(-45 133.17605819768403 244)"
                                y="244"
                                opacity="1"
                              >
                                21/02
                              </text>
                              <text
                                x="153.00939153101402"
                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                text-anchor="end"
                                transform="translate(0,0) rotate(-45 153.00939153101402 244)"
                                y="244"
                                opacity="1"
                              >
                                22/02
                              </text>
                              <text
                                x="172.84272486435404"
                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                text-anchor="end"
                                transform="translate(0,0) rotate(-45 172.84272486435404 244)"
                                y="244"
                                opacity="1"
                              >
                                23/02
                              </text>
                              <text
                                x="192.67605819768403"
                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                text-anchor="end"
                                transform="translate(0,0) rotate(-45 192.67605819768403 244)"
                                y="244"
                                opacity="1"
                              >
                                24/02
                              </text>
                              <text
                                x="212.50939153101402"
                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                text-anchor="end"
                                transform="translate(0,0) rotate(-45 212.50939153101402 244)"
                                y="244"
                                opacity="1"
                              >
                                25/02
                              </text>
                              <text
                                x="232.34272486435404"
                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                text-anchor="end"
                                transform="translate(0,0) rotate(-45 232.34272486435404 244)"
                                y="244"
                                opacity="1"
                              >
                                26/02
                              </text>
                              <text
                                x="252.176058197684"
                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                text-anchor="end"
                                transform="translate(0,0) rotate(-45 252.176058197684 244)"
                                y="244"
                                opacity="1"
                              >
                                27/02
                              </text>
                              <text
                                x="272.009391531014"
                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                text-anchor="end"
                                transform="translate(0,0) rotate(-45 272.009391531014 244)"
                                y="244"
                                opacity="1"
                              >
                                28/02
                              </text>
                              <text
                                x="291.84272486435395"
                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                text-anchor="end"
                                transform="translate(0,0) rotate(-45 291.84272486435395 244)"
                                y="244"
                                opacity="1"
                              >
                                29/02
                              </text>
                              <text
                                x="311.676058197684"
                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                text-anchor="end"
                                transform="translate(0,0) rotate(-45 311.676058197684 244)"
                                y="244"
                                opacity="1"
                              >
                                01/03
                              </text>
                              <text
                                x="331.509391531014"
                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                text-anchor="end"
                                transform="translate(0,0) rotate(-45 331.509391531014 244)"
                                y="244"
                                opacity="1"
                              >
                                02/03
                              </text>
                              <text
                                x="351.34272486435395"
                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                text-anchor="end"
                                transform="translate(0,0) rotate(-45 351.34272486435395 244)"
                                y="244"
                                opacity="1"
                              >
                                03/03
                              </text>
                              <text
                                x="371.176058197684"
                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                text-anchor="end"
                                transform="translate(0,0) rotate(-45 371.176058197684 244)"
                                y="244"
                                opacity="1"
                              >
                                04/03
                              </text>
                              <text
                                x="391.009391531014"
                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                text-anchor="end"
                                transform="translate(0,0) rotate(-45 391.009391531014 244)"
                                y="244"
                                opacity="1"
                              >
                                05/03
                              </text>
                              <text
                                x="410.84272486435395"
                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                text-anchor="end"
                                transform="translate(0,0) rotate(-45 410.84272486435395 244)"
                                y="244"
                                opacity="1"
                              >
                                06/03
                              </text>
                              <text
                                x="430.676058197684"
                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                text-anchor="end"
                                transform="translate(0,0) rotate(-45 430.676058197684 244)"
                                y="244"
                                opacity="1"
                              >
                                07/03
                              </text>
                              <text
                                x="450.509391531014"
                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                text-anchor="end"
                                transform="translate(0,0) rotate(-45 450.509391531014 244)"
                                y="244"
                                opacity="1"
                              >
                                08/03
                              </text>
                              <text
                                x="470.34272486435395"
                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                text-anchor="end"
                                transform="translate(0,0) rotate(-45 470.34272486435395 244)"
                                y="244"
                                opacity="1"
                              >
                                09/03
                              </text>
                              <text
                                x="490.176058197684"
                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                text-anchor="end"
                                transform="translate(0,0) rotate(-45 490.176058197684 244)"
                                y="244"
                                opacity="1"
                              >
                                10/03
                              </text>
                              <text
                                x="510.00939153101393"
                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                text-anchor="end"
                                transform="translate(0,0) rotate(-45 510.00939153101393 244)"
                                y="244"
                                opacity="1"
                              >
                                11/03
                              </text>
                              <text
                                x="529.8427248643541"
                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                text-anchor="end"
                                transform="translate(0,0) rotate(-45 529.8427248643541 244)"
                                y="244"
                                opacity="1"
                              >
                                12/03
                              </text>
                              <text
                                x="549.676058197684"
                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                text-anchor="end"
                                transform="translate(0,0) rotate(-45 549.676058197684 244)"
                                y="244"
                                opacity="1"
                              >
                                13/03
                              </text>
                              <text
                                x="569.509391531014"
                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                text-anchor="end"
                                transform="translate(0,0) rotate(-45 569.509391531014 244)"
                                y="244"
                                opacity="1"
                              >
                                14/03
                              </text>
                              <text
                                x="589.3427248643541"
                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                text-anchor="end"
                                transform="translate(0,0) rotate(-45 589.3427248643541 244)"
                                y="244"
                                opacity="1"
                              >
                                15/03
                              </text>
                              <text
                                x="609.176058197684"
                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                text-anchor="end"
                                transform="translate(0,0) rotate(-45 609.176058197684 244)"
                                y="244"
                                opacity="1"
                              >
                                16/03
                              </text>
                              <text
                                x="629.009391531014"
                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                text-anchor="end"
                                transform="translate(0,0) rotate(-45 629.009391531014 244)"
                                y="244"
                                opacity="1"
                              >
                                17/03
                              </text>
                              <text
                                x="648.8427248643541"
                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                text-anchor="end"
                                transform="translate(0,0) rotate(-45 648.8427248643541 244)"
                                y="244"
                                opacity="1"
                              >
                                18/03
                              </text>
                              <text
                                x="668.676058197684"
                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                text-anchor="end"
                                transform="translate(0,0) rotate(-45 668.676058197684 244)"
                                y="244"
                                opacity="1"
                              >
                                19/03
                              </text>
                            </g>
                            <g
                              class="highcharts-axis-labels highcharts-yaxis-labels"
                              data-z-index="7"
                            >
                              <text
                                x="66"
                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                text-anchor="end"
                                transform="translate(0,0)"
                                y="232"
                                opacity="1"
                              >
                                0
                              </text>
                              <text
                                x="66"
                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                text-anchor="end"
                                transform="translate(0,0)"
                                y="178"
                                opacity="1"
                              >
                                500
                              </text>
                              <text
                                x="66"
                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                text-anchor="end"
                                transform="translate(0,0)"
                                y="123"
                                opacity="1"
                              >
                                1000
                              </text>
                              <text
                                x="66"
                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                text-anchor="end"
                                transform="translate(0,0)"
                                y="69"
                                opacity="1"
                              >
                                1500
                              </text>
                              <text
                                x="66"
                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                text-anchor="end"
                                transform="translate(0,0)"
                                y="14"
                                opacity="1"
                              >
                                2000
                              </text>
                            </g>
                          </svg>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="s" style="padding-bottom:50%"></div>
              </div>

              <div class="box std" data-col="4,3" style="width: 40%;">
                <div class="inner">
                  <div class="header">
                    Tổng hợp theo tuần
                    <div class="side"></div>
                  </div>
                  <div class="body -fit">
                    <div class="graph -fit">
                      <div
                        id="js-task-weekly-report"
                        style="height: 300px; overflow: hidden;"
                        data-highcharts-chart="3"
                      >
                        <div
                          id="highcharts-z3dbuhk-198"
                          dir="ltr"
                          class="highcharts-container "
                          style="position: relative; overflow: hidden; width: 445px; height: 300px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"
                        >
                          <svg
                            version="1.1"
                            class="highcharts-root"
                            style='font-family:"Lucida Grande", "Lucida Sans Unicode", Arial, Helvetica, sans-serif;font-size:12px;'
                            xmlns="http://www.w3.org/2000/svg"
                            width="445"
                            height="300"
                            viewBox="0 0 445 300"
                          >
                            <desc>Created with Highcharts 7.2.1</desc>
                            <defs>
                              <clipPath id="highcharts-z3dbuhk-199-">
                                <rect
                                  x="0"
                                  y="0"
                                  width="361"
                                  height="212"
                                  fill="none"
                                ></rect>
                              </clipPath>
                            </defs>
                            <rect
                              fill="#ffffff"
                              class="highcharts-background"
                              x="0"
                              y="0"
                              width="445"
                              height="300"
                              rx="0"
                              ry="0"
                            ></rect>
                            <rect
                              fill="none"
                              class="highcharts-plot-background"
                              x="74"
                              y="10"
                              width="361"
                              height="212"
                            ></rect>
                            <g
                              class="highcharts-grid highcharts-xaxis-grid"
                              data-z-index="1"
                            >
                              <path
                                fill="none"
                                data-z-index="1"
                                class="highcharts-grid-line"
                                d="M 145.5 10 L 145.5 222"
                                opacity="1"
                              ></path>
                              <path
                                fill="none"
                                data-z-index="1"
                                class="highcharts-grid-line"
                                d="M 217.5 10 L 217.5 222"
                                opacity="1"
                              ></path>
                              <path
                                fill="none"
                                data-z-index="1"
                                class="highcharts-grid-line"
                                d="M 290.5 10 L 290.5 222"
                                opacity="1"
                              ></path>
                              <path
                                fill="none"
                                data-z-index="1"
                                class="highcharts-grid-line"
                                d="M 362.5 10 L 362.5 222"
                                opacity="1"
                              ></path>
                              <path
                                fill="none"
                                data-z-index="1"
                                class="highcharts-grid-line"
                                d="M 434.5 10 L 434.5 222"
                                opacity="1"
                              ></path>
                              <path
                                fill="none"
                                data-z-index="1"
                                class="highcharts-grid-line"
                                d="M 73.5 10 L 73.5 222"
                                opacity="1"
                              ></path>
                            </g>
                            <g
                              class="highcharts-grid highcharts-yaxis-grid"
                              data-z-index="1"
                            >
                              <path
                                fill="none"
                                stroke="#e6e6e6"
                                stroke-width="1"
                                data-z-index="1"
                                class="highcharts-grid-line"
                                d="M 74 222.5 L 435 222.5"
                                opacity="1"
                              ></path>
                              <path
                                fill="none"
                                stroke="#e6e6e6"
                                stroke-width="1"
                                data-z-index="1"
                                class="highcharts-grid-line"
                                d="M 74 180.5 L 435 180.5"
                                opacity="1"
                              ></path>
                              <path
                                fill="none"
                                stroke="#e6e6e6"
                                stroke-width="1"
                                data-z-index="1"
                                class="highcharts-grid-line"
                                d="M 74 137.5 L 435 137.5"
                                opacity="1"
                              ></path>
                              <path
                                fill="none"
                                stroke="#e6e6e6"
                                stroke-width="1"
                                data-z-index="1"
                                class="highcharts-grid-line"
                                d="M 74 95.5 L 435 95.5"
                                opacity="1"
                              ></path>
                              <path
                                fill="none"
                                stroke="#e6e6e6"
                                stroke-width="1"
                                data-z-index="1"
                                class="highcharts-grid-line"
                                d="M 74 52.5 L 435 52.5"
                                opacity="1"
                              ></path>
                              <path
                                fill="none"
                                stroke="#e6e6e6"
                                stroke-width="1"
                                data-z-index="1"
                                class="highcharts-grid-line"
                                d="M 74 9.5 L 435 9.5"
                                opacity="1"
                              ></path>
                            </g>
                            <rect
                              fill="none"
                              class="highcharts-plot-border"
                              data-z-index="1"
                              x="74"
                              y="10"
                              width="361"
                              height="212"
                            ></rect>
                            <g
                              class="highcharts-axis highcharts-xaxis"
                              data-z-index="2"
                            >
                              <path
                                fill="none"
                                class="highcharts-axis-line"
                                stroke="#ccd6eb"
                                stroke-width="1"
                                data-z-index="7"
                                d="M 74 222.5 L 435 222.5"
                              ></path>
                            </g>
                            <g
                              class="highcharts-axis highcharts-yaxis"
                              data-z-index="2"
                            >
                              <text
                                x="26.078125"
                                data-z-index="7"
                                text-anchor="middle"
                                transform="translate(0,0) rotate(270 26.078125 116)"
                                class="highcharts-axis-title"
                                style="color:#666666;fill:#666666;"
                                y="116"
                              >
                                <tspan>Number of tasks</tspan>
                              </text>
                              <path
                                fill="none"
                                class="highcharts-axis-line"
                                data-z-index="7"
                                d="M 74 10 L 74 222"
                              ></path>
                            </g>
                            <g class="highcharts-series-group" data-z-index="3">
                              <g
                                data-z-index="0.1"
                                class="highcharts-series highcharts-series-0 highcharts-column-series highcharts-color-0 highcharts-tracker"
                                transform="translate(74,10) scale(1 1)"
                                clip-path="url(#highcharts-z3dbuhk-199-)"
                              >
                                <rect
                                  x="15.5"
                                  y="65.5"
                                  width="9"
                                  height="147"
                                  fill="#7cb5ec"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point highcharts-color-0"
                                ></rect>
                                <rect
                                  x="87.5"
                                  y="113.5"
                                  width="9"
                                  height="99"
                                  fill="#7cb5ec"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point highcharts-color-0"
                                ></rect>
                                <rect
                                  x="159.5"
                                  y="50.5"
                                  width="9"
                                  height="162"
                                  fill="#7cb5ec"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point highcharts-color-0"
                                ></rect>
                                <rect
                                  x="231.5"
                                  y="67.5"
                                  width="9"
                                  height="145"
                                  fill="#7cb5ec"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point highcharts-color-0"
                                ></rect>
                                <rect
                                  x="303.5"
                                  y="153.5"
                                  width="9"
                                  height="59"
                                  fill="#7cb5ec"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point highcharts-color-0"
                                ></rect>
                              </g>
                              <g
                                data-z-index="0.1"
                                class="highcharts-markers highcharts-series-0 highcharts-column-series highcharts-color-0"
                                transform="translate(74,10) scale(1 1)"
                                clip-path="none"
                              ></g>
                              <g
                                data-z-index="0.1"
                                class="highcharts-series highcharts-series-1 highcharts-column-series highcharts-color-1 highcharts-tracker"
                                transform="translate(74,10) scale(1 1)"
                                clip-path="url(#highcharts-z3dbuhk-199-)"
                              >
                                <rect
                                  x="25.5"
                                  y="145.5"
                                  width="9"
                                  height="67"
                                  fill="#434348"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point highcharts-color-1"
                                ></rect>
                                <rect
                                  x="98.5"
                                  y="174.5"
                                  width="9"
                                  height="38"
                                  fill="#434348"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point highcharts-color-1"
                                ></rect>
                                <rect
                                  x="170.5"
                                  y="121.5"
                                  width="9"
                                  height="91"
                                  fill="#434348"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point highcharts-color-1"
                                ></rect>
                                <rect
                                  x="242.5"
                                  y="108.5"
                                  width="9"
                                  height="104"
                                  fill="#434348"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point highcharts-color-1"
                                ></rect>
                                <rect
                                  x="314.5"
                                  y="174.5"
                                  width="9"
                                  height="38"
                                  fill="#434348"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point highcharts-color-1"
                                ></rect>
                              </g>
                              <g
                                data-z-index="0.1"
                                class="highcharts-markers highcharts-series-1 highcharts-column-series highcharts-color-1"
                                transform="translate(74,10) scale(1 1)"
                                clip-path="none"
                              ></g>
                              <g
                                data-z-index="0.1"
                                class="highcharts-series highcharts-series-2 highcharts-column-series highcharts-color-2 highcharts-tracker"
                                transform="translate(74,10) scale(1 1)"
                                clip-path="url(#highcharts-z3dbuhk-199-)"
                              >
                                <rect
                                  x="36.5"
                                  y="167.5"
                                  width="9"
                                  height="45"
                                  fill="#90ed7d"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point highcharts-color-2"
                                ></rect>
                                <rect
                                  x="108.5"
                                  y="184.5"
                                  width="9"
                                  height="28"
                                  fill="#90ed7d"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point highcharts-color-2"
                                ></rect>
                                <rect
                                  x="181.5"
                                  y="188.5"
                                  width="9"
                                  height="24"
                                  fill="#90ed7d"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point highcharts-color-2"
                                ></rect>
                                <rect
                                  x="253.5"
                                  y="196.5"
                                  width="9"
                                  height="16"
                                  fill="#90ed7d"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point highcharts-color-2"
                                ></rect>
                                <rect
                                  x="325.5"
                                  y="206.5"
                                  width="9"
                                  height="6"
                                  fill="#90ed7d"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point highcharts-color-2"
                                ></rect>
                              </g>
                              <g
                                data-z-index="0.1"
                                class="highcharts-markers highcharts-series-2 highcharts-column-series highcharts-color-2"
                                transform="translate(74,10) scale(1 1)"
                                clip-path="none"
                              ></g>
                              <g
                                data-z-index="0.1"
                                class="highcharts-series highcharts-series-3 highcharts-column-series highcharts-color-3 highcharts-tracker"
                                transform="translate(74,10) scale(1 1)"
                                clip-path="url(#highcharts-z3dbuhk-199-)"
                              >
                                <rect
                                  x="47.5"
                                  y="177.5"
                                  width="9"
                                  height="35"
                                  fill="#f7a35c"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point highcharts-color-3"
                                ></rect>
                                <rect
                                  x="119.5"
                                  y="178.5"
                                  width="9"
                                  height="34"
                                  fill="#f7a35c"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point highcharts-color-3"
                                ></rect>
                                <rect
                                  x="191.5"
                                  y="165.5"
                                  width="9"
                                  height="47"
                                  fill="#f7a35c"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point highcharts-color-3"
                                ></rect>
                                <rect
                                  x="264.5"
                                  y="187.5"
                                  width="9"
                                  height="25"
                                  fill="#f7a35c"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point highcharts-color-3"
                                ></rect>
                                <rect
                                  x="336.5"
                                  y="197.5"
                                  width="9"
                                  height="15"
                                  fill="#f7a35c"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  class="highcharts-point highcharts-color-3"
                                ></rect>
                              </g>
                              <g
                                data-z-index="0.1"
                                class="highcharts-markers highcharts-series-3 highcharts-column-series highcharts-color-3"
                                transform="translate(74,10) scale(1 1)"
                                clip-path="none"
                              ></g>
                            </g>
                            <text
                              x="223"
                              text-anchor="middle"
                              class="highcharts-title"
                              data-z-index="4"
                              style="color:#333333;font-size:18px;display:none;fill:#333333;"
                              y="24"
                            >
                              <tspan>Chart title</tspan>
                            </text>
                            <text
                              x="223"
                              text-anchor="middle"
                              class="highcharts-subtitle"
                              data-z-index="4"
                              style="color:#666666;fill:#666666;"
                              y="24"
                            ></text>
                            <text
                              x="10"
                              text-anchor="start"
                              class="highcharts-caption"
                              data-z-index="4"
                              style="color:#666666;fill:#666666;"
                              y="297"
                            ></text>
                            <g
                              class="highcharts-legend"
                              data-z-index="7"
                              transform="translate(48,256)"
                            >
                              <rect
                                fill="none"
                                class="highcharts-legend-box"
                                rx="0"
                                ry="0"
                                x="0"
                                y="0"
                                width="349"
                                height="29"
                                visibility="visible"
                              ></rect>
                              <g data-z-index="1">
                                <g>
                                  <g
                                    class="highcharts-legend-item highcharts-column-series highcharts-color-0 highcharts-series-0"
                                    data-z-index="1"
                                    transform="translate(8,3)"
                                  >
                                    <text
                                      x="21"
                                      style="color:#333333;cursor:pointer;font-size:12px;font-weight:bold;fill:#333333;"
                                      text-anchor="start"
                                      data-z-index="2"
                                      y="15"
                                    >
                                      <tspan>Tasks</tspan>
                                    </text>
                                    <rect
                                      x="2"
                                      y="4"
                                      width="12"
                                      height="12"
                                      fill="#7cb5ec"
                                      rx="6"
                                      ry="6"
                                      class="highcharts-point"
                                      data-z-index="3"
                                    ></rect>
                                  </g>
                                  <g
                                    class="highcharts-legend-item highcharts-column-series highcharts-color-1 highcharts-series-1"
                                    data-z-index="1"
                                    transform="translate(85.3125,3)"
                                  >
                                    <text
                                      x="21"
                                      y="15"
                                      style="color:#333333;cursor:pointer;font-size:12px;font-weight:bold;fill:#333333;"
                                      text-anchor="start"
                                      data-z-index="2"
                                    >
                                      <tspan>In progress</tspan>
                                    </text>
                                    <rect
                                      x="2"
                                      y="4"
                                      width="12"
                                      height="12"
                                      fill="#434348"
                                      rx="6"
                                      ry="6"
                                      class="highcharts-point"
                                      data-z-index="3"
                                    ></rect>
                                  </g>
                                  <g
                                    class="highcharts-legend-item highcharts-column-series highcharts-color-2 highcharts-series-2"
                                    data-z-index="1"
                                    transform="translate(195.21875,3)"
                                  >
                                    <text
                                      x="21"
                                      y="15"
                                      style="color:#333333;cursor:pointer;font-size:12px;font-weight:bold;fill:#333333;"
                                      text-anchor="start"
                                      data-z-index="2"
                                    >
                                      <tspan>Done</tspan>
                                    </text>
                                    <rect
                                      x="2"
                                      y="4"
                                      width="12"
                                      height="12"
                                      fill="#90ed7d"
                                      rx="6"
                                      ry="6"
                                      class="highcharts-point"
                                      data-z-index="3"
                                    ></rect>
                                  </g>
                                  <g
                                    class="highcharts-legend-item highcharts-column-series highcharts-color-3 highcharts-series-3"
                                    data-z-index="1"
                                    transform="translate(268.75,3)"
                                  >
                                    <text
                                      x="21"
                                      y="15"
                                      style="color:#333333;cursor:pointer;font-size:12px;font-weight:bold;fill:#333333;"
                                      text-anchor="start"
                                      data-z-index="2"
                                    >
                                      <tspan>Overdue</tspan>
                                    </text>
                                    <rect
                                      x="2"
                                      y="4"
                                      width="12"
                                      height="12"
                                      fill="#f7a35c"
                                      rx="6"
                                      ry="6"
                                      class="highcharts-point"
                                      data-z-index="3"
                                    ></rect>
                                  </g>
                                </g>
                              </g>
                            </g>
                            <g
                              class="highcharts-axis-labels highcharts-xaxis-labels"
                              data-z-index="7"
                            >
                              <text
                                x="110.1"
                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                text-anchor="middle"
                                transform="translate(0,0)"
                                y="241"
                                opacity="1"
                              >
                                17-23/02
                              </text>
                              <text
                                x="182.3"
                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                text-anchor="middle"
                                transform="translate(0,0)"
                                y="241"
                                opacity="1"
                              >
                                24-01/03
                              </text>
                              <text
                                x="254.50000000000003"
                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                text-anchor="middle"
                                transform="translate(0,0)"
                                y="241"
                                opacity="1"
                              >
                                02-08/03
                              </text>
                              <text
                                x="326.7"
                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                text-anchor="middle"
                                transform="translate(0,0)"
                                y="241"
                                opacity="1"
                              >
                                09-15/03
                              </text>
                              <text
                                x="398.9"
                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                text-anchor="middle"
                                transform="translate(0,0)"
                                y="241"
                                opacity="1"
                              >
                                16-22/03
                              </text>
                            </g>
                            <g
                              class="highcharts-axis-labels highcharts-yaxis-labels"
                              data-z-index="7"
                            >
                              <text
                                x="59"
                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                text-anchor="end"
                                transform="translate(0,0)"
                                y="226"
                                opacity="1"
                              >
                                0
                              </text>
                              <text
                                x="59"
                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                text-anchor="end"
                                transform="translate(0,0)"
                                y="184"
                                opacity="1"
                              >
                                100
                              </text>
                              <text
                                x="59"
                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                text-anchor="end"
                                transform="translate(0,0)"
                                y="141"
                                opacity="1"
                              >
                                200
                              </text>
                              <text
                                x="59"
                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                text-anchor="end"
                                transform="translate(0,0)"
                                y="99"
                                opacity="1"
                              >
                                300
                              </text>
                              <text
                                x="59"
                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                text-anchor="end"
                                transform="translate(0,0)"
                                y="56"
                                opacity="1"
                              >
                                400
                              </text>
                              <text
                                x="59"
                                style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                                text-anchor="end"
                                transform="translate(0,0)"
                                y="14"
                                opacity="1"
                              >
                                500
                              </text>
                            </g>
                          </svg>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="s" style="padding-bottom:75%"></div>
              </div>
            </div>

            <div class="db-grid" data-col="10">
              <div class="box std" data-col="6,5" style="width: 60%;">
                <div class="inner">
                  <div class="header">
                    Báo cáo chi tiết theo thành viên
                    <div class="side"></div>
                  </div>
                  <div class="body -fit">
                    <div class="scrollbox scroll-y -smaller">
                      <div class="thead">
                        <div class="tmain">Member</div>
                        <div class="tside">
                          <div class="col" style="width:100px"></div>
                          <div class="col ap-xdot" style="width:60px">
                            Done ontime
                          </div>
                          <div class="col ap-xdot" style="width:60px">
                            Done late
                          </div>
                          <div class="col ap-xdot" style="width:60px">
                            Overdue
                          </div>
                          <div class="col ap-xdot" style="width:60px">
                            In review
                          </div>
                        </div>
                      </div>
                      <!--thanh vien-->
                      <div class="list" id="js-members-report">
                        <div class="item">
                          <div class="icon">
                            <div class="avatar">
                              <img
                                src="https://data-gcdn.basecdn.net/avatar/sys121/bf/cb/99/5c/c4/4f2d919fdc90fcff8406d552282383a2/0.tuyetnguyen_121.jpg"
                              />
                            </div>
                          </div>
                          <div class="name">
                            <span class="url" data-username="tuyetnguyen"
                              >Nguyễn Thị Trang</span
                            >
                          </div>
                          <div class="info"><em>132</em> assigned tasks</div>
                          <div class="side">
                            <div class="col" style="width:100px;">
                              <div class="mbar clear-fix">
                                <div
                                  class="b -infow"
                                  style="width:9.090909090909092%; background-color:#14cc3f;"
                                >
                                  <span class="-infobox -up -w200"
                                    ><span class="-box block normal"
                                      >Done ontime: 12</span
                                    ></span
                                  >
                                </div>
                                <div
                                  class="b -infow"
                                  style="width:2.272727272727273%; background-color:#f7e015;"
                                >
                                  <span class="-infobox -up -w200"
                                    ><span class="-box block normal"
                                      >Done late: 3</span
                                    ></span
                                  >
                                </div>
                                <div
                                  class="b -infow"
                                  style="width:76.51515151515152%; background-color:#f54e3b;"
                                >
                                  <span class="-infobox -up -w200"
                                    ><span class="-box block normal"
                                      >Overdue: 101</span
                                    ></span
                                  >
                                </div>
                                <div
                                  class="b -infow"
                                  style="width:12.121212121212121%; background-color:#389dd9;"
                                >
                                  <span class="-infobox -up -w200"
                                    ><span class="-box block normal"
                                      >In progress: 16</span
                                    ></span
                                  >
                                </div>
                              </div>
                            </div>
                            <div class="col" style="width: 60px; padding:2px 0">
                              <em style="color:#14cc3f">12</em>
                            </div>
                            <div class="col" style="width: 60px; padding:2px 0">
                              <em style="color:#f7e015">3</em>
                            </div>
                            <div class="col" style="width: 60px; padding:2px 0">
                              <em style="color:#f54e3b">101</em>
                            </div>
                            <div class="col" style="width: 60px; padding:2px 0">
                              <em style="color:#751de0">0</em>
                            </div>
                          </div>
                        </div>

                        <div class="item">
                          <div class="icon">
                            <div class="avatar">
                              <img
                                src="https://data-gcdn.basecdn.net/avatar/sys121/95/17/5c/cd/23/a4ecbba291849fb3ef99a65e574bdf9f/0.linhdan_121.jpg"
                              />
                            </div>
                          </div>
                          <div class="name">
                            <span class="url" data-username="linhdan"
                              >Đan Thảo</span
                            >
                          </div>
                          <div class="info"><em>65</em> assigned tasks</div>
                          <div class="side">
                            <div class="col" style="width:100px;">
                              <div class="mbar clear-fix">
                                <div
                                  class="b -infow"
                                  style="width:32.30769230769231%; background-color:#14cc3f;"
                                >
                                  <span class="-infobox -up -w200"
                                    ><span class="-box block normal"
                                      >Done ontime: 21</span
                                    ></span
                                  >
                                </div>
                                <div
                                  class="b -infow"
                                  style="width:4.615384615384615%; background-color:#f7e015;"
                                >
                                  <span class="-infobox -up -w200"
                                    ><span class="-box block normal"
                                      >Done late: 3</span
                                    ></span
                                  >
                                </div>
                                <div
                                  class="b -infow"
                                  style="width:4.615384615384615%; background-color:#f54e3b;"
                                >
                                  <span class="-infobox -up -w200"
                                    ><span class="-box block normal"
                                      >Overdue: 3</span
                                    ></span
                                  >
                                </div>
                                <div
                                  class="b -infow"
                                  style="width:58.46153846153846%; background-color:#389dd9;"
                                >
                                  <span class="-infobox -up -w200"
                                    ><span class="-box block normal"
                                      >In progress: 38</span
                                    ></span
                                  >
                                </div>
                              </div>
                            </div>
                            <div class="col" style="width: 60px; padding:2px 0">
                              <em style="color:#14cc3f">21</em>
                            </div>
                            <div class="col" style="width: 60px; padding:2px 0">
                              <em style="color:#f7e015">3</em>
                            </div>
                            <div class="col" style="width: 60px; padding:2px 0">
                              <em style="color:#f54e3b">3</em>
                            </div>
                            <div class="col" style="width: 60px; padding:2px 0">
                              <em style="color:#751de0">0</em>
                            </div>
                          </div>
                        </div>

                        <div class="item">
                          <div class="icon">
                            <div class="avatar">
                              <img
                                src="https://data-gcdn.basecdn.net/avatar/sys121/64/6b/1c/8b/f4/c406e7dca53bc27a0676e22ecf912de3/0.thuytrang_121.jpg"
                              />
                            </div>
                          </div>
                          <div class="name">
                            <span class="url" data-username="thuytrang"
                              >Hồng Nhung</span
                            >
                          </div>
                          <div class="info"><em>64</em> assigned tasks</div>
                          <div class="side">
                            <div class="col" style="width:100px;">
                              <div class="mbar clear-fix">
                                <div
                                  class="b -infow"
                                  style="width:14.0625%; background-color:#14cc3f;"
                                >
                                  <span class="-infobox -up -w200"
                                    ><span class="-box block normal"
                                      >Done ontime: 9</span
                                    ></span
                                  >
                                </div>
                                <div
                                  class="b -infow"
                                  style="width:0%; background-color:#f7e015;"
                                >
                                  <span class="-infobox -up -w200"
                                    ><span class="-box block normal"
                                      >Done late: 0</span
                                    ></span
                                  >
                                </div>
                                <div
                                  class="b -infow"
                                  style="width:26.5625%; background-color:#f54e3b;"
                                >
                                  <span class="-infobox -up -w200"
                                    ><span class="-box block normal"
                                      >Overdue: 17</span
                                    ></span
                                  >
                                </div>
                                <div
                                  class="b -infow"
                                  style="width:59.375%; background-color:#389dd9;"
                                >
                                  <span class="-infobox -up -w200"
                                    ><span class="-box block normal"
                                      >In progress: 38</span
                                    ></span
                                  >
                                </div>
                              </div>
                            </div>
                            <div class="col" style="width: 60px; padding:2px 0">
                              <em style="color:#14cc3f">9</em>
                            </div>
                            <div class="col" style="width: 60px; padding:2px 0">
                              <em style="color:#f7e015">0</em>
                            </div>
                            <div class="col" style="width: 60px; padding:2px 0">
                              <em style="color:#f54e3b">17</em>
                            </div>
                            <div class="col" style="width: 60px; padding:2px 0">
                              <em style="color:#751de0">3</em>
                            </div>
                          </div>
                        </div>

                        <div class="item">
                          <div class="icon">
                            <div class="avatar">
                              <img
                                src="https://data-gcdn.basecdn.net/avatar/sys121/19/ce/f1/12/fa/8004ae32709fb70899d68a4311f4f855/0.giangnguyen_121.jpg"
                              />
                            </div>
                          </div>
                          <div class="name">
                            <span class="url" data-username="giangnguyen"
                              >Trần Phú</span
                            >
                          </div>
                          <div class="info"><em>50</em> assigned tasks</div>
                          <div class="side">
                            <div class="col" style="width:100px;">
                              <div class="mbar clear-fix">
                                <div
                                  class="b -infow"
                                  style="width:26%; background-color:#14cc3f;"
                                >
                                  <span class="-infobox -up -w200"
                                    ><span class="-box block normal"
                                      >Done ontime: 13</span
                                    ></span
                                  >
                                </div>
                                <div
                                  class="b -infow"
                                  style="width:0%; background-color:#f7e015;"
                                >
                                  <span class="-infobox -up -w200"
                                    ><span class="-box block normal"
                                      >Done late: 0</span
                                    ></span
                                  >
                                </div>
                                <div
                                  class="b -infow"
                                  style="width:10%; background-color:#f54e3b;"
                                >
                                  <span class="-infobox -up -w200"
                                    ><span class="-box block normal"
                                      >Overdue: 5</span
                                    ></span
                                  >
                                </div>
                                <div
                                  class="b -infow"
                                  style="width:64%; background-color:#389dd9;"
                                >
                                  <span class="-infobox -up -w200"
                                    ><span class="-box block normal"
                                      >In progress: 32</span
                                    ></span
                                  >
                                </div>
                              </div>
                            </div>
                            <div class="col" style="width: 60px; padding:2px 0">
                              <em style="color:#14cc3f">13</em>
                            </div>
                            <div class="col" style="width: 60px; padding:2px 0">
                              <em style="color:#f7e015">0</em>
                            </div>
                            <div class="col" style="width: 60px; padding:2px 0">
                              <em style="color:#f54e3b">5</em>
                            </div>
                            <div class="col" style="width: 60px; padding:2px 0">
                              <em style="color:#751de0">1</em>
                            </div>
                          </div>
                        </div>

                        <div class="item">
                          <div class="icon">
                            <div class="avatar">
                              <img
                                src="https://data-gcdn.basecdn.net/avatar/sys121/d4/a6/12/a6/91/8208ff221b7a78ca51b0ec4fe632c89f/0.giangle_121.jpg"
                              />
                            </div>
                          </div>
                          <div class="name">
                            <span class="url" data-username="giangle"
                              >Đăng Cường</span
                            >
                          </div>
                          <div class="info"><em>48</em> assigned tasks</div>
                          <div class="side">
                            <div class="col" style="width:100px;">
                              <div class="mbar clear-fix">
                                <div
                                  class="b -infow"
                                  style="width:52.083333333333336%; background-color:#14cc3f;"
                                >
                                  <span class="-infobox -up -w200"
                                    ><span class="-box block normal"
                                      >Done ontime: 25</span
                                    ></span
                                  >
                                </div>
                                <div
                                  class="b -infow"
                                  style="width:2.0833333333333335%; background-color:#f7e015;"
                                >
                                  <span class="-infobox -up -w200"
                                    ><span class="-box block normal"
                                      >Done late: 1</span
                                    ></span
                                  >
                                </div>
                                <div
                                  class="b -infow"
                                  style="width:37.5%; background-color:#f54e3b;"
                                >
                                  <span class="-infobox -up -w200"
                                    ><span class="-box block normal"
                                      >Overdue: 18</span
                                    ></span
                                  >
                                </div>
                                <div
                                  class="b -infow"
                                  style="width:8.333333333333334%; background-color:#389dd9;"
                                >
                                  <span class="-infobox -up -w200"
                                    ><span class="-box block normal"
                                      >In progress: 4</span
                                    ></span
                                  >
                                </div>
                              </div>
                            </div>
                            <div class="col" style="width: 60px; padding:2px 0">
                              <em style="color:#14cc3f">25</em>
                            </div>
                            <div class="col" style="width: 60px; padding:2px 0">
                              <em style="color:#f7e015">1</em>
                            </div>
                            <div class="col" style="width: 60px; padding:2px 0">
                              <em style="color:#f54e3b">18</em>
                            </div>
                            <div class="col" style="width: 60px; padding:2px 0">
                              <em style="color:#751de0">0</em>
                            </div>
                          </div>
                        </div>

                        <div class="item">
                          <div class="icon">
                            <div class="avatar">
                              <img
                                src="https://data-gcdn.basecdn.net/avatar/sys121/ba/f9/d1/47/30/e7a5093c5bf356d492e3279e55b99a82/0.vuanh_121.jpg"
                              />
                            </div>
                          </div>
                          <div class="name">
                            <span class="url" data-username="vuanh"
                              >Bảo Ngọc</span
                            >
                          </div>
                          <div class="info"><em>47</em> assigned tasks</div>
                          <div class="side">
                            <div class="col" style="width:100px;">
                              <div class="mbar clear-fix">
                                <div
                                  class="b -infow"
                                  style="width:23.404255319148938%; background-color:#14cc3f;"
                                >
                                  <span class="-infobox -up -w200"
                                    ><span class="-box block normal"
                                      >Done ontime: 11</span
                                    ></span
                                  >
                                </div>
                                <div
                                  class="b -infow"
                                  style="width:8.51063829787234%; background-color:#f7e015;"
                                >
                                  <span class="-infobox -up -w200"
                                    ><span class="-box block normal"
                                      >Done late: 4</span
                                    ></span
                                  >
                                </div>
                                <div
                                  class="b -infow"
                                  style="width:17.02127659574468%; background-color:#f54e3b;"
                                >
                                  <span class="-infobox -up -w200"
                                    ><span class="-box block normal"
                                      >Overdue: 8</span
                                    ></span
                                  >
                                </div>
                                <div
                                  class="b -infow"
                                  style="width:51.06382978723404%; background-color:#389dd9;"
                                >
                                  <span class="-infobox -up -w200"
                                    ><span class="-box block normal"
                                      >In progress: 24</span
                                    ></span
                                  >
                                </div>
                              </div>
                            </div>
                            <div class="col" style="width: 60px; padding:2px 0">
                              <em style="color:#14cc3f">11</em>
                            </div>
                            <div class="col" style="width: 60px; padding:2px 0">
                              <em style="color:#f7e015">4</em>
                            </div>
                            <div class="col" style="width: 60px; padding:2px 0">
                              <em style="color:#f54e3b">8</em>
                            </div>
                            <div class="col" style="width: 60px; padding:2px 0">
                              <em style="color:#751de0">0</em>
                            </div>
                          </div>
                        </div>

                        <div class="item">
                          <div class="icon">
                            <div class="avatar">
                              <img
                                src="https://data-gcdn.basecdn.net/avatar/sys121/ba/f9/d1/47/30/e7a5093c5bf356d492e3279e55b99a82/0.vuanh_121.jpg"
                              />
                            </div>
                          </div>
                          <div class="name">
                            <span class="url" data-username="vuanh"
                              >Bảo Ngọc</span
                            >
                          </div>
                          <div class="info"><em>47</em> assigned tasks</div>
                          <div class="side">
                            <div class="col" style="width:100px;">
                              <div class="mbar clear-fix">
                                <div
                                  class="b -infow"
                                  style="width:23.404255319148938%; background-color:#14cc3f;"
                                >
                                  <span class="-infobox -up -w200"
                                    ><span class="-box block normal"
                                      >Done ontime: 11</span
                                    ></span
                                  >
                                </div>
                                <div
                                  class="b -infow"
                                  style="width:8.51063829787234%; background-color:#f7e015;"
                                >
                                  <span class="-infobox -up -w200"
                                    ><span class="-box block normal"
                                      >Done late: 4</span
                                    ></span
                                  >
                                </div>
                                <div
                                  class="b -infow"
                                  style="width:17.02127659574468%; background-color:#f54e3b;"
                                >
                                  <span class="-infobox -up -w200"
                                    ><span class="-box block normal"
                                      >Overdue: 8</span
                                    ></span
                                  >
                                </div>
                                <div
                                  class="b -infow"
                                  style="width:51.06382978723404%; background-color:#389dd9;"
                                >
                                  <span class="-infobox -up -w200"
                                    ><span class="-box block normal"
                                      >In progress: 24</span
                                    ></span
                                  >
                                </div>
                              </div>
                            </div>
                            <div class="col" style="width: 60px; padding:2px 0">
                              <em style="color:#14cc3f">11</em>
                            </div>
                            <div class="col" style="width: 60px; padding:2px 0">
                              <em style="color:#f7e015">4</em>
                            </div>
                            <div class="col" style="width: 60px; padding:2px 0">
                              <em style="color:#f54e3b">8</em>
                            </div>
                            <div class="col" style="width: 60px; padding:2px 0">
                              <em style="color:#751de0">0</em>
                            </div>
                          </div>
                        </div>

                        <div class="item">
                          <div class="icon">
                            <div class="avatar">
                              <img
                                src="https://data-gcdn.basecdn.net/image/0.noavatar.png"
                              />
                            </div>
                          </div>
                          <div class="name">
                            <span class="url" data-username="none"
                              >Minh Trí</span
                            >
                          </div>
                          <div class="info"><em>42</em> assigned tasks</div>
                          <div class="side">
                            <div class="col" style="width:100px;">
                              <div class="mbar clear-fix">
                                <div
                                  class="b -infow"
                                  style="width:19.047619047619047%; background-color:#14cc3f;"
                                >
                                  <span class="-infobox -up -w200"
                                    ><span class="-box block normal"
                                      >Done ontime: 8</span
                                    ></span
                                  >
                                </div>
                                <div
                                  class="b -infow"
                                  style="width:4.761904761904762%; background-color:#f7e015;"
                                >
                                  <span class="-infobox -up -w200"
                                    ><span class="-box block normal"
                                      >Done late: 2</span
                                    ></span
                                  >
                                </div>
                                <div
                                  class="b -infow"
                                  style="width:66.66666666666667%; background-color:#f54e3b;"
                                >
                                  <span class="-infobox -up -w200"
                                    ><span class="-box block normal"
                                      >Overdue: 28</span
                                    ></span
                                  >
                                </div>
                                <div
                                  class="b -infow"
                                  style="width:9.523809523809524%; background-color:#389dd9;"
                                >
                                  <span class="-infobox -up -w200"
                                    ><span class="-box block normal"
                                      >In progress: 4</span
                                    ></span
                                  >
                                </div>
                              </div>
                            </div>
                            <div class="col" style="width: 60px; padding:2px 0">
                              <em style="color:#14cc3f">8</em>
                            </div>
                            <div class="col" style="width: 60px; padding:2px 0">
                              <em style="color:#f7e015">2</em>
                            </div>
                            <div class="col" style="width: 60px; padding:2px 0">
                              <em style="color:#f54e3b">28</em>
                            </div>
                            <div class="col" style="width: 60px; padding:2px 0">
                              <em style="color:#751de0">1</em>
                            </div>
                          </div>
                        </div>

                        <div class="item">
                          <div class="icon">
                            <div class="avatar">
                              <img
                                src="https://data-gcdn.basecdn.net/image/0.noavatar.png"
                              />
                            </div>
                          </div>
                          <div class="name">
                            <span class="url" data-username="none"
                              >Hoàng Anh</span
                            >
                          </div>
                          <div class="info"><em>40</em> assigned tasks</div>
                          <div class="side">
                            <div class="col" style="width:100px;">
                              <div class="mbar clear-fix">
                                <div
                                  class="b -infow"
                                  style="width:5%; background-color:#14cc3f;"
                                >
                                  <span class="-infobox -up -w200"
                                    ><span class="-box block normal"
                                      >Done ontime: 2</span
                                    ></span
                                  >
                                </div>
                                <div
                                  class="b -infow"
                                  style="width:0%; background-color:#f7e015;"
                                >
                                  <span class="-infobox -up -w200"
                                    ><span class="-box block normal"
                                      >Done late: 0</span
                                    ></span
                                  >
                                </div>
                                <div
                                  class="b -infow"
                                  style="width:95%; background-color:#f54e3b;"
                                >
                                  <span class="-infobox -up -w200"
                                    ><span class="-box block normal"
                                      >Overdue: 38</span
                                    ></span
                                  >
                                </div>
                                <div
                                  class="b -infow"
                                  style="width:0%; background-color:#389dd9;"
                                >
                                  <span class="-infobox -up -w200"
                                    ><span class="-box block normal"
                                      >In progress: 0</span
                                    ></span
                                  >
                                </div>
                              </div>
                            </div>
                            <div class="col" style="width: 60px; padding:2px 0">
                              <em style="color:#14cc3f">2</em>
                            </div>
                            <div class="col" style="width: 60px; padding:2px 0">
                              <em style="color:#f7e015">0</em>
                            </div>
                            <div class="col" style="width: 60px; padding:2px 0">
                              <em style="color:#f54e3b">38</em>
                            </div>
                            <div class="col" style="width: 60px; padding:2px 0">
                              <em style="color:#751de0">0</em>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="s" style="padding-bottom:83.33333333333333%"></div>
              </div>

              <div class="box std" data-col="2,5" style="width: 20%;">
                <div class="inner">
                  <div class="header">
                    Còn nhiều việc nhất
                    <div class="side"></div>
                  </div>
                  <div class="body -fit">
                    <div class="scrollbox scroll-y -smaller">
                      <!--begin bao cao-->
                      <div class="list" id="js-members-top-pendings-report">
                        <div class="item">
                          <div class="icon">
                            <div class="avatar">
                              <img
                                src="https://data-gcdn.basecdn.net/avatar/sys121/bf/cb/99/5c/c4/4f2d919fdc90fcff8406d552282383a2/0.tuyetnguyen_121.jpg"
                              />
                            </div>
                          </div>
                          <div class="name">
                            <span class="url" data-username="tuyetnguyen"
                              >Đan Thảo</span
                            >
                          </div>
                          <div class="info"><em>117</em>/132 active tasks</div>
                        </div>

                        <div class="item">
                          <div class="icon">
                            <div class="avatar">
                              <img
                                src="https://data-gcdn.basecdn.net/avatar/sys121/64/6b/1c/8b/f4/c406e7dca53bc27a0676e22ecf912de3/0.thuytrang_121.jpg"
                              />
                            </div>
                          </div>
                          <div class="name">
                            <span class="url" data-username="thuytrang"
                              >Hồng Nhung</span
                            >
                          </div>
                          <div class="info"><em>55</em>/64 active tasks</div>
                        </div>

                        <div class="item">
                          <div class="icon">
                            <div class="avatar">
                              <img
                                src="https://data-gcdn.basecdn.net/avatar/sys121/95/17/5c/cd/23/a4ecbba291849fb3ef99a65e574bdf9f/0.linhdan_121.jpg"
                              />
                            </div>
                          </div>
                          <div class="name">
                            <span class="url" data-username="linhdan"
                              >Linh Đan</span
                            >
                          </div>
                          <div class="info"><em>41</em>/65 active tasks</div>
                        </div>

                        <div class="item">
                          <div class="icon">
                            <div class="avatar">
                              <img
                                src="https://data-gcdn.basecdn.net/avatar/sys121/19/ce/f1/12/fa/8004ae32709fb70899d68a4311f4f855/0.giangnguyen_121.jpg"
                              />
                            </div>
                          </div>
                          <div class="name">
                            <span class="url" data-username="giangnguyen"
                              >Thanh Lam</span
                            >
                          </div>
                          <div class="info"><em>37</em>/50 active tasks</div>
                        </div>

                        <div class="item">
                          <div class="icon">
                            <div class="avatar">
                              <img
                                src="https://data-gcdn.basecdn.net/avatar/sys121/ba/f9/d1/47/30/e7a5093c5bf356d492e3279e55b99a82/0.vuanh_121.jpg"
                              />
                            </div>
                          </div>
                          <div class="name">
                            <span class="url" data-username="vuanh"
                              >Hồng Anh</span
                            >
                          </div>
                          <div class="info"><em>32</em>/47 active tasks</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="s" style="padding-bottom:250%"></div>
              </div>

              <div class="box std" data-col="2,5" style="width: 20%;">
                <div class="inner">
                  <div class="header">
                    Làm muộn nhiều nhất
                    <div class="side"></div>
                  </div>
                  <div class="body -fit">
                    <div class="scrollbox xo">
                      <div class="list" id="js-members-top-lates-report">
                        <div class="item">
                          <div class="icon">
                            <div class="avatar">
                              <img
                                src="https://data-gcdn.basecdn.net/avatar/sys121/bf/cb/99/5c/c4/4f2d919fdc90fcff8406d552282383a2/0.tuyetnguyen_121.jpg"
                              />
                            </div>
                          </div>
                          <div class="name">
                            <span class="url red" data-username="tuyetnguyen"
                              >Hồng Nhung</span
                            >
                          </div>
                          <div class="info">
                            <em>101</em> overdue · 3 done late
                          </div>
                        </div>

                        <div class="item">
                          <div class="icon">
                            <div class="avatar">
                              <img
                                src="https://data-gcdn.basecdn.net/avatar/sys121/d4/a6/12/a6/91/8208ff221b7a78ca51b0ec4fe632c89f/0.giangle_121.jpg"
                              />
                            </div>
                          </div>
                          <div class="name">
                            <span class="url red" data-username="giangle"
                              >Đan Thảo</span
                            >
                          </div>
                          <div class="info">
                            <em>18</em> overdue · 1 done late
                          </div>
                        </div>

                        <div class="item">
                          <div class="icon">
                            <div class="avatar">
                              <img
                                src="https://data-gcdn.basecdn.net/avatar/sys121/64/6b/1c/8b/f4/c406e7dca53bc27a0676e22ecf912de3/0.thuytrang_121.jpg"
                              />
                            </div>
                          </div>
                          <div class="name">
                            <span class="url red" data-username="thuytrang"
                              >Thanh Lam</span
                            >
                          </div>
                          <div class="info">
                            <em>17</em> overdue · 0 done late
                          </div>
                        </div>

                        <div class="item">
                          <div class="icon">
                            <div class="avatar">
                              <img
                                src="https://data-gcdn.basecdn.net/avatar/sys121/ba/f9/d1/47/30/e7a5093c5bf356d492e3279e55b99a82/0.vuanh_121.jpg"
                              />
                            </div>
                          </div>
                          <div class="name">
                            <span class="url red" data-username="vuanh"
                              >Hoàng Anh</span
                            >
                          </div>
                          <div class="info">
                            <em>8</em> overdue · 4 done late
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="s" style="padding-bottom:250%"></div>
              </div>
            </div>

            <div class="db-title">Projects, teams and departments</div>

            <div class="db-grid" data-col="10">
              <div class="box std" data-col="6,4" style="width: 60%;">
                <div class="inner">
                  <div class="header">
                    Dự án &amp; Phòng ban
                    <div class="side"></div>
                  </div>

                  <div class="body -fit">
                    <div class="scrollbox scroll-y -smaller">
                      <div class="table xo">
                        <table>
                          <thead>
                            <tr>
                              <th>Member</th>
                              <th style="width:60px;">
                                <div class="ap-xdot">Tasks</div>
                              </th>
                              <th style="width:60px;">
                                <div class="ap-xdot">Done</div>
                              </th>
                              <th style="width:60px;">
                                <div class="ap-xdot">Overdue</div>
                              </th>
                              <th style="width:60px;">
                                <div class="ap-xdot">In review</div>
                              </th>
                              <th style="width:80px;">&nbsp;</th>
                            </tr>
                          </thead>
                          <tbody id="js-report-projects">
                            <tr>
                              <td>
                                <div class="wrapper" style="height:40px;">
                                  <div class="obj">
                                    <div class="icon">
                                      <div
                                        class="-tavatar -bg-alt7"
                                        style="line-height: 32px; width: 32px; height: 32px"
                                      >
                                        <span class="-txt">5</span>
                                      </div>
                                    </div>
                                    <div
                                      class="name ap-xdot url"
                                      data-url="51-vtv-109643"
                                    >
                                      <span class="url"
                                        >20200120　フロントハウジング様門戸岡田町</span
                                      >
                                    </div>
                                    <div class="info ap-xdot">
                                      <span class="upper">project</span>
                                      · ... ⇾ ... ·
                                      フロントハウジング様門戸岡田町
                                    </div>
                                  </div>
                                </div>
                              </td>
                              <td><span class="count">94</span></td>
                              <td>
                                <span class="count" style="color:#14cc3f"
                                  >2</span
                                >
                              </td>
                              <td>
                                <span class="count" style="color:#f54e3b"
                                  >39</span
                                >
                              </td>
                              <td>
                                <span class="count" style="color:#751de0"
                                  >0</span
                                >
                              </td>
                              <td>
                                <div class="relative">
                                  <div class="mbar clear-fix -soft">
                                    <div
                                      class="b -infow"
                                      style="width:2.127659574468085%; background-color:#8fc79c;"
                                    >
                                      <span class="-infobox -up -w200"
                                        ><span class="-box block normal"
                                          >Done ontime: 2</span
                                        ></span
                                      >
                                    </div>
                                    <div
                                      class="b -infow"
                                      style="width:0%; background-color:#dbd491;"
                                    >
                                      <span class="-infobox -up -w200"
                                        ><span class="-box block normal"
                                          >Done late: 0</span
                                        ></span
                                      >
                                    </div>
                                    <div
                                      class="b -infow"
                                      style="width:41.48936170212766%; background-color:#d1837d;"
                                    >
                                      <span class="-infobox -up -w200"
                                        ><span class="-box block normal"
                                          >Overdue: 39</span
                                        ></span
                                      >
                                    </div>
                                    <div
                                      class="b -infow"
                                      style="width:56.38297872340426%; background-color:#a8d3f0;"
                                    >
                                      <span class="-infobox -up -w200"
                                        ><span class="-box block normal"
                                          >In progress: 53</span
                                        ></span
                                      >
                                    </div>
                                  </div>
                                </div>
                              </td>
                            </tr>

                            <tr>
                              <td>
                                <div class="wrapper" style="height:40px;">
                                  <div class="obj">
                                    <div class="icon">
                                      <div
                                        class="-tavatar -bg-alt7"
                                        style="line-height: 32px; width: 32px; height: 32px"
                                      >
                                        <span class="-txt">t</span>
                                      </div>
                                    </div>
                                    <div
                                      class="name ap-xdot url"
                                      data-url="thong-tin-khach-hang-110708"
                                    >
                                      <span class="url"
                                        >20200131 ĐẤT PHÂN LÔ
                                        川崎市多摩区長尾3丁目</span
                                      >
                                    </div>
                                    <div class="info ap-xdot">
                                      <span class="upper">project</span> · ... ⇾
                                      ... · 川崎市多摩区長尾3丁目
                                    </div>
                                  </div>
                                </div>
                              </td>
                              <td><span class="count">61</span></td>
                              <td>
                                <span class="count" style="color:#14cc3f"
                                  >0</span
                                >
                              </td>
                              <td>
                                <span class="count" style="color:#f54e3b"
                                  >0</span
                                >
                              </td>
                              <td>
                                <span class="count" style="color:#751de0"
                                  >0</span
                                >
                              </td>
                              <td>
                                <div class="relative">
                                  <div class="mbar clear-fix -soft">
                                    <div
                                      class="b -infow"
                                      style="width:0%; background-color:#8fc79c;"
                                    >
                                      <span class="-infobox -up -w200"
                                        ><span class="-box block normal"
                                          >Done ontime: 0</span
                                        ></span
                                      >
                                    </div>
                                    <div
                                      class="b -infow"
                                      style="width:0%; background-color:#dbd491;"
                                    >
                                      <span class="-infobox -up -w200"
                                        ><span class="-box block normal"
                                          >Done late: 0</span
                                        ></span
                                      >
                                    </div>
                                    <div
                                      class="b -infow"
                                      style="width:0%; background-color:#d1837d;"
                                    >
                                      <span class="-infobox -up -w200"
                                        ><span class="-box block normal"
                                          >Overdue: 0</span
                                        ></span
                                      >
                                    </div>
                                    <div
                                      class="b -infow"
                                      style="width:100%; background-color:#a8d3f0;"
                                    >
                                      <span class="-infobox -up -w200"
                                        ><span class="-box block normal"
                                          >In progress: 61</span
                                        ></span
                                      >
                                    </div>
                                  </div>
                                </div>
                              </td>
                            </tr>

                            <tr>
                              <td>
                                <div class="wrapper" style="height:40px;">
                                  <div class="obj">
                                    <div class="icon">
                                      <div
                                        class="-tavatar -bg-alt5"
                                        style="line-height: 32px; width: 32px; height: 32px"
                                      >
                                        <span class="-txt">d</span>
                                      </div>
                                    </div>
                                    <div
                                      class="name ap-xdot url"
                                      data-url="du-an-xay-dung-109924"
                                    >
                                      <span class="url"
                                        >20200131
                                        オージーエス様モデルハウス</span
                                      >
                                    </div>
                                    <div class="info ap-xdot">
                                      <span class="upper">project</span>
                                      · ... ⇾ ... · オージーエス様モデルハウス
                                    </div>
                                  </div>
                                </div>
                              </td>
                              <td><span class="count">41</span></td>
                              <td>
                                <span class="count" style="color:#14cc3f"
                                  >29</span
                                >
                              </td>
                              <td>
                                <span class="count" style="color:#f54e3b"
                                  >9</span
                                >
                              </td>
                              <td>
                                <span class="count" style="color:#751de0"
                                  >0</span
                                >
                              </td>
                              <td>
                                <div class="relative">
                                  <div class="mbar clear-fix -soft">
                                    <div
                                      class="b -infow"
                                      style="width:53.65853658536585%; background-color:#8fc79c;"
                                    >
                                      <span class="-infobox -up -w200"
                                        ><span class="-box block normal"
                                          >Done ontime: 22</span
                                        ></span
                                      >
                                    </div>
                                    <div
                                      class="b -infow"
                                      style="width:17.073170731707318%; background-color:#dbd491;"
                                    >
                                      <span class="-infobox -up -w200"
                                        ><span class="-box block normal"
                                          >Done late: 7</span
                                        ></span
                                      >
                                    </div>
                                    <div
                                      class="b -infow"
                                      style="width:21.951219512195124%; background-color:#d1837d;"
                                    >
                                      <span class="-infobox -up -w200"
                                        ><span class="-box block normal"
                                          >Overdue: 9</span
                                        ></span
                                      >
                                    </div>
                                    <div
                                      class="b -infow"
                                      style="width:7.317073170731708%; background-color:#a8d3f0;"
                                    >
                                      <span class="-infobox -up -w200"
                                        ><span class="-box block normal"
                                          >In progress: 3</span
                                        ></span
                                      >
                                    </div>
                                  </div>
                                </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="s" style="padding-bottom:66.66666666666667%"></div>
              </div>

              <div class="box std" data-col="4,2" style="width: 40%;">
                <div class="inner">
                  <div class="header">
                    Báo cáo tổng hợp dự án
                    <div class="side"></div>
                  </div>
                  <div class="body -fit" id="js-project-status">
                    <div class="split-view">
                      <div
                        class="graph"
                        id="js-project-state-graph"
                        data-highcharts-chart="4"
                        style="overflow: hidden;"
                      >
                        <div
                          id="highcharts-z3dbuhk-220"
                          dir="ltr"
                          class="highcharts-container "
                          style="position: relative; overflow: hidden; width: 160px; height: 160px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"
                        >
                          <svg
                            version="1.1"
                            class="highcharts-root"
                            style='font-family:"Lucida Grande", "Lucida Sans Unicode", Arial, Helvetica, sans-serif;font-size:12px;'
                            xmlns="http://www.w3.org/2000/svg"
                            width="160"
                            height="160"
                            viewBox="0 0 160 160"
                          >
                            <desc>Created with Highcharts 7.2.1</desc>
                            <defs>
                              <clipPath id="highcharts-z3dbuhk-227-">
                                <rect
                                  x="0"
                                  y="0"
                                  width="140"
                                  height="135"
                                  fill="none"
                                ></rect>
                              </clipPath>
                            </defs>
                            <rect
                              fill="rgba(255, 255, 255, 0.0)"
                              class="highcharts-background"
                              x="0"
                              y="0"
                              width="160"
                              height="160"
                              rx="0"
                              ry="0"
                            ></rect>
                            <rect
                              fill="none"
                              class="highcharts-plot-background"
                              x="10"
                              y="10"
                              width="140"
                              height="135"
                            ></rect>
                            <rect
                              fill="none"
                              class="highcharts-plot-border"
                              data-z-index="1"
                              x="10"
                              y="10"
                              width="140"
                              height="135"
                            ></rect>
                            <g class="highcharts-series-group" data-z-index="3">
                              <g
                                data-z-index="0.1"
                                class="highcharts-series highcharts-series-0 highcharts-pie-series highcharts-tracker"
                                transform="translate(10,10) scale(1 1)"
                                style="cursor:pointer;"
                              >
                                <path
                                  fill="#1fb53a"
                                  d="M 69.98828879078752 10.00000119262976 A 57.5 57.5 0 1 1 49.454524161200105 13.795871457053792 L 53.56361932896009 24.536697165643034 A 46 46 0 1 0 69.99063103263002 21.50000095410381 Z"
                                  transform="translate(0,0)"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  stroke-linejoin="round"
                                  class="highcharts-point highcharts-color-0"
                                ></path>
                                <path
                                  fill="#edcb21"
                                  d="M 49.50823855352944 13.77535283670126 A 57.5 57.5 0 0 1 49.454524161200105 13.795871457053792 L 53.56361932896009 24.536697165643034 A 46 46 0 0 0 53.60659084282355 24.52028226936101 Z"
                                  transform="translate(0,0)"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  stroke-linejoin="round"
                                  class="highcharts-point highcharts-color-1"
                                ></path>
                                <path
                                  fill="#c92e2e"
                                  d="M 49.50823855352944 13.77535283670126 A 57.5 57.5 0 0 1 54.419867526370155 12.151021038287034 L 57.53589402109613 23.22081683062963 A 46 46 0 0 0 53.60659084282355 24.52028226936101 Z"
                                  transform="translate(0,0)"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  stroke-linejoin="round"
                                  class="highcharts-point highcharts-color-2"
                                ></path>
                                <path
                                  fill="#14cc3f"
                                  d="M 54.47522428617265 12.13546858289726 A 57.5 57.5 0 0 1 69.92013365356088 10.000055466403218 L 69.93610692284871 21.50004437312257 A 46 46 0 0 0 57.580179428938116 23.20837486631781 Z"
                                  transform="translate(0,0)"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  stroke-linejoin="round"
                                  class="highcharts-point highcharts-color-3"
                                ></path>
                                <path
                                  fill="#4f2d2d"
                                  d="M 69.97763362844435 10.000004350039958 A 57.5 57.5 0 0 1 69.92013365356088 10.000055466403218 L 69.93610692284871 21.50004437312257 A 46 46 0 0 0 69.98210690275548 21.500003480031964 Z"
                                  transform="translate(0,0)"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  stroke-linejoin="round"
                                  class="highcharts-point highcharts-color-4"
                                ></path>
                                <path
                                  fill="#a1a1a1"
                                  d="M 69.97763362844435 10.000004350039958 A 57.5 57.5 0 0 1 69.92013365356088 10.000055466403218 L 69.93610692284871 21.50004437312257 A 46 46 0 0 0 69.98210690275548 21.500003480031964 Z"
                                  transform="translate(0,0)"
                                  stroke="#ffffff"
                                  stroke-width="1"
                                  opacity="1"
                                  stroke-linejoin="round"
                                  class="highcharts-point highcharts-color-5"
                                ></path>
                              </g>
                              <g
                                data-z-index="0.1"
                                class="highcharts-markers highcharts-series-0 highcharts-pie-series"
                                transform="translate(10,10) scale(1 1)"
                              ></g>
                            </g>
                            <text
                              x="80"
                              text-anchor="middle"
                              class="highcharts-title"
                              data-z-index="4"
                              style="color:#333333;font-size:13px;font-weight:normal;fill:#333333;"
                              y="88"
                            ></text>
                            <text
                              x="80"
                              text-anchor="middle"
                              class="highcharts-subtitle"
                              data-z-index="4"
                              style="color:#666666;fill:#666666;"
                              y="24"
                            ></text>
                            <text
                              x="10"
                              text-anchor="start"
                              class="highcharts-caption"
                              data-z-index="4"
                              style="color:#666666;fill:#666666;"
                              y="157"
                            ></text>
                          </svg>
                        </div>
                      </div>
                      <div class="main">
                        <div class="title">
                          <b class="js-count" data-key="real_projects">70</b>
                          projects
                        </div>
                        <div class="legends">
                          <div class="legend">
                            <div
                              class="circle"
                              style="background-color:#1fb53a"
                            ></div>
                            65 on track
                          </div>
                          <div class="legend">
                            <div
                              class="circle"
                              style="background-color:#edcb21"
                            ></div>
                            0 off track
                          </div>
                          <div class="legend">
                            <div
                              class="circle"
                              style="background-color:#c92e2e"
                            ></div>
                            1 at risk
                          </div>
                          <div class="legend">
                            <div
                              class="circle"
                              style="background-color:#14cc3f"
                            ></div>
                            3 closed &amp; successful
                          </div>
                          <div class="legend">
                            <div
                              class="circle"
                              style="background-color:#4f2d2d"
                            ></div>
                            0 closed &amp; failed
                          </div>
                          <div class="legend">
                            <div
                              class="circle"
                              style="background-color:#a1a1a1"
                            ></div>
                            0 closed &amp; cancel
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="s" style="padding-bottom:50%"></div>
              </div>

              <div class="box std" data-col="4,2" style="width: 40%;">
                <div class="inner">
                  <div class="header">
                    Báo cáo các teams
                    <div class="side"></div>
                  </div>
                  <div class="body -fit" id="js-team-report">
                    <div class="grid-stats">
                      <div class="stat" style="height:auto;">
                        <div class="v js-count" data-key="real_teams_active">
                          25
                        </div>
                        <div class="sub -upper">active teams</div>
                        <span class="sub"
                          ><b
                            class="js-count text-8"
                            data-key="real_teams_closed"
                            >1</b
                          >
                          teams are closed</span
                        >
                      </div>
                      <div class="stat" style="height:auto;">
                        <div class="v js-count" data-key="tasks_team">258</div>
                        <div class="sub -upper">tasks in teams</div>
                        <span class="sub"
                          ><b
                            class="js-count text-success"
                            data-key="tasks_team_done"
                            >58</b
                          >
                          done ·
                          <b
                            class="js-count text-error"
                            data-key="tasks_team_overdue"
                            >112</b
                          >
                          overdue</span
                        >
                      </div>
                    </div>
                  </div>
                </div>
                <div class="s" style="padding-bottom:50%"></div>
              </div>
            </div>
          </div>
        </div>
        <div id="floatview" style="display: none;"></div>
        <div id="__ctm" style="display: none;">
          <div id="__ctmi" class="__contextmenu"></div>
        </div>
        <!--end bao cao-->
      </div>
      <!--end noi dung body-->
    </div>
  </div>
</template>

<script>
export default {
  name: 'reports'
}
</script>

<style>

</style>
