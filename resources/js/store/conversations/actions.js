/**
  MESSAGES ACTION
 */

import axios from "../../plugins/axios";
import VueCookie from "vue-cookie";

const getSingleUserConversations = async ({ commit }, data = {}) => {
  try {
    const config = {
      headers: {
        Authorization: `Bearer ${VueCookie.get("access_token")}`
      }
    };
    const { page, user_id } = data;
    const params = { page, user_id };
    const result = await axios.get("/api/conversations/", {
      params,
      ...config
    });
    if (result.status === 200) {
      commit("SET_CONVERSATIONS", result.data);
      return { error: false };
    }
  } catch (error) {
    return {
      error: true,
      message: error.response
    };
  }
};

const addUsersToConversation = async ({ commit, dispatch }, data = {}) => {
  try {
    const config = {
      headers: {
        Authorization: `Bearer ${VueCookie.get("access_token")}`,
        "X-Socket-Id": Echo.socketId()
      }
    };
    const result = await axios.post(
      "/api/conversations/add-users",
      data,
      config
    );
    if (result.status === 201) {
      commit("TOGGLE_ADD_USERS");
      dispatch("getSingleUserConversations", {
        user_id: result.data.conversation.creator.id
      });
      dispatch("getMessagesByConversation", {
        conversation_id: result.data.conversation.id
      });
      return { error: false };
    }
  } catch (error) {
    return {
      error: true
    };
  }
};

const updateConversation = async ({ commit }, { data, id }) => {
  commit("SET_SUBMITTING", true);
  try {
    const config = {
      headers: {
        Authorization: `Bearer ${VueCookie.get("access_token")}`,
        "X-Socket-Id": Echo.socketId()
      }
    };
    const result = await axios.put(`/api/conversations/${id}`, data, config);
    commit("SET_SUBMITTING", false);
    if (result.status === 200) {
      commit("UPDATE_CONVERSATION", result.data.data);
      return { error: false };
    }
  } catch (error) {
    commit("SET_SUBMITTING", false);
    return {
      error: true,
      message: error.response.data
    };
  }
};

export default {
  getSingleUserConversations,
  addUsersToConversation,
  updateConversation
};
