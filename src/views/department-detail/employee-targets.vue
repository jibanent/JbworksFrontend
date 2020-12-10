<template>
  <div class="table-responsive">
    <app-card custom-classes="grid-b-space">
      <div class="mb-2 w-30">
        <datepicker
          :value="defaultDate"
          :format="DatePickerFormat"
          :language="language"
          minimum-view="month"
        />
      </div>
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
            <td>Ngọc</td>
            <td>50.000</td>
            <td>25.000</td>
            <td>50%</td>
          </tr>
          <tr>
            <td>Phú</td>
            <td>50.000</td>
            <td>25.000</td>
            <td>50%</td>
          </tr>
          <tr>
            <td>Hồng Anh</td>
            <td>50.000</td>
            <td>25.000</td>
            <td>50%</td>
          </tr>
          <tr>
            <td>Đan Thảo</td>
            <td>50.000</td>
            <td>25.000</td>
            <td>50%</td>
          </tr>
          <tr>
            <td>Thanh Lam</td>
            <td>50.000</td>
            <td>25.000</td>
            <td>50%</td>
          </tr>
          <tr>
            <td>Đình Trí</td>
            <td>50.000</td>
            <td>25.000</td>
            <td>50%</td>
          </tr>
        </tbody>
      </table>
    </app-card>
  </div>
</template>

<script>
import Datepicker from 'vuejs-datepicker'
export default {
  components: {
    Datepicker
  },
  data() {
    return {
      defaultDate: '2020-12-1',
      DatePickerFormat: 'yyyy年M月度',
      language: {
        language: 'Japanese',
        months: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
        monthsAbbr: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
        days: ['日', '月', '火', '水', '木', '金', '土'],
        rtl: false,
        ymd: false,
        yearSuffix: '年'
      }
    }
  }
}
</script>
