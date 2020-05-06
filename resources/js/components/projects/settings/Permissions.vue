<template>
  <div id="page" class>
    <tasks-by-project-header :project="project" />

    <div id="project-master" class="simple scroll-y forced-scroll">
      <div class="canvas relative">
       <settings-menu :project="project" />

        <div id="setting">
          <div id="acl">
            <div class="title">Phân quyền sử dụng theo loại tài khoản</div>

            <div class="table" id="js-priv-project">
              <table>
                <tr class="acl-header">
                  <th>Phân quyền</th>
                  <th style="width:110px">Quản lý</th>
                  <th style="width:110px">Thành viên</th>
                  <th style="width:110px">Khách</th>
                </tr>
                <tr class="field" data-name="task.create">
                  <td class="role">
                    <div class="role-name">Tạo công việc mới</div>
                    <div class="role-info">Quyền tạo công việc mới</div>
                  </td>
                  <td>
                    <div
                      class="status -on js-acl-atom locked"
                      data-key="acl"
                      data-role="owner"
                      data-priv="task.create"
                    ></div>
                  </td>
                  <td>
                    <div
                      class="status -off js-acl-atom"
                      data-key="acl"
                      data-role="follower"
                      data-priv="task.create"
                    ></div>
                  </td>
                  <td>
                    <div
                      class="status -off js-acl-atom"
                      data-key="acl"
                      data-role="guest"
                      data-priv="task.create"
                    ></div>
                  </td>
                </tr>
                <tr class="field" data-name="tasklist.create">
                  <td class="role">
                    <div class="role-name">Tạo nhóm công việc mới</div>
                    <div class="role-info">Quyền tạo nhóm công việc mới</div>
                  </td>
                  <td>
                    <div
                      class="status -on js-acl-atom locked"
                      data-key="acl"
                      data-role="owner"
                      data-priv="tasklist.create"
                    ></div>
                  </td>
                  <td>
                    <div
                      class="status -off js-acl-atom"
                      data-key="acl"
                      data-role="follower"
                      data-priv="tasklist.create"
                    ></div>
                  </td>
                  <td>
                    <div
                      class="status -off js-acl-atom"
                      data-key="acl"
                      data-role="guest"
                      data-priv="tasklist.create"
                    ></div>
                  </td>
                </tr>
                <tr class="field" data-name="task.view.other">
                  <td class="role">
                    <div class="role-name">Xem công việc của người khác</div>
                    <div class="role-info">Xem công việc giao cho-tạo bởi người khác</div>
                  </td>
                  <td>
                    <div
                      class="status -on js-acl-atom locked"
                      data-key="acl"
                      data-role="owner"
                      data-priv="task.view.other"
                    ></div>
                  </td>
                  <td>
                    <div
                      class="status -off js-acl-atom"
                      data-key="acl"
                      data-role="follower"
                      data-priv="task.view.other"
                    ></div>
                  </td>
                  <td>
                    <div
                      class="status -off js-acl-atom"
                      data-key="acl"
                      data-role="guest"
                      data-priv="task.view.other"
                    ></div>
                  </td>
                </tr>
                <tr class="field" data-name="unassign">
                  <td class="role">
                    <div class="role-name">Quyền xem - giao công việc cho người khác</div>
                    <div class="role-info">Quyền xem các công việc và giao cho người khác</div>
                  </td>
                  <td>
                    <div
                      class="status -on js-acl-atom locked"
                      data-key="acl"
                      data-role="owner"
                      data-priv="unassign"
                    ></div>
                  </td>
                  <td>
                    <div
                      class="status -on js-acl-atom"
                      data-key="acl"
                      data-role="follower"
                      data-priv="unassign"
                    ></div>
                  </td>
                  <td>
                    <div
                      class="status -off js-acl-atom"
                      data-key="acl"
                      data-role="guest"
                      data-priv="unassign"
                    ></div>
                  </td>
                </tr>
                <tr class="field" data-name="report">
                  <td class="role">
                    <div class="role-name">Quyền xem báo cáo tổng thể</div>
                    <div class="role-info">Quyền xem báo cáo tổng hợp kết quả công việc</div>
                  </td>
                  <td>
                    <div
                      class="status -on js-acl-atom locked"
                      data-key="acl"
                      data-role="owner"
                      data-priv="report"
                    ></div>
                  </td>
                  <td>
                    <div
                      class="status -on js-acl-atom"
                      data-key="acl"
                      data-role="follower"
                      data-priv="report"
                    ></div>
                  </td>
                  <td>
                    <div
                      class="status -on js-acl-atom"
                      data-key="acl"
                      data-role="guest"
                      data-priv="report"
                    ></div>
                  </td>
                </tr>
                <tr class="field" data-name="topic.create">
                  <td class="role">
                    <div class="role-name">Quyền tạo thảo luận mới</div>
                    <div class="role-info">Tạo thảo luận và bình luận trong các thảo luận</div>
                  </td>
                  <td>
                    <div
                      class="status -on js-acl-atom locked"
                      data-key="acl"
                      data-role="owner"
                      data-priv="topic.create"
                    ></div>
                  </td>
                  <td>
                    <div
                      class="status -on js-acl-atom"
                      data-key="acl"
                      data-role="follower"
                      data-priv="topic.create"
                    ></div>
                  </td>
                  <td>
                    <div
                      class="status -off js-acl-atom"
                      data-key="acl"
                      data-role="guest"
                      data-priv="topic.create"
                    ></div>
                  </td>
                </tr>
                <tr class="field" data-name="file.create">
                  <td class="role">
                    <div class="role-name">Quyền tạo tài liệu mới</div>
                    <div class="role-info">Upload tài liệu và bình luận trong các tài liệu</div>
                  </td>
                  <td>
                    <div
                      class="status -on js-acl-atom locked"
                      data-key="acl"
                      data-role="owner"
                      data-priv="file.create"
                    ></div>
                  </td>
                  <td>
                    <div
                      class="status -on js-acl-atom"
                      data-key="acl"
                      data-role="follower"
                      data-priv="file.create"
                    ></div>
                  </td>
                  <td>
                    <div
                      class="status -off js-acl-atom"
                      data-key="acl"
                      data-role="guest"
                      data-priv="file.create"
                    ></div>
                  </td>
                </tr>
              </table>
            </div>

            <div class="sep-30"></div>
            <div class="sep-30"></div>

            <div class="title">Phân quyền chỉnh sửa - cập nhật công việc</div>

            <div class="table" id="js-priv-task">
              <table>
                <tr class="acl-header">
                  <th>Phân quyền</th>
                  <th style="width:110px">Người giao-nhận việc</th>
                  <th style="width:110px">Người theo dõi</th>
                  <th style="width:110px">Khác</th>
                </tr>
                <tr class="field" data-name="name">
                  <td class="role">
                    <div class="role-name">Chỉnh sửa tên công việc</div>
                    <div class="role-info">Quyền chỉnh sửa tên công việc trong hệ thống</div>
                  </td>
                  <td>
                    <div
                      class="status -on js-acl-atom locked"
                      data-key="task_acl"
                      data-role="owner"
                      data-priv="name"
                    ></div>
                  </td>
                  <td>
                    <div
                      class="status -off js-acl-atom"
                      data-key="task_acl"
                      data-role="follower"
                      data-priv="name"
                    ></div>
                  </td>
                  <td>
                    <div
                      class="status -off js-acl-atom"
                      data-key="task_acl"
                      data-role="other"
                      data-priv="name"
                    ></div>
                  </td>
                </tr>
                <tr class="field" data-name="status">
                  <td class="role">
                    <div class="role-name">Quyền mark done-undone</div>
                    <div class="role-info">Quyền đánh dấu hoàn thành công việc</div>
                  </td>
                  <td>
                    <div
                      class="status -on js-acl-atom locked"
                      data-key="task_acl"
                      data-role="owner"
                      data-priv="status"
                    ></div>
                  </td>
                  <td>
                    <div
                      class="status -off js-acl-atom"
                      data-key="task_acl"
                      data-role="follower"
                      data-priv="status"
                    ></div>
                  </td>
                  <td>
                    <div
                      class="status -off js-acl-atom"
                      data-key="task_acl"
                      data-role="other"
                      data-priv="status"
                    ></div>
                  </td>
                </tr>
                <tr class="field" data-name="desc">
                  <td class="role">
                    <div class="role-name">Chỉnh sửa miêu tả công việc</div>
                    <div class="role-info">Quyền chỉnh sửa miêu tả công việc</div>
                  </td>
                  <td>
                    <div
                      class="status -on js-acl-atom locked"
                      data-key="task_acl"
                      data-role="owner"
                      data-priv="desc"
                    ></div>
                  </td>
                  <td>
                    <div
                      class="status -off js-acl-atom"
                      data-key="task_acl"
                      data-role="follower"
                      data-priv="desc"
                    ></div>
                  </td>
                  <td>
                    <div
                      class="status -off js-acl-atom"
                      data-key="task_acl"
                      data-role="other"
                      data-priv="desc"
                    ></div>
                  </td>
                </tr>
                <tr class="field" data-name="time">
                  <td class="role">
                    <div class="role-name">Chỉnh sửa thời gian (start-date-deadline)</div>
                    <div
                      class="role-info"
                    >Chỉnh sửa thời gian bắt đầu-kết thúc (start date-deadline)</div>
                  </td>
                  <td>
                    <div
                      class="status -on js-acl-atom locked"
                      data-key="task_acl"
                      data-role="owner"
                      data-priv="time"
                    ></div>
                  </td>
                  <td>
                    <div
                      class="status -off js-acl-atom"
                      data-key="task_acl"
                      data-role="follower"
                      data-priv="time"
                    ></div>
                  </td>
                  <td>
                    <div
                      class="status -off js-acl-atom"
                      data-key="task_acl"
                      data-role="other"
                      data-priv="time"
                    ></div>
                  </td>
                </tr>
                <tr class="field" data-name="result">
                  <td class="role">
                    <div class="role-name">Quyền cập nhật kết quả công việc</div>
                    <div class="role-info">Cập nhật kết quả công việc</div>
                  </td>
                  <td>
                    <div
                      class="status -on js-acl-atom locked"
                      data-key="task_acl"
                      data-role="owner"
                      data-priv="result"
                    ></div>
                  </td>
                  <td>
                    <div
                      class="status -on js-acl-atom"
                      data-key="task_acl"
                      data-role="follower"
                      data-priv="result"
                    ></div>
                  </td>
                  <td>
                    <div
                      class="status -off js-acl-atom"
                      data-key="task_acl"
                      data-role="other"
                      data-priv="result"
                    ></div>
                  </td>
                </tr>
                <tr class="field" data-name="checklist">
                  <td class="role">
                    <div class="role-name">Quyền tạo và cập nhật checklist</div>
                    <div class="role-info">Quyền tạo và cập nhật checklists</div>
                  </td>
                  <td>
                    <div
                      class="status -on js-acl-atom locked"
                      data-key="task_acl"
                      data-role="owner"
                      data-priv="checklist"
                    ></div>
                  </td>
                  <td>
                    <div
                      class="status -on js-acl-atom"
                      data-key="task_acl"
                      data-role="follower"
                      data-priv="checklist"
                    ></div>
                  </td>
                  <td>
                    <div
                      class="status -off js-acl-atom"
                      data-key="task_acl"
                      data-role="other"
                      data-priv="checklist"
                    ></div>
                  </td>
                </tr>
                <tr class="field" data-name="remove">
                  <td class="role">
                    <div class="role-name">Quyền xóa công việc</div>
                    <div class="role-info">Quyền xóa toàn bộ dữ liệu của công việc đã tạo</div>
                  </td>
                  <td>
                    <div
                      class="status -on js-acl-atom locked"
                      data-key="task_acl"
                      data-role="owner"
                      data-priv="remove"
                    ></div>
                  </td>
                  <td>
                    <div
                      class="status -off js-acl-atom"
                      data-key="task_acl"
                      data-role="follower"
                      data-priv="remove"
                    ></div>
                  </td>
                  <td>
                    <div
                      class="status -off js-acl-atom"
                      data-key="task_acl"
                      data-role="other"
                      data-priv="remove"
                    ></div>
                  </td>
                </tr>
                <tr class="field" data-name="delegate">
                  <td class="role">
                    <div class="role-name">Quyền chuyển công việc cho người khác</div>
                    <div class="role-info">Quyền giao lại công việc cho người khác</div>
                  </td>
                  <td>
                    <div
                      class="status -on js-acl-atom locked"
                      data-key="task_acl"
                      data-role="owner"
                      data-priv="delegate"
                    ></div>
                  </td>
                  <td>
                    <div
                      class="status -off js-acl-atom"
                      data-key="task_acl"
                      data-role="follower"
                      data-priv="delegate"
                    ></div>
                  </td>
                  <td>
                    <div
                      class="status -off js-acl-atom"
                      data-key="task_acl"
                      data-role="other"
                      data-priv="delegate"
                    ></div>
                  </td>
                </tr>
              </table>
            </div>

            <div class="sep-30"></div>
            <div id="js-proj-settings-2" style="margin:0 -30px">
              <div class="setting-box">
                <div class="title">Giới hạn đặc biệt đối với người được giao việc</div>
                <div class="js-setting-body values">
                  <div class="st-opt-wrapper" id="_uuid52436_28344_1588747474">
                    <div
                      class="st-opt selected"
                      data-url="du-an-ttvn-list-97198/api/settings/pref"
                      data-cvalue="yes"
                      data-name="block_task_edit"
                    >
                      Không cho phép người được giao việc chỉnh sửa
                      công việc?
                    </div>
                  </div>
                  <div class="st-opt-wrapper" id="_uuid37705_86751_1588747474">
                    <div
                      class="st-opt selected"
                      data-url="du-an-ttvn-list-97198/api/settings/pref"
                      data-cvalue="yes"
                      data-name="block_task_time"
                    >
                      Không cho phép người được giao việc chỉnh sửa
                      deadline?
                    </div>
                  </div>
                  <div class="st-opt-wrapper" id="_uuid71289_86826_1588747474">
                    <div
                      class="st-opt selected"
                      data-url="du-an-ttvn-list-97198/api/settings/pref"
                      data-cvalue="yes"
                      data-name="block_task_remove"
                    >
                      Không cho phép người được giao việc xóa công
                      việc hoặc chuyển giao cho người khác?
                    </div>
                  </div>
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
import TasksByProjectHeader from "../tasks/TasksByProjectHeader";
import SettingsMenu from './SettingsMenu'
import { mapActions, mapState } from "vuex";
export default {
  name: "permissions",
  created() {
    const projectId = this.$route.params.id;
    this.getTasksByProject(projectId);
  },
  methods: {
    ...mapActions(["getTasksByProject"])
  },
  computed: {
    ...mapState({
      project: state => state.projects.project
    })
  },
  components: {
    TasksByProjectHeader,
    SettingsMenu
  }
};
</script>

<style>
</style>
