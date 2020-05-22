import axios from "../../plugins/axios";
import VueCookie from "vue-cookie";

const getRoles = async ({ commit }) => {
  try {
    let config = {
      headers: {
        Authorization: "Bearer " + VueCookie.get("access_token")
      }
    };
    const result = await axios.get("/api/roles", config); // call api get all roles
    if (result.status === 200) {
      commit("SET_ROLES", result.data.roles);
      return { error: false };
    }
  } catch (error) {
    return {
      error: true,
      message: error.response
    };
  }
};

const getAccessControlList = async ({ commit }) => {
  commit('SET_LOADING', true)
  try {
    let config = {
      headers: {
        Authorization: "Bearer " + VueCookie.get("access_token")
      }
    };
    const result = await axios.get("/api/roles/acl", config);
    commit('SET_LOADING', false)
    if (result.status === 200) {
      commit("SET_ACCESS_CONTROL_LIST", result.data);
      return { error: false };
    }
  } catch (error) {
    commit('SET_LOADING', false)
    return {
      error: true,
      message: error.response
    };
  }
};

const giveOrRevokePermission = async ({ commit, dispatch }, data) => {
  try {
    let config = {
      headers: {
        Authorization: "Bearer " + VueCookie.get("access_token")
      }
    };
    const result = await axios.put("/api/roles/give-or-revoke-permission", data, config);

    if (result.status === 200) {
      dispatch("getAccessControlList");
      return { error: false };
    }
  } catch (error) {
    return {
      error: true,
      message: error.response
    };
  }
};

export default {
  getRoles,
  getAccessControlList,
  giveOrRevokePermission
};
