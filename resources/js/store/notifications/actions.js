import axios from "../../plugins/axios";
import VueCookie from "vue-cookie";

const getMyNotifications = async ({ commit }, page = 1) => {
  commit("SET_LOAD_MORE_NOTIFICATION", true);
  try {
    let config = {
      headers: {
        Authorization: "Bearer " + VueCookie.get("access_token")
      }
    };
    const result = await axios.get(`/api/notifications?page=${page}`, config);
    console.log("getMyNotifications", result);

    if (result.status === 200) {
      commit("SET_NOTIFICATIONS", result.data.notifications.data);
      commit("SET_LOAD_MORE_NOTIFICATION", false);
      return { error: false };
    }
  } catch (error) {
    commit("SET_LOAD_MORE_NOTIFICATION", false);
    return {
      error: true,
      message: error.response
    };
  }
};

const markAsRead = async ({ commit, dispatch }, id) => {
  try {
    let config = {
      headers: {
        Authorization: "Bearer " + VueCookie.get("access_token")
      }
    };

    const result = await axios.put(
      `/api/notifications/mark-as-read/`,
      { id },
      config
    );

    if (result.status === 200) {
      commit('REPLACE_READ_NOTIFICATION', result.data.notification);
      return { error: false };
    }
  } catch (error) {
    return {
      error: true,
      message: error.response
    };
  }
};

export default {
  getMyNotifications,
  markAsRead
};
