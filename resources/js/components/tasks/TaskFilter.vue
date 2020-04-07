<template>
  <div id="js-myform">
    <div id="subheader">
      <div class="task-user-add -compact">
        <div class="avatar"></div>
        <div class="txt">
          <span class="action" onclick="Project.tform.dialog();">Tạo công việc mới</span>
        </div>
      </div>
      <div class="side">
        <div class="dd -cmenuw" data-param="set">
          <em>Giao &amp; được giao</em>
          <div class="-cmenu -padding -no-icon">
            <div
              class="-item url active selected"
              data-urlparam="set"
              data-value
            >Giao &amp; được giao</div>
            <div class="-item url" data-urlparam="set" data-value="assigned">CV được giao</div>
            <div class="-item url" data-urlparam="set" data-value="created">CV giao đi</div>
            <div class="sep-10"></div>
            <div class="select">
              <select name="js-subtask-options">
                <option value="flatten">Công việc &amp; công việc con</option>
                <option value="natural">Một cấp công việc con</option>
                <option value="none">Không có công việc con</option>
              </select>
            </div>
          </div>
        </div>
        <div class="dd -cmenuw" data-param="status">
          <em>Tất cả trạng thái</em>
          <div class="-cmenu -padding -no-icon">
            <div
              class="-item url js-review-mark active selected"
              data-urlparam="status"
              data-value
            >Tất cả trạng thái</div>
            <div
              class="-item url"
              data-urlparam="status"
              data-value="active"
            >Đang thực hiện (Phải làm &amp; Đang làm)</div>
            <div class="-item url" data-urlparam="status" data-value="todo">Phải làm</div>
            <div class="-item url" data-urlparam="status" data-value="doing">Đang làm</div>
            <div class="-item url" data-urlparam="status" data-value="done">Đã hoàn thành</div>
            <div class="-item url" data-urlparam="status" data-value="review">Chờ review</div>
            <div class="-item-sep"></div>
            <div class="-item url" data-urlparam="status" data-value="donelate">HT muộn</div>
            <div class="-item url" data-urlparam="status" data-value="overdue">Quá hạn</div>
            <div class="-item url" data-urlparam="status" data-value="urgent">Khẩn cấp</div>
            <div class="-item url" data-urlparam="status" data-value="important">Quan trọng</div>
          </div>
        </div>
        <div class="dd -cmenuw" data-param="project">
          <em>Tất cả dự án</em>
          <div class="-cmenu -padding -no-icon js-projects xo">
            <div class="-item-filter">
              <input type="text" name="js-search-pfilter" placeholder="Lọc nhanh" />
            </div>
            <div
              class="js-all-projects-filter scroll-y"
              style="max-height:300px; margin:0 -10px; padding:0 10px"
            >
              <div class="-item url active selected" data-urlparam="project" data-value>Tất cả dự án</div>
              <div
                class="-item ap-xdot url"
                data-urlparam="project"
                data-value="112022"
              >Phòng Nhật Bản</div>
              <div class="-item ap-xdot url" data-urlparam="project" data-value="111994">Hành chính</div>
              <div
                class="-item ap-xdot url"
                data-urlparam="project"
                data-value="107224"
              >Dự án Khu đô thị Kim Mã</div>
              <div
                class="-item ap-xdot url"
                data-urlparam="project"
                data-value="106538"
              >Khai trương cửa hàng mới</div>
              <div
                class="-item ap-xdot url"
                data-urlparam="project"
                data-value="16896"
              >Công việc của Trang Lê</div>
              <div
                class="-item ap-xdot url"
                data-urlparam="project"
                data-value="109039"
              >Dự án Global Passport</div>
              <div
                class="-item ap-xdot url"
                data-urlparam="project"
                data-value="110473"
              >Lịch sử mua hàng</div>
              <div
                class="-item ap-xdot url"
                data-urlparam="project"
                data-value="110249"
              >Phòng hành chính - nhân sự</div>
              <div
                class="-item ap-xdot url"
                data-urlparam="project"
                data-value="110250"
              >Phòng marketing</div>
              <div
                class="-item ap-xdot url"
                data-urlparam="project"
                data-value="109232"
              >Thi công nội thất Intracom</div>
              <div
                class="-item ap-xdot url"
                data-urlparam="project"
                data-value="108577"
              >Lớp học Tiếng Anh Trung cấp</div>
              <div
                class="-item ap-xdot url"
                data-urlparam="project"
                data-value="108573"
              >Lớp học Tiếng Anh Sơ cấp</div>
              <div
                class="-item ap-xdot url"
                data-urlparam="project"
                data-value="107053"
              >Gặp khách hàng</div>
              <div
                class="-item ap-xdot url"
                data-urlparam="project"
                data-value="106605"
              >Báo cáo Budget văn phòng phẩm</div>
              <div
                class="-item ap-xdot url"
                data-urlparam="project"
                data-value="105418"
              >Bản sao của Phòng Hành Chính Nhân Sự</div>
              <div
                class="-item ap-xdot url"
                data-urlparam="project"
                data-value="105241"
              >Nhóm quản lí</div>
              <div
                class="-item ap-xdot url"
                data-urlparam="project"
                data-value="104665"
              >Bản sao của Phòng Hành Chính Nhân Sự</div>
              <div
                class="-item ap-xdot url"
                data-urlparam="project"
                data-value="32132"
              >Dự án xây dựng</div>
              <div
                class="-item ap-xdot url"
                data-urlparam="project"
                data-value="51335"
              >Dự án sản xuất linh kiện</div>
              <div
                class="-item ap-xdot url"
                data-urlparam="project"
                data-value="93633"
              >HĐ 001 - 1000m3 Sàn gỗ</div>
              <div
                class="-item ap-xdot url"
                data-urlparam="project"
                data-value="97198"
              >Dự án TTVN List</div>
              <div
                class="-item ap-xdot url"
                data-urlparam="project"
                data-value="97578"
              >Ban Điều Hành</div>
              <div class="-item ap-xdot url" data-urlparam="project" data-value="45821">BOD VP</div>
              <div
                class="-item ap-xdot url"
                data-urlparam="project"
                data-value="33458"
              >Review - Dự án xây dựng CTX</div>
              <div
                class="-item ap-xdot url"
                data-urlparam="project"
                data-value="44558"
              >Phòng Đào tạo Scot English</div>
              <div
                class="-item ap-xdot url"
                data-urlparam="project"
                data-value="41555"
              >Huy - Dự án thiết kế (giai đoạn)</div>
              <div class="-item ap-xdot url" data-urlparam="project" data-value="70282">Lô hàng 02</div>
              <div class="-item ap-xdot url" data-urlparam="project" data-value="70285">Lô hàng 02</div>
              <div class="-item ap-xdot url" data-urlparam="project" data-value="70289">Lô hàng 01</div>
              <div
                class="-item ap-xdot url"
                data-urlparam="project"
                data-value="55558"
              >Noi Hoi Dong Anh</div>
              <div
                class="-item ap-xdot url"
                data-urlparam="project"
                data-value="53152"
              >Phòng Kinh Doanh - Theo Định kỳ</div>
              <div
                class="-item ap-xdot url"
                data-urlparam="project"
                data-value="50330"
              >[Takako] Phát triển sản phẩm mới</div>
              <div class="-item ap-xdot url" data-urlparam="project" data-value="45142">[VH] F28</div>
              <div
                class="-item ap-xdot url"
                data-urlparam="project"
                data-value="44126"
              >Kế hoạch truyền thông SKS</div>
              <div class="-item ap-xdot url" data-urlparam="project" data-value="43262">Phòng HR</div>
              <div
                class="-item ap-xdot url"
                data-urlparam="project"
                data-value="37412"
              >Thi công công trình quận Thanh Xuân</div>
            </div>
          </div>
        </div>
        <div class="dd -cmenuw" data-param="order">
          <em>Thời gian cập nhật</em>
          <div class="-cmenu -padding -no-icon">
            <div
              class="-item url active selected"
              data-urlparam="order"
              data-value
            >Thời gian cập nhật</div>
            <div class="-item url" data-urlparam="order" data-value="created">Thời gian tạo</div>
            <div class="-item url" data-urlparam="order" data-value="deadline">Thời hạn hoàn thành</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style>
</style>
