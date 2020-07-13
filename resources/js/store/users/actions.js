/**
  USERS ACTION
 */

import axios from "../../plugins/axios";
import VueCookie from "vue-cookie";

const getUsers = async ({ commit }, data = {}) => {
  try {
    const config = {
      headers: {
        Authorization: `Bearer ${VueCookie.get("access_token")}`
      }
    };
    const { page, search } = data;
    const params = { page, search };
    const result = await axios.get("/api/users", { params, ...config });
    if (result.status === 200) {
      commit("SET_USERS", result.data);
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

const getMyMembers = async ({ commit }, data = {}) => {
  commit("SET_LOADING", true);
  try {
    const config = {
      headers: {
        Authorization: `Bearer ${VueCookie.get("access_token")}`
      }
    };
    const { page, search } = data;
    const params = { page, search };
    const result = await axios.get("/api/users/department", {
      params,
      ...config
    });

    commit("SET_LOADING", false);
    if (result.status === 200) {
      commit("SET_USERS", result.data);
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
      commit("ADD_NEW_USER", result.data.user);
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

export default {
  getMyMembers,
  getUsers,
  createUser,
  getProjectMembers
};
