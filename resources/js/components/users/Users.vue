<template>
  <div>
    <div id="header">
      <div class="nav">
        <span class="icon"></span>
      </div>
      <div class="title">
        <div class="icon -svg">Icon</div>
        <div class="name">Thành viên</div>
      </div>
      <div class="main">
        <div class="tabs">
          <div class="tab active url -dd -cmenuw">
            Danh sách thành viên
            <div class="-cmenu -no-icon -padding">
              <div class="-item url" data-url="#collection">Thành viên thường</div>
              <div class="-item url" data-url="#js-guests">Tài khoản khách</div>
            </div>
          </div>
        </div>
      </div>

      <div class="side">
        <div class="search block">
          <div class="input">
            <input type="text" placeholder="Tìm kiếm thành viên" />
          </div>
        </div>

        <div class="cta url" @click="$emit('openModal')">
          <span class="-ap icon-plus2"></span>&nbsp; Thêm thành viên mới
        </div>
      </div>
    </div>

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
                <th style="width:20%">Liên hệ</th>
                <th style="width:20%">Người quản lý</th>
                <th style="width:150px">&nbsp;</th>
              </tr>
            </thead>
            <tbody>
              <tr class="li item-9136 js-person" data-keyword="thuytrang Thùy Trang CMO">
                <td></td>
                <td>
                  <div class="user">
                    <div class="avatar avatar-32 -circled -online">
                      <div class="image">
                        <img
                          src="https://data-gcdn.basecdn.net/avatar/sys121/64/6b/1c/8b/f4/c406e7dca53bc27a0676e22ecf912de3/0.thuytrang_121.jpg"
                        />
                      </div>
                    </div>
                    <div class="title url ap-xdot">Thùy Trang</div>
                    <div class="info ap-xdot">CMO</div>
                  </div>
                </td>
                <td>
                  <div class="relative">
                    <div class="absolute ap-xdot" style="width:100%">thuytrangenglish@gmail.com</div>
                  </div>
                </td>
                <td>
                  <div class="users clear-fix">
                    <div class="avatar avatar-32 -circled url" data-username="vananh">
                      <div class="image">
                        <img
                          src="https://data-gcdn.basecdn.net/avatar/sys121/2e/30/c2/4a/6c/6590fd2b8f3e3b1c99d46620ae2c0ba6/0.vananh_121.jpg"
                        />
                      </div>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="buttons -two clear-fix -std">
                    <div class="button url">▷ Chi tiết</div>
                    <div class="button">Nhắn tin</div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'user-component',
  data() {
    return {

    }
  },
  methods: {

  },
}
</script>


