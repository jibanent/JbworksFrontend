import axios from "../../plugins/axios";
import VueCookie from "vue-cookie";

const updateMyProfile = async ({ commit }, data) => {
  commit("SET_SUBMITTING", true);
  try {
    let bodyFormData = new FormData();

    bodyFormData.append("name", data.name);
    bodyFormData.append("position", data.position);
    bodyFormData.append("birthday", data.birthday);
    bodyFormData.append("phone", data.phone);
    bodyFormData.append("address", data.address);
    bodyFormData.append("_method", "PUT");

    if (data && data.avatar) {
      bodyFormData.append("avatar", data.avatar);
    }

    const config = {
      headers: {
        "Content-Type": "multipart/form-data",
        Authorization: `Bearer ${VueCookie.get("access_token")}`
      }
    };

    const result = await axios.post(
      "/api/users/update-profile",
      bodyFormData,
      config
    );

    commit("SET_SUBMITTING", false);
    if (result.status === 200) {
      commit("SET_LOGIN_INFO", result.data.user);
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

const changePassword = async ({ commit }, data) => {
  commit("SET_SUBMITTING", true);
  try {
    const config = {
      headers: {
        Authorization: `Bearer ${VueCookie.get("access_token")}`
      }
    };

    const result = await axios.put("/api/users/change-password", data, config);
    console.log('change password', result);

    commit("SET_SUBMITTING", false);
    if (result.status === 200) {
      commit("SET_LOGIN_INFO", result.data.user);
      return { error: false };
    }
  } catch (error) {
    console.log(error.response);

    commit("SET_SUBMITTING", false);
    return {
      error: true,
      message: error.response.data
    };
  }
};

export default {
  updateMyProfile,
  changePassword
};
