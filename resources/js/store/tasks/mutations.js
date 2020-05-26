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
  state.myActiveProjects = projects;
};

const TOGGLE_TASK_ASSIGNMENT_DIALOG = state => {
  state.showTaskAssignmentDialog = !state.showTaskAssignmentDialog;
};

const TOGGLE_ADD_TASK_DIALOG = state => {
  state.showAddTaskDialog = !state.showAddTaskDialog;
};

const REPLACE_TASK_UPDATED = (state, taskUpdated) => {
  var { tasks } = state;
  const newTasks = tasks.map(item => {
    return {
      from: item.from,
      to: item.to,
      value: item.value.map(task => {
        if (task.id === taskUpdated.id) {
          return { ...task, ...taskUpdated };
        } else {
          return { ...task };
        }
      })
    };
  });
  state.tasks = newTasks;
};

const TOGGLE_TASK_ACTION_OPTION_DIALOG = state => {
  state.showTaskActionOptionsDialog = !state.showTaskActionOptionsDialog;
};

const TOGGLE_EDIT_TASK_DIALOG = state => {
  state.showEditTaskDialog = !state.showEditTaskDialog;
};

const TOGGLE_MY_MEMBERS_DIALOG = state => {
  state.showMyMembersDialog = !state.showMyMembersDialog;
};

const TOGGLE_EDIT_TASK_DEADLINE = state => {
  state.showEditTaskDeadline = !state.showEditTaskDeadline;
};

const SET_COORDINATES_SHOW_EDIT_TASK_DEADLINE = (state, coordinates) => {
  state.coordinatesShowEditTaskDeadline = coordinates;
};

const TOGGLE_EDIT_TASK_START_TIME = state => {
  state.showEditTaskStartTime = !state.showEditTaskStartTime;
};

const SET_COORDINATES_SHOW_EDIT_TASK_START_TIME = (state, coordinates) => {
  state.coordinatesShowEditTaskStartTime = coordinates;
};

const SET_TASK_EDITING = (state, taskEditing) => {
  state.taskEditing = taskEditing;
};

const TOGGLE_CONFIRM_DELETE_TASK = state => {
  state.showConfirmDeleteTask = !state.showConfirmDeleteTask;
};

const DELETE_TASK = (state, taskDeleted) => {
  var { tasks } = state;
  const newTasks = tasks.map(item => {
    return {
      from: item.from,
      to: item.to,
      value: item.value.filter(task => {
        return task.id !== taskDeleted.id;
      })
    };
  });
  state.tasks = newTasks;
};

export default {
  SET_TASKS,
  SET_TASK_DETAIL,
  SET_MY_TASK_STATS,
  TOGGLE_DIALOG_SELECT_PROJECT,
  SET_MY_ACTIVE_PROJECTS,
  TOGGLE_TASK_ASSIGNMENT_DIALOG,
  REPLACE_TASK_UPDATED,
  TOGGLE_ADD_TASK_DIALOG,
  TOGGLE_TASK_ACTION_OPTION_DIALOG,
  TOGGLE_EDIT_TASK_DIALOG,
  TOGGLE_MY_MEMBERS_DIALOG,
  TOGGLE_EDIT_TASK_DEADLINE,
  SET_COORDINATES_SHOW_EDIT_TASK_DEADLINE,
  SET_TASK_EDITING,
  TOGGLE_EDIT_TASK_START_TIME,
  SET_COORDINATES_SHOW_EDIT_TASK_START_TIME,
  TOGGLE_CONFIRM_DELETE_TASK,
  DELETE_TASK
};
