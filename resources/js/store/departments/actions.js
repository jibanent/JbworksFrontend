import axios from "../../plugins/axios";
import VueCookie from "vue-cookie";

const getDepartments = async ({ commit }, data = {}) => {
  console.log("getDepartments", data);

  commit("SET_LOADING", true);
  try {
    const config = {
      headers: {
        Authorization: "Bearer " + VueCookie.get("access_token")
      }
    };
    const { search } = data;
    console.log("search", search);

    const params = { search };
    const result = await axios.get("/api/departments", { params, ...config }); // call api get all departments
    console.log("result", result);
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
  // commit("SET_LOADING", true);
  try {
    let config = {
      headers: {
        Authorization: "Bearer " + VueCookie.get("access_token")
      }
    };
    const result = await axios.get(
      `/api/departments/my-departments?manager=${currentUserId}`,
      config
    ); // call api get my departments
    console.log("getMyDepartments", result);

    if (result.status === 200) {
      commit("SET_DEPARTMENTS", result.data.departments);
      // commit("SET_LOADING", false);
      return { error: false };
    }
  } catch (error) {
    // commit("SET_LOADING", false);
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
