import axios from "../../plugins/axios";
import VueCookie from "vue-cookie";

const getDepartments = async ({ commit }, data = {}) => {
  commit("SET_LOADING", true);
  try {
    const config = {
      headers: {
        Authorization: "Bearer " + VueCookie.get("access_token")
      }
    };
    const { search } = data;

    const params = { search };
    const result = await axios.get("/api/departments", { params, ...config }); // call api get all departments
    if (result.status === 200) {
      commit("SET_DEPARTMENTS", result.data);
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

const getMyDepartments = async ({ commit }, currentUserId) => {
  try {
    let config = {
      headers: {
        Authorization: "Bearer " + VueCookie.get("access_token")
      }
    };
    const params = { manager: currentUserId };
    const result = await axios.get("/api/departments/my-departments", {
      params,
      ...config
    });

    if (result.status === 200) {
      commit("SET_DEPARTMENTS", result.data);
      return { error: false };
    }
  } catch (error) {
    return {
      error: true,
      message: error.response
    };
  }
};

const getDepartment = async ({ commit }, id) => {
  try {
    const config = {
      headers: {
        Authorization: "Bearer " + VueCookie.get("access_token")
      }
    };

    const result = await axios.get(`/api/departments/show/${id}`, config);
    if (result.status === 200) {
      commit("SET_DEPARTMENT", result.data.data);
      return { error: false };
    }
  } catch (error) {
    return {
      error: true,
      message: error.response
    };
  }
};

const createDepartment = async ({ commit, dispatch }, data) => {
  commit("SET_SUBMITTING", true);
  try {
    const config = {
      headers: { Authorization: `Bearer ${VueCookie.get("access_token")}` }
    };

    const result = await axios.post("/api/departments", data, config);

    commit("SET_SUBMITTING", false);

    if (result.status === 200) {
      commit("ADD_NEW_DEPARTMENT", result.data.data);
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

const updateDepartment = async ({ commit, dispatch }, { data, id }) => {
  commit("SET_SUBMITTING", true);
  try {
    const config = {
      headers: { Authorization: `Bearer ${VueCookie.get("access_token")}` }
    };

    const result = await axios.put(`/api/departments/${id}`, data, config);

    commit("SET_SUBMITTING", false);

    if (result.status === 200) {
      commit("REPLACE_DEPARTMENT_UPDATED", result.data.data);
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

const deleteDepartment = async ({ commit }, department) => {
  commit("SET_SUBMITTING", true);
  try {
    const config = {
      headers: {
        Authorization: "Bearer" + VueCookie.get("access_token")
      }
    };
    const { id } = department;
    const result = await axios.delete(`/api/departments/${id}`, config);
    commit("SET_SUBMITTING", false);
    if (result.status === 200) {
      if (result.data.status === "success") {
        commit("DELETE_DEPARTMENT", department);
        return { error: false, status: "success" };
      }
      if (result.data.status === "warning") {
        return { error: false, status: "warning" };
      }
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
  getDepartments,
  getMyDepartments,
  createDepartment,
  getDepartment,
  updateDepartment,
  deleteDepartment
};
