<template>
  <app-card custom-classes="weather-widget text-white text-center ">
    <h2>{{ city }} ({{ countryCode }})</h2>
    <p class="mb-20">{{ currentTime }}</p>
    <i :class="weatherIcon" class="font-4x mb-30 d-block" />
    <h2 class="mb-0">{{ temp }}&deg; {{ weatherDescription }}</h2>
  </app-card>
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
      currentTime: moment().format('dddd hh:mm A')
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
