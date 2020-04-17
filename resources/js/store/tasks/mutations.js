const SET_TASKS = (state, tasks) => {
  state.tasks = tasks;
};

const SET_MY_TASK_STATS = (state, stats) => {
  state.myTotalTask = stats.total_task;
  state.myCompletedTask = stats.completed_task;
};

const SET_TASK_DETAIL = (state, task) => {
  state.task = task;
};

const TOGGLE_DIALOG_SELECT_PROJECT = state => {
  state.showDialogSelectProject = !state.showDialogSelectProject;
};

const SET_MY_ACTIVE_PROJECTS = (state, projects) => {
  state.myActiveProjects = projects
}

export default {
  SET_TASKS,
  SET_TASK_DETAIL,
  SET_MY_TASK_STATS,
  TOGGLE_DIALOG_SELECT_PROJECT,
  SET_MY_ACTIVE_PROJECTS
};
