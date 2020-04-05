/**
  PROJECTS ACTION
 */

import axios from "../../plugins/axios";

const getProjects = async ({ commit }, currentUserId = null) => {
  commit("SET_LOADING", true);
  try {
    const result = await axios.get(`/api/projects/`, {
      params: { user: currentUserId }
    });

    if (result.status === 200) {
      commit("SET_PROJECTS", result.data.projects);
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
  getProjects
};
