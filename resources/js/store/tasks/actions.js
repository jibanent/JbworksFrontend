/**
  TASKS ACTION
 */

import axios from "../../plugins/axios";

const getTasks = async (
  { commit },
  { currentUserId = null, routeName = "tasks" }
) => {
  commit("SET_LOADING", true);
  try {
    let result;
    if (routeName === "tasks") {
      result = await axios.get(`/api/tasks/`, {
        params: { user: currentUserId },
      });
    }

    if (routeName === "tasks-department") {
      result = await axios.get(`/api/tasks/department`, {
        params: { manager: currentUserId },
      });
    }

    if (result.status === 200) {
      commit("SET_TASKS", result.data.tasks);
      commit("SET_LOADING", false);
      return { error: false };
    }
  } catch (error) {
    commit("SET_LOADING", false);
    return {
      error: true,
      message: error.response,
    };
  }
};

const getTaskDetail = async ({ commit }, { taskId }) => {
  commit("SET_LOADING", true);
  try {
    const result = await axios.get(`/api/tasks/show/${taskId}`);
    console.log("getTaskDetail", result);

    commit("SET_LOADING", false);
    if (result.status === 200) {
      commit("SET_TASK_DETAIL", result.data.task);
      return { error: false };
    }
  } catch (error) {
    commit("SET_LOADING", false);
    return {
      error: true,
      message: error.response,
    };
  }
};

export default {
  getTasks,
  getTaskDetail,
};
