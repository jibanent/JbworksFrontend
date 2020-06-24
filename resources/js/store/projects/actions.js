/**
  PROJECTS ACTION
 */

import axios from "../../plugins/axios";
import VueCookie from "vue-cookie";

const getProjects = async ({ commit }, data) => {
  commit("SET_LOADING", true);
  try {
    const config = {
      headers: {
        Authorization: `Bearer ${VueCookie.get("access_token")}`
      }
    };

    const { page, search, active, open_status, close_status } = data;
    const params = { page, search, active, open_status, close_status };

    const result = await axios.get("/api/projects/admin", {
      params,
      ...config
    });

    if (result.status === 200) {
      commit("SET_PROJECTS", result.data);
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

const getProjectsByManager = async ({ commit }, data) => {
  console.log("getProjectsByManager", data);

  commit("SET_LOADING", true);
  try {
    const config = {
      headers: {
        Authorization: `Bearer ${VueCookie.get("access_token")}`
      }
    };
    const { page, search, active, open_status, close_status } = data;
    const params = { page, search, active, open_status, close_status };

    const result = await axios.get("/api/projects/manager", {
      params,
      ...config
    });

    if (result.status === 200) {
      commit("SET_PROJECTS", result.data);
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

const getProjectById = async ({ commit }, projectId) => {
  commit("SET_LOADING", true);
  try {
    const config = {
      headers: {
        Authorization: `Bearer ${VueCookie.get("access_token")}`
      }
    };
    const result = await axios.get(`/api/projects/${projectId}`, config);
    commit("SET_LOADING", false);
    if (result.status === 200) {
      commit("SET_PROJECT", result.data.project);
      commit("SET_PROJECT_PARTICIPANTS", result.data.project.participants);
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

const createProject = async ({ commit, dispatch }, { data, currentUserId }) => {
  commit("SET_SUBMITTING", true);
  try {
    const config = {
      headers: {
        Authorization: `Bearer ${VueCookie.get("access_token")}`
      }
    };
    const result = await axios.post("/api/projects", data, config);
    commit("SET_SUBMITTING", false);
    if (result.status === 200) {
      commit("ADD_NEW_PROJECT", result.data.project);
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

const updateProject = async ({ commit, dispatch }, { data, projectId }) => {
  commit("SET_LOADING", true);
  try {
    const config = {
      headers: {
        Authorization: `Bearer ${VueCookie.get("access_token")}`
      }
    };
    const result = await axios.put(`/api/projects/${projectId}`, data, config);
    commit("SET_LOADING", false);

    if (result.status === 200) {
      dispatch("getProjectById", projectId);
      return { error: false };
    }
  } catch (error) {
    commit("SET_LOADING", false);
    return {
      error: true,
      message: error.response.data
    };
  }
};

const updateDepartmentIdOfProject = async (
  { commit, dispatch },
  { department_id, projectId }
) => {
  commit("SET_LOADING", true);
  try {
    const config = {
      headers: {
        Authorization: `Bearer ${VueCookie.get("access_token")}`
      }
    };
    const result = await axios.put(
      `/api/projects/${projectId}/update-department`,
      { department_id },
      config
    );
    commit("SET_LOADING", false);
    if (result.status === 200) {
      dispatch("getProjectById", projectId);
      return { error: false };
    }
  } catch (error) {
    commit("SET_LOADING", false);
    return {
      error: true,
      message: error.response.data
    };
  }
};

const updateProjectDuration = async (
  { commit, dispatch },
  { data, projectId }
) => {
  console.log(data, projectId);
  commit("SET_SUBMITTING", true);
  try {
    const config = {
      headers: {
        Authorization: `Bearer ${VueCookie.get("access_token")}`
      }
    };
    const result = await axios.put(
      `/api/projects/${projectId}/update-duration`,
      data,
      config
    );
    commit("SET_SUBMITTING", false);
    if (result.status === 200) {
      dispatch("getProjectById", projectId);
      return { error: false };
    }
  } catch (error) {
    console.log(error);
    commit("SET_SUBMITTING", false);
    return {
      error: true,
      message: error.response
    };
  }
};

const updateProjectQuickly = async ({ commit }, { data, projectId }) => {
  commit("SET_SUBMITTING", true);
  try {
    const config = {
      headers: {
        Authorization: `Bearer ${VueCookie.get("access_token")}`
      }
    };
    const result = await axios.put(`/api/projects/${projectId}`, data, config);

    commit("SET_SUBMITTING", false);
    if (result.status === 200) {
      commit("SET_PROJECT", result.data.project);
      commit("REPLACE_PROJECT_UPDATED", result.data.project);
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

const updateProjectStatus = async (
  { commit },
  { open_status, close_status, projectId }
) => {
  commit("SET_SUBMITTING", true);
  try {
    const config = {
      headers: {
        Authorization: `Bearer ${VueCookie.get("access_token")}`
      }
    };
    const result = await axios.put(
      `/api/projects/${projectId}/update-status`,
      { open_status, close_status },
      config
    );
    commit("SET_SUBMITTING", false);
    if (result.status === 200) {
      commit("REPLACE_PROJECT_UPDATED", result.data.project);
      commit("SET_PROJECT", result.data.project);
      return { error: false };
    }
  } catch (error) {
    commit("SET_SUBMITTING", false);
    console.log(error);

    return {
      error: true,
      message: error.response.data
    };
  }
};

const removeMemberFromProject = async ({ commit }, data) => {
  commit("SET_LOADING", true);
  try {
    const config = {
      headers: {
        Authorization: `Bearer ${VueCookie.get("access_token")}`
      }
    };

    const result = await axios.post(
      `/api/projects/remove-member`,
      data,
      config
    );
    commit("SET_LOADING", false);
    if (result.status === 200) {
      commit("REMOVE_MEMBER_FROM_PROJECT", data.user_id);
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

const addMembersToProject = async ({ commit }, data) => {
  commit("SET_SUBMITTING", true);
  try {
    const config = {
      headers: {
        Authorization: `Bearer ${VueCookie.get("access_token")}`
      }
    };
    const project_id = data.project.id;
    const members = [];
    data.members.map(item => members.push(item.id));

    const result = await axios.post(
      `/api/projects/add-member`,
      { project_id, members },
      config
    );

    commit("SET_SUBMITTING", false);
    if (result.status === 200) {
      commit("ADD_MEMBERS_TO_PROJECT", result.data.users);
      return { error: false };
    }
  } catch (error) {
    commit("SET_SUBMITTING", false);
    return {
      error: true,
      message: error.response
    };
  }
};

const changeProjectManager = async ({ commit }, data) => {
  commit("SET_SUBMITTING", true);
  try {
    const config = {
      headers: {
        Authorization: `Bearer ${VueCookie.get("access_token")}`
      }
    };
    const { id } = data.project;
    const manager_id = data.manager.id;
    const result = await axios.put(
      `/api/projects/${id}/change-manager`,
      { manager_id },
      config
    );

    commit("SET_SUBMITTING", false);
    if (result.status === 200) {
      commit("SET_PROJECT", result.data.project);
      return { error: false };
    }
  } catch (error) {
    commit("SET_SUBMITTING", false);
    return {
      error: true,
      message: error.response
    };
  }
};

const closeOrReopenProject = async ({ commit }, { data, projectId }) => {
  commit("SET_SUBMITTING", true);
  try {
    const config = {
      headers: {
        Authorization: `Bearer ${VueCookie.get("access_token")}`
      }
    };
    const result = await axios.put(
      `/api/projects/${projectId}/close-or-reopen`,
      data,
      config
    );
    commit("SET_SUBMITTING", false);
    if (result.status === 200) {
      commit("SET_PROJECT", result.data.project);
      return { error: false };
    }
  } catch (error) {
    commit("SET_SUBMITTING", false);
    console.log(error);

    return {
      error: true,
      message: error.response.data
    };
  }
};

const deleteProject = async ({ commit }, projectSelected) => {
  commit("SET_SUBMITTING", true);
  try {
    const config = {
      headers: {
        Authorization: "Bearer" + VueCookie.get("access_token")
      }
    };
    const { id } = projectSelected;
    const result = await axios.delete(`/api/projects/${id}`, config);
    commit("SET_SUBMITTING", false);
    if (result.status === 200) {
      return { error: false };
    }
  } catch (error) {
    commit("SET_SUBMITTING", false);
    return {
      error: true,
      message: error.response
    };
  }
};

export default {
  getProjects,
  getProjectsByManager,
  getProjectById,
  createProject,
  updateProject,
  updateDepartmentIdOfProject,
  updateProjectDuration,
  updateProjectQuickly,
  updateProjectStatus,
  removeMemberFromProject,
  addMembersToProject,
  changeProjectManager,
  closeOrReopenProject,
  deleteProject
};
