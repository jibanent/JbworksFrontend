<template>
  <div class="row">
    <div class="col-full-lg-block col-sm-12 col-md-12 col-lg-6 col-xl-6">
      <app-card>
        <div class="table-responsive">
          <table class="table table-striped custom-table">
            <thead>
              <tr>
                <th />
                <th>{{ $t('message.target') }}</th>
                <th>{{ $t('message.achievement') }}</th>
                <th>{{ $t('message.achievedRate') }}</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>2020年7月度</td>
                <td>50.000</td>
                <td>25.000</td>
                <td>50%</td>
              </tr>
              <tr>
                <td>2020年8月度</td>
                <td>50.000</td>
                <td>25.000</td>
                <td>50%</td>
              </tr>
              <tr>
                <td>2020年9月度</td>
                <td>50.000</td>
                <td>25.000</td>
                <td>50%</td>
              </tr>
              <tr>
                <td>2020年10月度</td>
                <td>50.000</td>
                <td>25.000</td>
                <td>50%</td>
              </tr>
              <tr>
                <td>2020年11月度</td>
                <td>50.000</td>
                <td>25.000</td>
                <td>50%</td>
              </tr>
              <tr>
                <td>2020年12月度</td>
                <td>50.000</td>
                <td>25.000</td>
                <td>50%</td>
              </tr>
            </tbody>
          </table>
        </div>
      </app-card>
    </div>
    <div class="col-full-lg-block col-sm-12 col-md-12 col-lg-6 col-xl-6">
      <app-card>
        <targets-and-achievements-chart :width="300" :height="166" />
      </app-card>
    </div>
  </div>
</template>

<script>
import TargetsAndAchievementsChart from 'Components/Charts/TargetsAndAchievementsChart'
export default {
  components: {
    TargetsAndAchievementsChart
  }
}
</script>
