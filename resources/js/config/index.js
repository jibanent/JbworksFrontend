import VueCookie from "vue-cookie";

export const config = {
  headers: {
    Authorization: `Bearer ${VueCookie.get("access_token")}`
  }
};
