<template>
  <div class="table-responsive">
    <app-card custom-classes="grid-b-space">
      <div class="mb-2 w-30">
        <datepicker
          :value="defaultDate"
          :format="DatePickerFormat"
          :language="language"
          minimum-view="year"
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
      DatePickerFormat: 'yyyy年',
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
