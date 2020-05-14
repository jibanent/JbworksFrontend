import axios from "../../plugins/axios";
import VueCookie from "vue-cookie";

const getRoles = async ({commit}) => {
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
}

export default {
  getRoles
}
