import Vue from "vue";
import VueCookie from "vue-cookie";

const SET_LOGIN_INFO = (state, data = null) => {
  state.currentUser = { ...state.currentUser, ...data };
};

const SET_LOGOUT = state => {
  state.currentUser = null;
  VueCookie.delete("access_token");
};

export default {
  SET_LOGIN_INFO,
  SET_LOGOUT
};
