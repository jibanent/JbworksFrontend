/**
  MESSAGES ACTION
 */

import axios from "../../plugins/axios";
import { config } from "../../config";

const getSingleUserConversations = async ({ commit }, data = {}) => {
  try {
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

export default {
  getSingleUserConversations
};
