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
      commit("SET_DEPARTMENTS", result.data.data);
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
      commit("SET_DEPARTMENTS", result.data.departments);
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
      headers: {
        Authorization: `Bearer ${VueCookie.get("access_token")}`
      }
    };

    const result = await axios.post("/api/departments", data, config);

    commit("SET_SUBMITTING", false);

    if (result.status === 200) {
      dispatch("getDepartments");
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
  getDepartments,
  getMyDepartments,
  createDepartment
};
