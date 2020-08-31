import Echo from "laravel-echo";
import VueCookie from "vue-cookie";

window.io = require("socket.io-client");

window.Echo = new Echo({
  broadcaster: "socket.io",
  host: `${window.location.protocol}//${window.location.hostname}:6001`,
  auth: {
    headers: {
      Authorization: `Bearer ${VueCookie.get("access_token")}`
    }
  }
});
