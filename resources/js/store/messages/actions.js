/**
  MESSAGES ACTION
 */

import axios from "../../plugins/axios";
import VueCookie from "vue-cookie";

const getListUsers = async ({ commit }, data = {}) => {
  try {
    const config = {
      headers: {
        Authorization: `Bearer ${VueCookie.get("access_token")}`
      }
    };
    const { page, search } = data;
    const params = { page, search };
    const result = await axios.get("/api/messages/users", {
      params,
      ...config
    });
    if (result.status === 200) {
      commit("SET_LIST_USERS", result.data);
      return { error: false };
    }
  } catch (error) {
    return {
      error: true,
      message: error.response
    };
  }
};

const getMessagesByConversation = async ({ commit }, data) => {
  try {
    const config = {
      headers: {
        Authorization: `Bearer ${VueCookie.get("access_token")}`
      }
    };
    const { page, conversation_id, receiver_id } = data;
    const params = { page, conversation_id, receiver_id };
    const result = await axios.get("/api/messages/", {
      params,
      ...config
    });

    if (result.status === 200) {
      commit("SET_MESSAGES", result.data);
      return {
        error: false,
        data: result.data
      };
    }
  } catch (error) {
    return {
      error: true,
      message: error.response
    };
  }
};

const sendMessage = async ({ commit, dispatch }, data) => {
  try {
    const config = {
      headers: {
        Authorization: `Bearer ${VueCookie.get("access_token")}`,
        "X-Socket-Id": Echo.socketId()
      }
    };
    const result = await axios.post("/api/messages", data, config);

    if (result.status === 201) {
      dispatch("getSingleUserConversations", {
        user_id: result.data.conversation.creator.id
      });
      dispatch("getMessagesByConversation", {
        conversation_id: data.conversation_id
      });
      return { error: false };
    }
  } catch (error) {
    return {
      error: true,
      message: error.response.data.errors
    };
  }
};

const storeConversationAndMessages = async ({ commit, dispatch }, data) => {
  try {
    const config = {
      headers: {
        Authorization: `Bearer ${VueCookie.get("access_token")}`,
        "X-Socket-Id": Echo.socketId()
      }
    };
    const result = await axios.post(
      "/api/messages/conversation-message",
      data,
      config
    );
    console.log('result', result);
    if (result.status === 201) {
      commit("SET_CONVERSATION", result.data.conversation);
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
      error: true,
      message: error.response.data.errors
    };
  }
};

export default {
  getListUsers,
  sendMessage,
  getMessagesByConversation,
  storeConversationAndMessages
};
