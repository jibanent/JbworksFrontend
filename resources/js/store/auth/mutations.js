import Vue from "vue";

const SET_LOGIN_INFO = (state, data) => {
  state.currentUser = data;
};

const SET_LOGOUT = state => {
  state.currentUser = null;
  localStorage.removeItem("access_token");
};

export default {
  SET_LOGIN_INFO,
  SET_LOGOUT
};
