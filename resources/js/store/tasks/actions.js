/**
  TASKS ACTION
 */

import axios from "../../plugins/axios";
import VueCookie from "vue-cookie";

const getTasks = async (
  { commit },
  { currentUserId = null, routeName = "tasks" }
) => {
  commit("SET_LOADING", true);
  try {
    let url;
    const config = {
      headers: {
        Authorization: "Bearer" + VueCookie.get("access_token")
      }
    };

    if (routeName === "tasks") {
      url = `/api/tasks?user=${currentUserId}`; // api get my tasks
    }

    if (routeName === "tasks-department") {
      url = `/api/tasks/department?manager=${currentUserId}`; // api get tasks that I manager
    }

    const result = await axios.get(url, config);

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
    const config = {
      headers: {
        Authorization: "Bearer" + VueCookie.get("access_token")
      }
    };
    const taskDetail = await axios.get(`/api/tasks/show/${taskId}`, config);

    commit("SET_LOADING", false);
    if (taskDetail.status === 200) {
      commit("SET_TASK_DETAIL", taskDetail.data.task);

      const usersBelongProject = await axios.get(
        `/api/users/belong-to-projects?project=${taskDetail.data.task.project.id}`,
        config
      );

      commit("SET_USERS_BELONG_TO_PROJECT", usersBelongProject.data.users);
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

const getTasksByProject = async ({ commit }, projectId) => {
  commit("SET_LOADING", true);
  console.log("projectId", projectId);

  try {
    const config = {
      headers: {
        Authorization: "Bearer" + VueCookie.get("access_token")
      }
    };
    const promiseTasks = axios.get(`/api/tasks/project/${projectId}`, config);
    const promiseProject = axios.get(`/api/projects/${projectId}`, config);

    let [tasks, project] = await Promise.all([promiseTasks, promiseProject]);

    console.log("project", project);

    commit("SET_LOADING", false);
    if (tasks.status === 200) {
      commit("SET_TASKS_BY_PROJECT", tasks.data.tasks);
    }
    if (project.status === 200) {
      commit("SET_PROJECT", project.data.project);
    }

    return { error: false };
  } catch (error) {
    commit("SET_LOADING", false);
    return {
      error: true,
      message: error.response
    };
  }
};

const updateTaskStatus = async ({ commit }, { taskId, status }) => {
  commit("SET_UPDATING", true);
  try {
    const config = {
      headers: {
        Authorization: "Bearer" + VueCookie.get("access_token")
      }
    };
    const result = await axios.put(
      `/api/tasks/update-status/${taskId}`,
      { status },
      config
    );
    commit("SET_UPDATING", false);
    if (result.status === 200) {
      commit("SET_TASK_DETAIL", result.data.task);
      commit("REPLACE_TASK_UPDATED", result.data.task);
      return { error: false };
    }
  } catch (error) {
    commit("SET_UPDATING", false);
    return {
      error: true,
      message: error.response
    };
  }
};

const updateAssignedTo = async ({ commit }, { taskId, assignedTo }) => {
  commit("SET_UPDATING", true);
  try {
    const config = {
      headers: {
        Authorization: "Bearer" + VueCookie.get("access_token")
      }
    };
    const result = await axios.put(
      `/api/tasks/update-assigned-to/${taskId}`,
      { assignedTo },
      config
    );
    commit("SET_UPDATING", false);
    if (result.status === 200) {
      commit("SET_TASK_DETAIL", result.data.task);
      commit("REPLACE_TASK_UPDATED", result.data.task);
      commit("TOGGLE_TASK_ASSIGNMENT_DIALOG");
      return { error: false };
    }
  } catch (error) {
    commit("SET_UPDATING", false);
    return {
      error: true,
      message: error.response
    };
  }
};

const updateTaskResult = async ({ commit }, { taskId, data }) => {
  commit("SET_UPDATING", true);
  try {
    const { percentComplete, result } = data;
    const config = {
      headers: {
        Authorization: "Bearer" + VueCookie.get("access_token")
      }
    };
    const updateTaskResult = await axios.put(
      `/api/tasks/update-task-results/${taskId}`,
      {
        percentComplete,
        result
      },
      config
    );
    commit("SET_UPDATING", false);
    if (updateTaskResult.status === 200) {
      commit("SET_TASK_DETAIL", updateTaskResult.data.task);
      commit("REPLACE_TASK_UPDATED", updateTaskResult.data.task);
      return { error: false };
    }
  } catch (error) {
    commit("SET_UPDATING", false);
    return {
      error: true,
      message: error.response
    };
  }
};

export default {
  getTasks,
  getTaskDetail,
  getTasksByProject,
  updateTaskStatus,
  updateAssignedTo,
  updateTaskResult
};
