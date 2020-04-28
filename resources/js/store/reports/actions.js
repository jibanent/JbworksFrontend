import axios from "../../plugins/axios";

const getReports = async ({ commit, dispatch }, query) => {
  commit("SET_LOADING", true);
  console.log("getReports query", query);

  try {
    const promiseProjectStats = axios.get(`/api/reports/project-stats`, {
      params: query
    });

    console.log('promiseProjectStats', promiseProjectStats);

    const promiseDepartmentStats = axios.get(`/api/reports/department-stats`);
    const promiseTaskStats = axios.get(`/api/reports/task-stats`, {
      params: query
    });
    const promiseUserStats = axios.get(`/api/reports/user-stats`, {
      params: query
    });

    const promiseExcellentMember = axios.get(`/api/reports/excellent-member`, {
      params: query
    });

    const promiseTaskStatsByMember = axios.get(
      `/api/reports/task-stats-by-member`,
      {
        params: query
      }
    );
    const promiseMostTasksAhead = axios.get(`/api/reports/most-tasks-ahead`, {
      params: query
    });

    const promiseTopDelayed = axios.get(`/api/reports/top-delayed`, {
      params: query
    });

    const promiseTaskStatsByProject = axios.get(
      `/api/reports/task-stats-by-project`,
      {
        params: query
      }
    );

    const promiseTaskStatsByDepartment = axios.get(
      `/api/reports/task-stats-by-department`,
      {
        params: query
      }
    );

    const promiseTaskStatsByDate = axios.get(
      `/api/reports/task-stats-by-date`,
      {
        params: query
      }
    );

    const promiseTaskStatsByWeek = axios.get(
      `/api/reports/task-stats-by-week`,
      {
        params: query
      }
    );

    let [
      projectStats,
      departmentStats,
      taskStats,
      userStats,
      excellentMember,
      taskStatsByMember,
      mostTasksAhead,
      topDelayed,
      taskStatsByProject,
      taskStatsByDepartment,
      taskStatsByDate,
      taskStatsByWeek
    ] = await Promise.all([
      promiseProjectStats,
      promiseDepartmentStats,
      promiseTaskStats,
      promiseUserStats,
      promiseExcellentMember,
      promiseTaskStatsByMember,
      promiseMostTasksAhead,
      promiseTopDelayed,
      promiseTaskStatsByProject,
      promiseTaskStatsByDepartment,
      promiseTaskStatsByDate,
      promiseTaskStatsByWeek
    ]);

    console.log('taskStatsByWeek', taskStatsByWeek);


    if (projectStats.status === 200) {
      commit("SET_PROJECT_STATS", projectStats.data.stats);
    }

    if (departmentStats.status === 200) {
      commit("SET_DEPARTMENT_STATS", departmentStats.data.stats);
    }

    if (taskStats.status === 200) {
      commit("SET_TASK_STATS", taskStats.data.stats);
    }

    if (userStats.status === 200) {
      commit("SET_USER_STATS", userStats.data.stats);
    }

    if (excellentMember.status === 200) {
      commit("SET_EXCELLENT_MEMBER", excellentMember.data.excellent_member);
    }

    if (taskStatsByMember.status === 200) {
      commit("SET_TASK_STATS_BY_MEMBER", taskStatsByMember.data.stats);
    }

    if (mostTasksAhead.status === 200) {
      commit("SET_MOST_TASKS_AHEAD", mostTasksAhead.data.stats);
    }

    if (topDelayed.status === 200) {
      commit("SET_TOP_DELAYED", topDelayed.data.stats);
    }

    if (taskStatsByProject.status === 200){
      commit("SET_TASK_STATS_BY_PROJECT", taskStatsByProject.data.stats);
    }

    if (taskStatsByDepartment.status === 200) {
      commit("SET_TASK_STATS_BY_DEPARTMENT", taskStatsByDepartment.data.stats);
    }

    if(taskStatsByDate.status === 200) {
      commit("SET_TASK_STATS_BY_DATE", taskStatsByDate.data.stats)
    }

    if(taskStatsByWeek.status === 200) {
      commit("SET_TASK_STATS_BY_WEEK", taskStatsByWeek.data.stats)
    }
    commit("SET_LOADING", false);
    return {
      error: false
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
  getReports
};
