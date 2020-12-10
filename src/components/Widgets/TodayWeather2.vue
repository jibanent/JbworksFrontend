<template>
  <div class="idb-block weather-widget-v2 text-white overlay overflow-hide h-100">
    <div class="d-flex align-items-center justify-content-between idb-block-title">
      <h4 class="text-white">{{ city }}</h4>
      <div class="idb-contextual-link">
        <b-dropdown variant="link" no-caret>
          <template slot="button-content">
            <i class="zmdi zmdi-more" />
          </template>
          <b-dropdown-item href="#"><i class="ti-eye" />{{ $t('message.view') }}</b-dropdown-item>
          <b-dropdown-item href="#"><i class="ti-pencil" />{{ $t('message.edit') }}</b-dropdown-item>
          <b-dropdown-item href="#"><i class="ti-trash" />{{ $t('message.delete') }}</b-dropdown-item>
        </b-dropdown>
      </div>
    </div>
    <div class="idb-block-content text-center">
      <h2 class="text-capitalize mb-20">{{ weatherDescription }}</h2>
      <span class="font-4x mb-20 d-block"><i :class="weatherIcon" /></span>
      <h2 class="mb-20">{{ temp }}&deg;</h2>
      <h2 class="mb-20">{{ currentDate }}</h2>
      <span>{{ dayName }}</span>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
import moment from 'moment'

// function to get today weather icon
function getIcon(id) {
  if (id >= 200 && id < 300) {
    return 'wi wi-night-showers'
  } else if (id >= 300 && id < 500) {
    return 'wi day-sleet'
  } else if (id >= 500 && id < 600) {
    return 'wi wi-night-showers'
  } else if (id >= 600 && id < 700) {
    return 'wi wi-day-snow'
  } else if (id >= 700 && id < 800) {
    return 'wi wi-day-fog'
  } else if (id === 800) {
    return 'wi wi-day-sunny'
  } else if (id >= 801 && id < 803) {
    return 'wi wi-night-partly-cloudy'
  } else if (id >= 802 && id < 900) {
    return 'wi wi-day-cloudy'
  } else if (id === 905 || (id >= 951 && id <= 956)) {
    return 'wi wi-day-windy'
  } else if (id >= 900 && id < 1000) {
    return 'wi wi-night-showers'
  }
}

export default {
  data: function() {
    return {
      city: '',
      countryCode: '',
      temp: '',
      weatherDescription: '',
      weatherIcon: '',
      currentDate: moment().format('DD MMM YYYY'),
      dayName: moment().format('dddd')
    }
  },
  mounted() {
    var appid = 'b1b15e88fa797225412429c1c50c122a1' // Your api id
    var apikey = '69b72ed255ce5efad910bd946685883a' // Your apikey
    var city = 'Mohali' // city name
    axios.get('http://api.openweathermap.org/data/2.5/weather?q=' + city + '&cnt=6&units=metric&mode=json&appid=' + appid + '&apikey=' + apikey)
      .then(response => {
        this.city = response.data.name
        this.countryCode = response.data.sys.country
        this.temp = response.data.main.temp_max
        this.weatherDescription = response.data.weather[0].description
        this.weatherIcon = getIcon(response.data.weather[0].id)
      })
      .catch(error => {
        console.log('Error fetching and parsing data', error)
      })
  }
}
</script>
