import axios from "../../plugins/axios";
import VueCookie from "vue-cookie";

const login = async ({ commit }, { email = "", password = "" }) => {
  commit("SET_LOADING", true);
  try {
    const result = await axios.post("/api/auth/login", { email, password }); // call api login
    if (result.data.status === "success") {
      VueCookie.set("access_token", result.data.access_token, 2592000); //  Save access token
      commit("SET_LOGIN_INFO", result.data.user);
      commit("SET_LOADING", false);
      return { error: false };
    }
  } catch (error) {
    let message = error.response.data.errors; // Validation error
    if ("status" in error.response.data) {
      message = error.response.data.message; // Unauthorized error
    }
    commit("SET_LOADING", false);
    return {
      error: true,
      message: message
    };
  }
};

const checkLogin = async ({ commit }) => {
  commit("SET_LOADING", true);
  try {
    const accessToken = VueCookie.get("access_token");
    if (accessToken !== null) {
      commit("SET_LOADING", true);
      let result = await axios.post("/api/auth/me", { token: accessToken });
      commit("SET_LOGIN_INFO", result.data);
      commit("SET_LOADING", false);
      return {
        currentUser: result.data,
        error: false
      };
    } else {
      commit("SET_LOADING", false);
      return { error: true };
    }
  } catch (error) {
    commit("SET_LOADING", false);
    return {
      error: true,
      message: error.response
    };
  }
};

const logout = async ({ commit }) => {
  commit("SET_LOADING", true);
  try {
    const accessToken = VueCookie.get("access_token");
    if (accessToken !== null) {
      await axios.post("/api/auth/logout", { token: accessToken });
      commit("SET_LOGOUT");
      commit("SET_LOADING", false);
      return { error: false };
    } else {
      return { error: true };
    }
  } catch (error) {
    return {
      error: true,
      message: error.response
    };
  }
};

export default {
  login,
  checkLogin,
  logout
};
