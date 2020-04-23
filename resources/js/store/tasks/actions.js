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
    let url;
    if (routeName === "tasks") {
      url = `/api/tasks?user=${currentUserId}`; // api get my tasks
    }

    if (routeName === "tasks-department") {
      url = `/api/tasks/department?manager=${currentUserId}`; // api get tasks that I manager
    }

    const result = await axios.get(url);

    if (result.status === 200) {
      commit("SET_TASKS", result.data.tasks);
      commit("SET_MY_TASK_STATS", result.data.stats);
      commit("SET_MY_ACTIVE_PROJECTS", result.data.projects);
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

const getTaskDetail = async ({ commit }, { taskId }) => {
  commit("SET_LOADING", true);
  try {
    const taskDetail = await axios.get(`/api/tasks/show/${taskId}`);
    console.log("getTaskDetail", taskDetail);

    commit("SET_LOADING", false);
    if (taskDetail.status === 200) {
      commit("SET_TASK_DETAIL", taskDetail.data.task);

      const usersBelongProject = await axios.get(
        `/api/users/belong-to-projects?project=${taskDetail.data.task.project.id}`
      );

      commit("SET_USERS_BELONG_TO_PROJECT", usersBelongProject.data.users)
      console.log("usersBelongProject", usersBelongProject);
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
  getTasks,
  getTaskDetail
};
