/**
  TASKS ACTION
 */

import axios from "../../plugins/axios";

/**
  Get tasks
  @param currentUserId
  @param type
 */
const getTasks = async (
  { commit },
  { currentUserId = null, routeName = "tasks" }
) => {
  commit("SET_LOADING", true);
  try {
    console.log(currentUserId, routeName);
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

    console.log("getTasks", result.data.tasks);

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

export default {
  getTasks,
};
