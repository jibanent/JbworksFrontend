/**
  TASKS ACTION
 */

import axios from "../../plugins/axios";
import VueCookie from "vue-cookie";

const getMyTasks = async ({ commit }, data = {}) => {
  commit("SET_LOADING", true);
  try {
    const config = {
      headers: {
        Authorization: "Bearer" + VueCookie.get("access_token")
      }
    };

    const params = {
      user: data.currentUserId,
      page: data.page,
      search: data.params.search,
      status: data.params.status,
      project: data.params.project,
      order: data.params.order
    };

    const promiseTasks = axios.get("/api/tasks", { params, ...config });

    const promiseMyActiveProjects = axios.get("/api/projects/active", {
      params: { manager: data.currentUserId },
      ...config
    });

    const promiseMyTasksStats = axios.get("/api/tasks/count/my-tasks", {
      params: { user: data.currentUserId },
      ...config
    });

    let [tasks, myActiveProjects, myTaskStats] = await Promise.all([
      promiseTasks,
      promiseMyActiveProjects,
      promiseMyTasksStats
    ]);

    commit("SET_LOADING", false);
    if (tasks.status === 200) {
      commit("SET_TASKS", tasks.data);
      commit("SET_MY_TASK_STATS", myTaskStats.data);
      commit("SET_MY_ACTIVE_PROJECTS", myActiveProjects.data);

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

const getTasksOfMyDepartment = async ({ commit }, data = {}) => {
  commit("SET_LOADING", true);
  try {
    const { currentUserId, routeName, page } = data;
    let { order, search, status, project, user } = data.params;
    const config = {
      headers: {
        Authorization: "Bearer" + VueCookie.get("access_token")
      }
    };

    const params = {
      manager: currentUserId,
      page,
      search,
      status,
      user,
      order
    };

    const promiseTasks = axios.get("/api/tasks/department", {
      params,
      ...config
    });

    const promiseMyActiveProjects = axios.get(
      `/api/projects/active?manager=${currentUserId}`,
      config
    );
    const promiseMyTasksStats = axios.get(
      `/api/tasks/count/my-tasks?user=${currentUserId}`,
      config
    );

    let [tasks, myActiveProjects, myTaskStats] = await Promise.all([
      promiseTasks,
      promiseMyActiveProjects,
      promiseMyTasksStats
    ]);

    commit("SET_LOADING", false);
    if (tasks.status === 200) {
      commit("SET_TASKS", tasks.data);
      commit("SET_MY_TASK_STATS", myTaskStats.data);
      commit("SET_MY_ACTIVE_PROJECTS", myActiveProjects.data);

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
      // const usersBelongProject = await axios.get(
      //   `/api/users/belong-to-projects?project=${taskDetail.data.task.project.id}`,
      //   config
      // );
      // commit("SET_USERS_BELONG_TO_PROJECT", usersBelongProject.data.users);
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

const getTasksByProject = async ({ commit }, data = {}) => {
  commit("SET_LOADING", true);

  try {
    const config = {
      headers: {
        Authorization: "Bearer" + VueCookie.get("access_token")
      }
    };

    const { order, search, status, start, end } = data.params;
    const { projectId, page } = data;
    const params = { page, order, search, status, start, end };

    const url = `/api/tasks/project/${data.projectId}`;

    const promiseTasks = axios.get(url, { params, ...config });

    const promiseProject = axios.get(`/api/projects/${projectId}`, config);

    let [tasks, project] = await Promise.all([promiseTasks, promiseProject]);

    commit("SET_LOADING", false);
    if (tasks.status === 200) {
      commit("SET_TASKS", tasks.data);
    }
    if (project.status === 200) {
      commit("SET_PROJECT", project.data.project);
      commit("SET_PROJECT_PARTICIPANTS", project.data.project.participants);
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

const createTask = async ({ commit, dispatch }, { data, route }) => {
  commit("SET_SUBMITTING", true);
  try {
    const config = {
      headers: {
        Authorization: `Bearer ${VueCookie.get("access_token")}`
      }
    };

    const result = await axios.post("/api/tasks", data, config);
    commit("SET_SUBMITTING", false);
    if (result.status === 200) {
      commit("ADD_NEW_TASK", result.data.task);
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

const updateTask = async (
  { commit, dispatch },
  { data, taskId, currentUser }
) => {
  commit("SET_SUBMITTING", true);
  try {
    const config = {
      headers: {
        Authorization: `Bearer ${VueCookie.get("access_token")}`
      }
    };

    const result = await axios.put(`/api/tasks/${taskId}`, data, config);
    commit("SET_SUBMITTING", false);
    if (result.status === 200) {
      commit("SET_TASK_DETAIL", result.data.task);
      commit("REPLACE_TASK_UPDATED", result.data.task);
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

const updateTaskName = async ({ commit }, data) => {
  commit("SET_UPDATING", true);
  try {
    const config = {
      headers: {
        Authorization: "Bearer" + VueCookie.get("access_token")
      }
    };
    const { id, name } = data;
    const result = await axios.put(
      `/api/tasks/update-task-name/${id}`,
      { name },
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

const updateTaskDescription = async ({ commit }, data) => {
  commit("SET_UPDATING", true);
  try {
    const config = {
      headers: {
        Authorization: "Bearer" + VueCookie.get("access_token")
      }
    };
    const { id, description } = data;
    const result = await axios.put(
      `/api/tasks/update-task-description/${id}`,
      { description },
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

const updateTaskDeadline = async ({ commit }, data) => {
  commit("SET_UPDATING", true);
  try {
    const config = {
      headers: {
        Authorization: "Bearer" + VueCookie.get("access_token")
      }
    };
    const { id, due_on } = data;
    const result = await axios.put(
      `/api/tasks/update-task-deadline/${id}`,
      { due_on },
      config
    );
    console.log("updateTaskDeadline", result);
    commit("SET_UPDATING", false);
    if (result.status === 200) {
      commit("REPLACE_TASK_UPDATED", result.data.task);
      commit("SET_TASK_DETAIL", result.data.task);
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

const updateTaskStartTime = async ({ commit }, data) => {
  commit("SET_UPDATING", true);
  try {
    const config = {
      headers: {
        Authorization: "Bearer" + VueCookie.get("access_token")
      }
    };
    const { id, start_date } = data;
    const result = await axios.put(
      `/api/tasks/update-task-start-time/${id}`,
      { start_date },
      config
    );
    commit("SET_UPDATING", false);
    if (result.status === 200) {
      commit("REPLACE_TASK_UPDATED", result.data.task);
      commit("SET_TASK_DETAIL", result.data.task);
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

const toggleUrgent = async ({ commit }, data) => {
  commit("SET_UPDATING", true);
  try {
    const config = {
      headers: {
        Authorization: "Bearer" + VueCookie.get("access_token")
      }
    };
    const { id, is_urgent } = data;
    const result = await axios.put(
      `/api/tasks/toggle-urgent/${id}`,
      { is_urgent },
      config
    );
    commit("SET_UPDATING", false);
    if (result.status === 200) {
      commit("REPLACE_TASK_UPDATED", result.data.task);
      commit("SET_TASK_DETAIL", result.data.task);
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

const toggleImportant = async ({ commit }, data) => {
  commit("SET_UPDATING", true);
  try {
    const config = {
      headers: {
        Authorization: "Bearer" + VueCookie.get("access_token")
      }
    };
    const { id, is_important } = data;
    const result = await axios.put(
      `/api/tasks/toggle-important/${id}`,
      { is_important },
      config
    );
    commit("SET_UPDATING", false);
    if (result.status === 200) {
      commit("REPLACE_TASK_UPDATED", result.data.task);
      commit("SET_TASK_DETAIL", result.data.task);
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

const toggleMarkStar = async ({ commit }, data) => {
  commit("SET_UPDATING", true);
  try {
    const config = {
      headers: {
        Authorization: "Bearer" + VueCookie.get("access_token")
      }
    };
    const { id, mark_star } = data;
    const result = await axios.put(
      `/api/tasks/toggle-mark-star/${id}`,
      { mark_star },
      config
    );
    commit("SET_UPDATING", false);
    if (result.status === 200) {
      commit("REPLACE_TASK_UPDATED", result.data.task);
      commit("SET_TASK_DETAIL", result.data.task);
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

const deleteTask = async ({ commit }, taskSelected) => {
  commit("SET_SUBMITTING", true);
  try {
    const config = {
      headers: {
        Authorization: "Bearer" + VueCookie.get("access_token")
      }
    };
    const { id } = taskSelected;
    const result = await axios.delete(`/api/tasks/${id}`, config);
    commit("SET_SUBMITTING", false);
    if (result.status === 200) {
      commit("DELETE_TASK", taskSelected);
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
  getMyTasks,
  getTasksOfMyDepartment,
  getTaskDetail,
  getTasksByProject,
  updateTaskStatus,
  updateAssignedTo,
  updateTaskResult,
  createTask,
  updateTask,
  updateTaskName,
  updateTaskDeadline,
  updateTaskStartTime,
  toggleUrgent,
  toggleImportant,
  toggleMarkStar,
  deleteTask,
  updateTaskDescription
};
