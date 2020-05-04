/**
  USERS ACTION
 */

import axios from "../../plugins/axios";
import VueCookie from "vue-cookie";

const getUsers = async ({ commit }) => {
  try {
    const url = "/api/users"; // api get all users
    const config = {
      headers: {
        Authorization: `Bearer ${VueCookie.get("access_token")}`
      }
    };
    const result = await axios.get(url, config);

    if (result.status === 200) {
      commit("SET_USERS", result.data.users);
    }
  } catch (error) {
    commit("SET_LOADING", false);
    return {
      error: true,
      message: error.response
    };
  }
};

const getMyMembers = async ({ commit }, currentUserId) => {
  commit("SET_LOADING", true);
  try {
    const config = {
      headers: {
        Authorization: `Bearer ${VueCookie.get("access_token")}`
      }
    };
    const url = `/api/users/department?manager=${currentUserId}`;
    const result = await axios.get(url, config);

    if (result.status === 200) {
      commit("SET_MY_MEMBERS", result.data.users);
      commit("SET_LOADING", false);
      return { error: false };
    }
  } catch (error) {
    commit("SET_LOADING", false);
    return {
      error: true,
      message: error.response
    };
  }
};

export default {
  getMyMembers,
  getUsers
};
