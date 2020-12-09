<template>
  <div class="user-profile-wrapper">
    <div class="row">
      <div class="col-full-lg-block col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <app-card custom-classes="grid-b-space">
          <div class="profile-view">
            <div class="row">
              <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1 text-center">
                <div class="avatar-wrap pos-relative d-inline-block">
                  <img src="/static/img/user-1.jpg" alt="user thumb" width="100" height="100" class="img-fluid rounded-circle">
                </div>
              </div>
              <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5 border-right">
                <div class="article-text-wrap pr-sm-3 mb-sm-0 mb-4 px-25 text-center text-md-left text-lg-left text-xl-left">
                  <h4>Admin</h4>
                  <p class="fs-14 artical-author mb-2">{{ $t('message.jobTitle') }}: CEO</p>
                  <p class="fs-14 artical-author mb-2">{{ $t('message.department') }}: Phòng Kinh Doanh</p>
                  <p class="fs-14 artical-author mb-2">{{ $t('message.dateOfJoin') }}: 01/01/2020</p>
                  <button type="button" class="btn mb-10 mr-10 btn-warning mt-20">{{ $t('message.businessReport') }}</button>
                </div>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="idb-full-block h-100 d-flex flex-column justify-content-between user-profile-widget">
                  <div class="user-detail-wrap px-25">
                    <div class="py-25 user-info">
                      <ul class="list-unstyled user-contact-info">
                        <li>
                          <span><i class="zmdi zmdi-phone-msg" /></span>
                          <a href="tel:123456" class="fs-14">+2347637684</a>
                        </li>
                        <li>
                          <span><i class="zmdi zmdi-email" /></span>
                          <a href="mailto:joan_parisian@gmail.com" class="fs-14">abc@example.com</a>
                        </li>
                        <li>
                          <span><i class="zmdi zmdi-pin" /></span>
                          <span class="fs-14">Mohali,India</span>
                        </li>
                        <li>
                          <span><i class="fa fa-birthday-cake" /></span>
                          <span class="fs-14">1996/12/10</span>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </app-card>
      </div>
      <div class="col-full-lg-block col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <b-tabs pills>
          <b-tab :title="$t('message.personalGoalsAndAchievements')">
            <div class="row">
              <div class="col-full-lg-block col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <app-card>
                  Danh sách mục tiêu và thành tích cá nhân
                </app-card>
              </div>
              <div class="col-full-lg-block col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <app-card>
                  Biểu đồ mục tiêu và thành tích cá nhân
                </app-card>
              </div>
            </div>
          </b-tab>
          <b-tab :title="$t('message.calendar')">
            Lịch
          </b-tab>
          <b-tab :title="$t('message.task')" active>
            <app-card>
              <tasks />
            </app-card>
          </b-tab>
        </b-tabs>
      </div>
    </div>
  </div>
</template>

<script>
import Tasks from './tasks'
export default {
  components: {
    Tasks
  }
}
</script>
