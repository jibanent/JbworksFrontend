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
                  <h4>地盤ネット株式会社 新宿本社</h4>
                  <p class="fs-14 artical-author mb-2">{{ $t('message.jobTitle') }}: CEO</p>
                  <p class="fs-14 artical-author mb-2">{{ $t('message.department') }}: 【営サポ】個人実績記入</p>
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
                          <a href="tel:0120-100-581" class="fs-14">0120-100-581</a>
                        </li>
                        <li>
                          <span><i class="zmdi zmdi-email" /></span>
                          <a href="mailto:info@jibanent.co.jp" class="fs-14">info@jibanent.co.jp</a>
                        </li>
                        <li>
                          <span><i class="zmdi zmdi-pin" /></span>
                          <span class="fs-14">〒160-0022,東京都新宿区新宿5丁目2-3 4F</span>
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
    </div>
    <!--report sales-->
		<div class="row">
			<div class="col-full-lg-block col-sm-12 col-md-12 col-lg-12 grid-b-space">
  			<app-card :heading="$t('message.salesByCategory')" :headingMenu="true" contentCustomClass="p-0"
  				customClasses="salesByCategory-widget overflow-hide">
           <targets-achievements />
           </app-card>				
			</div>
		</div>    
    <!--report sales-->

   <!--calendar-->
		<div class="row">
			<div class="col-full-lg-block col-sm-12 col-md-12 col-lg-12 grid-b-space">
	        <app-card :heading="$t('message.calendar')" :headingMenu="true" contentCustomClass="p-0"
		customClasses="salesByCategory-widget overflow-hide">               			
            <calendar />  
          </app-card>			                    
			</div>
		</div>    
   <!--end calendar-->
    <!--begin task-->
		<div class="row">
			<div class="col-full-lg-block col-sm-12 col-md-12 col-lg-12 grid-b-space">
			<app-card :heading="$t('message.task')" :headingMenu="true" contentCustomClass="p-0"
				customClasses="task-widget overflow-hide">
					<tasks />
			</app-card>  			
			</div>
		</div>    
    <!--end task-->

  </div>
</template>

<script>
import Calendar from "Components/Widgets/Calendar";
import Tasks from './tasks'
import TargetsAchievements from './targets-achievements'
export default {
  components: {
    Tasks,
    Calendar,
    TargetsAchievements
  }
}
</script>