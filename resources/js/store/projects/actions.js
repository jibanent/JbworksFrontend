/**
  PROJECTS ACTION
 */

import axios from "../../plugins/axios";
import VueCookie from "vue-cookie";

const getProjects = async ({ commit }, currentUserId = null) => {
  commit("SET_LOADING", true);
  try {
    var result;
    const config = {
      headers: {
        Authorization: `Bearer ${VueCookie.get("access_token")}`
      },
      params: { user: currentUserId }
    };
    
    if (currentUserId) {
      result = await axios.get(`/api/projects/`, config); // call api get projects that I joined
    } else {
      result = await axios.get(`/api/projects/admin`, config); // call api get projects all projects
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
