import axios from "../../plugins/axios";
import VueCookie from "vue-cookie";

const getDepartments = async ({ commit }) => {
  commit("SET_LOADING", true);
  try {
    let config = {
      headers: {
        Authorization: "Bearer " + VueCookie.get("access_token")
      }
    };
    const result = await axios.get("/api/departments", config); // call api get all departments
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
