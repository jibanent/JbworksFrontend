const SET_PROJECT_STATS = (state, projectStats) => {
  state.projectStats = projectStats;
};

const SET_DEPARTMENT_STATS = (state, departmentStats) => {
  state.departmentStats = departmentStats;
};

const SET_TASK_STATS = (state, taskStats) => {
  state.taskStats = taskStats;
};

const SET_USER_STATS = (state, userStats) => {
  state.userStats = userStats;
};

const SET_EXCELLENT_MEMBER = (state, excellentMember) => {
  state.excellentMember = excellentMember;
};

const SET_TASK_STATS_BY_MEMBER = (state, taskStatsByMember) => {
  state.taskStatsByMember = taskStatsByMember;
};

const SET_MOST_TASKS_AHEAD = (state, mostTasksAhead) => {
  state.mostTasksAhead = mostTasksAhead;
};

const SET_TOP_DELAYED = (state, topDelayed) => {
  state.topDelayed = topDelayed;
};

const SET_TASK_STATS_BY_PROJECT = (state, taskStatsByProject) => {
  state.taskStatsByProject = taskStatsByProject;
};

const SET_TASK_STATS_BY_DEPARTMENT = (state, taskStatsByDepartment) => {
  state.taskStatsByDepartment = taskStatsByDepartment;
};

export default {
  SET_PROJECT_STATS,
  SET_DEPARTMENT_STATS,
  SET_TASK_STATS,
  SET_USER_STATS,
  SET_EXCELLENT_MEMBER,
  SET_TASK_STATS_BY_MEMBER,
  SET_MOST_TASKS_AHEAD,
  SET_TOP_DELAYED,
  SET_TASK_STATS_BY_PROJECT,
  SET_TASK_STATS_BY_DEPARTMENT
};
