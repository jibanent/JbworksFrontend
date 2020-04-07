const SET_TASKS = (state, tasks) => {
 state.tasks = tasks;
}

const SET_TASK_DETAIL = (state, task) => {
  state.task = task
}

export default {
SET_TASKS,
SET_TASK_DETAIL
}
