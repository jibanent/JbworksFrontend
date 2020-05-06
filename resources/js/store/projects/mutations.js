const SET_PROJECTS = (state, projects) => {
  state.projects = projects;
};

const SET_PROJECT = (state, project) => {
  state.project = project;
}

const TOGGLE_PROJECT_ADD = state => {
  state.showProjectAdd = !state.showProjectAdd;
}

export default {
  SET_PROJECTS,
  SET_PROJECT,
  TOGGLE_PROJECT_ADD
};
