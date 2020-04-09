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

export default {
  SET_TASKS,
  SET_TASK_DETAIL,
  SET_MY_TASK_STATS
};
