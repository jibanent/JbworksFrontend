import axios from "../../plugins/axios";

const getDepartments = async ({ commit }) => {
  commit("SET_LOADING", true);
  try {
    const result = await axios.get("/api/departments"); // call api get all departments
    if (result.status === 200) {
      commit("SET_DEPARTMENTS", result.data.departments);
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
  getDepartments
};
