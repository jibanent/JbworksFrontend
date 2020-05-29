import axios from "../../plugins/axios";
import VueCookie from "vue-cookie";

const getMyNotifications = async ({ commit }) => {
  // commit("SET_LOADING", true);
  try {
    let config = {
      headers: {
        Authorization: "Bearer " + VueCookie.get("access_token")
      }
    };
    const result = await axios.get(`/api/notifications`, config);
    console.log("getMyNotifications", result);

    if (result.status === 200) {
      commit("SET_NOTIFICATIONS", result.data.notifications);
      // commit("SET_LOADING", false);
      return { error: false };
    }
  } catch (error) {
    // commit("SET_LOADING", false);
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
      dispatch("getMyNotifications")
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
