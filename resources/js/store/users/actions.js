/**
  USERS ACTION
 */

import axios from "../../plugins/axios";
import VueCookie from "vue-cookie";

const getUsers = async ({ commit }) => {
  commit("SET_LOADING", true);
  try {
    const config = {
      headers: {
        Authorization: `Bearer ${VueCookie.get("access_token")}`
      }
    };
    const result = await axios.get("/api/users", config);
    commit("SET_LOADING", false);
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

const getProjectMembers = async ({ commit }, projectId) => {
  console.log("getProjectMembers", projectId);

  commit("SET_LOADING", true);
  try {
    const config = {
      headers: {
        Authorization: `Bearer ${VueCookie.get("access_token")}`
      }
    };

    const result = await axios.get(
      `/api/users/project-members?project=${projectId}`,
      config
    );

    if (result.status === 200) {
      commit("SET_PROJECT_PARTICIPANTS", result.data.members);
      commit("SET_PROJECT_MANAGER", result.data.manager);
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

const createUser = async ({ commit, dispatch }, data) => {
  commit("SET_SUBMITTING", true);
  try {
    const config = {
      headers: {
        Authorization: `Bearer ${VueCookie.get("access_token")}`
      }
    };

    const result = await axios.post("/api/users", data, config);
    commit("SET_SUBMITTING", false);
    if (result.status === 200) {
      dispatch("getUsers");
      return { error: false };
    }
  } catch (error) {
    commit("SET_SUBMITTING", false);
    return {
      error: true,
      message: error.response.data.errors
    };
  }
};

const getMyProfile = async ({ commit }) => {
  commit("SET_LOADING", true);
  try {
    const config = {
      headers: {
        Authorization: `Bearer ${VueCookie.get("access_token")}`
      }
    };
    commit("SET_LOADING", true);
    let result = await axios.get("/api/users/profile", config);
    commit("SET_LOADING", false);
    if (result.status === 200) {
      commit('SET_MY_PROFILE', result.data)
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
  getUsers,
  createUser,
  getProjectMembers,
  getMyProfile
};
