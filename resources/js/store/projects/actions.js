/**
  PROJECTS ACTION
 */

import axios from "../../plugins/axios";

const getProjects = async ({ commit }, currentUserId = null) => {
  console.log(currentUserId);

  commit("SET_LOADING", true);
  try {
    var result;
    if (currentUserId) {
      result = await axios.get(`/api/projects/`, {
        params: { user: currentUserId }
      });
    } else {
      result = await axios.get(`/api/projects/admin`);
    }

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
