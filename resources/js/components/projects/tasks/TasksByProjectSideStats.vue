<template>
  <div class="section js-project-stats" v-if="project">
    <div id="js-side-stats">
      <div class="box">
        <div class="box-title">Thông tin chung</div>
        <div class="graph-canvas">
          <pie-chart :data="chartData" :options="chartOptions" class="graph" />
          <div class="stats">
            <div class="stat">
              <span class="s" style="background-color:#14CC3F"></span>
              <em>{{ project.stats.completed_ontime }}</em> HT đúng hạn
            </div>
            <div class="stat">
              <span class="s" style="background-color:#F7E015"></span>
              <em>{{ project.stats.completed_late}}</em> HT muộn
            </div>
            <div class="stat">
              <span class="s" style="background-color:#F54E3B"></span>
              <em>{{ project.stats.overdue }}</em> quá hạn
            </div>
            <div class="stat">
              <span class="s" style="background-color:#389DD9"></span>
              <em>{{ project.stats.processing }}</em> đang thực hiện
            </div>
          </div>
        </div>
        <div class="projstats" style="display:none">
          <div class="mstats">
            <div class="stat">
              <em>9</em> công việc
            </div>
            <div class="stat">
              <em>
                55.56
                <span>%</span>
              </em>
              đã hoàn thành
            </div>
          </div>
          <div class="bar -infow">
            <div class="c" style="background-color: #49E33B; width:55.56%"></div>
          </div>
        </div>
      </div>
      <div class="box burndown" style="height:200px; display:none" id="js-project-burndown"></div>
      <div class="subsection">
        <div class="subheader">
          <div class="icon">
            <span class="ficon-exclamation-circle red"></span>
          </div>
          <div class="title url -dd" data-url=":active:parent:parent">Quá hạn gần đây</div>
          <div class="side">
            <span class="count">1</span>
          </div>
        </div>
        <div class="body" id="js-side-project-overdues">
          <div class="task-elist">
            <div class="itask url" data-url="task/2487874" style="padding-right: 50px;">
              <div class="sicon -doing"></div>
              <div class="iname">
                triển khai thực hiện Nghị định số 10/2020/NĐ-CP ngày 17/01/2020
                của chính phủ qu...
              </div>
              <div class="iside clear-fix">
                <div class="tlabel -red">overdue</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="subsection">
        <div class="subheader">
          <div class="icon">
            <span class="ficon-dot-circle-o -text-orange"></span>
          </div>
          <div class="title url -dd" data-url=":active:parent:parent">Chưa bắt đầu</div>
          <div class="side">
            <span class="count">2</span>
          </div>
        </div>
        <div class="body" id="js-side-project-todos">
          <div class="task-elist">
            <div class="itask url" data-url="task/2487871" style="padding-right: 65px;">
              <div class="sicon -todo"></div>
              <div class="iname">
                V/v ứng dụng phần mềm quản lý trật tự xây dựng trên địa bàn
                thành phố
              </div>
              <div class="iside clear-fix">
                <div class="tlabel">28/05/2020</div>
              </div>
            </div>
            <div class="itask url" data-url="task/2487866" style="padding-right: 65px;">
              <div class="sicon -todo"></div>
              <div class="iname">
                V/v tham gia ý kiến vào dự thảo Chương trình công tác của Ban
                Chỉ đạo xây dựng c...
              </div>
              <div class="iside clear-fix">
                <div class="tlabel">24/06/2020</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="subsection">
        <div class="subheader">
          <div class="icon">
            <span class="ficon-filter"></span>
          </div>
          <div class="title url -dd" data-url=":active:parent:parent">Thống kê theo thành viên</div>
        </div>
        <div class="body">
          <div class="ustats">
            <div class="user">
              <div class="name">
                <div class="avatar">
                  <img
                    src="https://data-gcdn.basecdn.net/avatar/sys121/3c/08/23/9d/ea/f996f17fe7bf255b2ae29f8885499fb3/0.hieuct967_121.jpg"
                  />
                </div>
                <div class="uname">Trung Hiếu</div>
                <div class="uinfo ap-xdot">Chuyên viên thiết kế</div>
              </div>
              <div class="stat">
                <div class="label">
                  <em>0</em>/
                  <em>1</em>
                </div>
                <div class="bar">
                  <div class="c" style="background-color:#49E33B; width: 0%" title="HT đúng hạn: 0"></div>
                  <div class="c" style="background-color:#CEED5F; width: 0%" title="HT muộn: 0"></div>
                  <div
                    class="c"
                    style="background-color:#EB6450; width: NaN%"
                    title="Quá hạn: undefined"
                  ></div>
                </div>
              </div>
            </div>
            <div class="user">
              <div class="name">
                <div class="avatar">
                  <img
                    src="https://data-gcdn.basecdn.net/avatar/sys121/64/6b/1c/8b/f4/c406e7dca53bc27a0676e22ecf912de3/0.thuytrang_121.jpg"
                  />
                </div>
                <div class="uname">Thùy Trang</div>
                <div class="uinfo ap-xdot">CMO</div>
              </div>
              <div class="stat">
                <div class="label">
                  <em>1</em>/
                  <em>1</em>
                </div>
                <div class="bar">
                  <div
                    class="c"
                    style="background-color:#49E33B; width: 100%"
                    title="HT đúng hạn: 1"
                  ></div>
                  <div class="c" style="background-color:#CEED5F; width: 0%" title="HT muộn: 0"></div>
                  <div
                    class="c"
                    style="background-color:#EB6450; width: NaN%"
                    title="Quá hạn: undefined"
                  ></div>
                </div>
              </div>
            </div>
            <div class="user">
              <div class="name">
                <div class="avatar">
                  <img
                    src="https://data-gcdn.basecdn.net/avatar/sys121/50/e9/ce/91/8a/8d0b1c6fd7798fb006db54268bde2abe/0.haikd_121.jpg"
                  />
                </div>
                <div class="uname">Nguyễn Hải</div>
                <div class="uinfo ap-xdot"></div>
              </div>
              <div class="stat">
                <div class="label">
                  <em>0</em>/
                  <em>1</em>
                </div>
                <div class="bar">
                  <div class="c" style="background-color:#49E33B; width: 0%" title="HT đúng hạn: 0"></div>
                  <div class="c" style="background-color:#CEED5F; width: 0%" title="HT muộn: 0"></div>
                  <div
                    class="c"
                    style="background-color:#EB6450; width: NaN%"
                    title="Quá hạn: undefined"
                  ></div>
                </div>
              </div>
            </div>
            <div class="user">
              <div class="name">
                <div class="avatar">
                  <img
                    src="https://data-gcdn.basecdn.net/avatar/sys121/04/4a/27/63/92/7ec662785130da3b626a68e92679fe98/0.chivu_121.jpg"
                  />
                </div>
                <div class="uname">Vũ Yến Chi</div>
                <div class="uinfo ap-xdot"></div>
              </div>
              <div class="stat">
                <div class="label">
                  <em>1</em>/
                  <em>1</em>
                </div>
                <div class="bar">
                  <div
                    class="c"
                    style="background-color:#49E33B; width: 100%"
                    title="HT đúng hạn: 1"
                  ></div>
                  <div class="c" style="background-color:#CEED5F; width: 0%" title="HT muộn: 0"></div>
                  <div
                    class="c"
                    style="background-color:#EB6450; width: NaN%"
                    title="Quá hạn: undefined"
                  ></div>
                </div>
              </div>
            </div>
            <div class="user">
              <div class="name">
                <div class="avatar">
                  <img
                    src="https://data-gcdn.basecdn.net/avatar/sys121/52/69/db/ce/6c/08dbe69661af1dfb8626fa4683c0304f/0.linhngo_121.jpg"
                  />
                </div>
                <div class="uname">Ngô Khánh Linh</div>
                <div class="uinfo ap-xdot"></div>
              </div>
              <div class="stat">
                <div class="label">
                  <em>0</em>/
                  <em>1</em>
                </div>
                <div class="bar">
                  <div class="c" style="background-color:#49E33B; width: 0%" title="HT đúng hạn: 0"></div>
                  <div class="c" style="background-color:#CEED5F; width: 0%" title="HT muộn: 0"></div>
                  <div
                    class="c"
                    style="background-color:#EB6450; width: NaN%"
                    title="Quá hạn: undefined"
                  ></div>
                </div>
              </div>
            </div>
            <div class="user">
              <div class="name">
                <div class="avatar">
                  <img
                    src="https://data-gcdn.basecdn.net/avatar/sys121/3e/6f/9f/53/b8/77ac043c7c9e89fd3c63bac9bc49debb/0.anhtaotuan_121.jpg"
                  />
                </div>
                <div class="uname">Tào Tuấn Anh</div>
                <div class="uinfo ap-xdot">Quản lí</div>
              </div>
              <div class="stat">
                <div class="label">
                  <em>1</em>/
                  <em>1</em>
                </div>
                <div class="bar">
                  <div
                    class="c"
                    style="background-color:#49E33B; width: 100%"
                    title="HT đúng hạn: 1"
                  ></div>
                  <div class="c" style="background-color:#CEED5F; width: 0%" title="HT muộn: 0"></div>
                  <div
                    class="c"
                    style="background-color:#EB6450; width: NaN%"
                    title="Quá hạn: undefined"
                  ></div>
                </div>
              </div>
            </div>
            <div class="user">
              <div class="name">
                <div class="avatar">
                  <img
                    src="https://data-gcdn.basecdn.net/avatar/sys121/eb/44/3c/ad/96/c82698fd1b4c14ddde3e2c676d18e314/0.huyennt54ftu_121.jpg"
                  />
                </div>
                <div class="uname">Nguyễn Huyền</div>
                <div class="uinfo ap-xdot">COO</div>
              </div>
              <div class="stat">
                <div class="label">
                  <em>1</em>/
                  <em>1</em>
                </div>
                <div class="bar">
                  <div class="c" style="background-color:#49E33B; width: 0%" title="HT đúng hạn: 0"></div>
                  <div class="c" style="background-color:#CEED5F; width: 100%" title="HT muộn: 1"></div>
                  <div
                    class="c"
                    style="background-color:#EB6450; width: NaN%"
                    title="Quá hạn: undefined"
                  ></div>
                </div>
              </div>
            </div>
            <div class="user">
              <div class="name">
                <div class="avatar">
                  <img
                    src="https://data-gcdn.basecdn.net/avatar/sys121/d4/a6/12/a6/91/8208ff221b7a78ca51b0ec4fe632c89f/0.giangle_121.jpg"
                  />
                </div>
                <div class="uname">Lê Giang</div>
                <div class="uinfo ap-xdot">Business Consultant</div>
              </div>
              <div class="stat">
                <div class="label">
                  <em>1</em>/
                  <em>1</em>
                </div>
                <div class="bar">
                  <div
                    class="c"
                    style="background-color:#49E33B; width: 100%"
                    title="HT đúng hạn: 1"
                  ></div>
                  <div class="c" style="background-color:#CEED5F; width: 0%" title="HT muộn: 0"></div>
                  <div
                    class="c"
                    style="background-color:#EB6450; width: NaN%"
                    title="Quá hạn: undefined"
                  ></div>
                </div>
              </div>
            </div>
            <div class="user">
              <div class="name">
                <div class="avatar">
                  <img
                    src="https://data-gcdn.basecdn.net/avatar/sys121/2a/94/0b/c7/85/eea34abe105e1ea035b362da68c66cbb/0.vanny_121.jpg"
                  />
                </div>
                <div class="uname">Nguyễn Yến Vân</div>
                <div class="uinfo ap-xdot"></div>
              </div>
              <div class="stat">
                <div class="label">
                  <em>0</em>/
                  <em>1</em>
                </div>
                <div class="bar">
                  <div class="c" style="background-color:#49E33B; width: 0%" title="HT đúng hạn: 0"></div>
                  <div class="c" style="background-color:#CEED5F; width: 0%" title="HT muộn: 0"></div>
                  <div
                    class="c"
                    style="background-color:#EB6450; width: NaN%"
                    title="Quá hạn: undefined"
                  ></div>
                </div>
              </div>
            </div>
            <div class="user">
              <div class="name">
                <div class="avatar">
                  <span class="-ap icon-uniF1AB"></span>
                </div>
                <div class="uname">Unassigned</div>
                <div class="uinfo">0 tasks</div>
              </div>
              <div class="stat">
                <div class="label">
                  <em>0</em>/
                  <em>0</em>
                </div>
                <div class="bar">
                  <div
                    class="c"
                    style="background-color:#49E33B; width: undefined%"
                    title="HT đúng hạn: 0"
                  ></div>
                  <div
                    class="c"
                    style="background-color:#CEED5F; width: undefined%"
                    title="HT muộn: 0"
                  ></div>
                  <div class="c" style="background-color:#EB6450; width: 0%" title="Quá hạn: 0"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import PieChart from "../../common/PieChart";
export default {
  name: "tasks-by-project-side-stats",
  props: {
    project: { type: Object, default: null }
  },
  computed: {
    chartOptions() {
      return {
        hoverBorderWidth: 10,
        responsive: true,
        legend: {
          display: false
        },
        layout: {
          padding: 20
        }
      };
    },
    chartData() {
      console.log("aaaaaa", this.project.stats);

      return {
        hoverBackgroundColor: "red",
        hoverBorderWidth: 10,
        labels: ["HT đúng hạn", "HT muộn", "quá hạn", "đang thực hiện"],
        datasets: [
          {
            backgroundColor: ["#14CC3F", "#F7E015", "#F54E3B", "#389DD9"],
            data: [
              this.project.stats.completed_ontime,
              this.project.stats.completed_late,
              this.project.stats.overdue,
              this.project.stats.processing
            ],
            borderWidth: 1
          }
        ]
      };
    }
  },
  components: {
    PieChart
  }
};
</script>

<style></style>
