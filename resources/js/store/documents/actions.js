/**
  DOCUMENTS
 */

import axios from "../../plugins/axios";
import VueCookie from "vue-cookie";

const getDocuments = async ({ commit }, data = {}) => {
  commit("SET_LOADING", true);
  try {
    const config = {
      headers: {
        Authorization: `Bearer ${VueCookie.get("access_token")}`
      }
    };

    const { google_drive_folder_id } = data;
    const params = { google_drive_folder_id };

    const result = await axios.get("/api/drive", { params, ...config });
    commit("SET_LOADING", false);
    if (result.status === 200) {
      commit("SET_DOCUMENT", result.data);
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

const createNewFolder = async ({ commit, dispatch }, data) => {
  commit("SET_SUBMITTING", true);
  try {
    const config = {
      headers: { Authorization: `Bearer ${VueCookie.get("access_token")}` }
    };

    const result = await axios.post("/api/drive", data, config);

    commit("SET_SUBMITTING", false);
    if (result.status === 200) {
      dispatch("getDocuments", {
        google_drive_folder_id: result.data.data.dirname
      });
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

const uploadFile = async ({ commit, dispatch }, data) => {
  commit("SET_LOADING", true);
  console.log("data", data);
  try {
    let formData = new FormData();

    formData.append("basename", data.basename);
    if (data && data.basename) {
      formData.append("file", data.file);
    }
    const config = {
      headers: {
        "Content-Type": "multipart/form-data",
        Authorization: `Bearer ${VueCookie.get("access_token")}`
      }
    };

    const result = await axios.post("/api/drive/upload", formData, config);
    commit("SET_LOADING", false);
    console.log("upload", result);
    if (result.status === 200) {
      dispatch("getDocuments", { google_drive_folder_id: data.basename });
      return { error: false };
    }
  } catch (error) {
    console.log("error", error);
    commit("SET_LOADING", false);
    return {
      error: true,
      message: error.response
    };
  }
};

const deleteDocument = async ({ commit, dispatch }, data) => {
  console.log('deleteDocument', data)
  commit("SET_SUBMITTING", true);
  try {
    const config = {
      headers: {
        Authorization: "Bearer" + VueCookie.get("access_token")
      }
    };

    const result = await axios.delete(`/api/drive/${data.document.basename}`, config);
    commit("SET_SUBMITTING", false);

    if (result.status === 200) {
      dispatch("getDocuments", { google_drive_folder_id: data.project.google_drive_folder_id });
      commit('HIDE_DOCUMENT_ACTIONS_DIALOG')
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
  getDocuments,
  createNewFolder,
  uploadFile,
  deleteDocument
};
