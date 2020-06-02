const SET_PROJECTS = (state, projects) => {
  state.projects = projects;
};

const SET_PROJECT = (state, project) => {
  state.project = project;
};

const TOGGLE_PROJECT_ADD = state => {
  state.showProjectAdd = !state.showProjectAdd;
};

const TOGGLE_EDIT_PROJECT_DURATION_DIALOG = state => {
  state.showProjectDurationDialog = !state.showProjectDurationDialog;
};

const SET_PROJECT_EDITING = (state, projectEditing = null) => {
  state.showEditProjectDialog = !state.showEditProjectDialog;
  if (projectEditing) state.projectEditing = projectEditing;
};

const REPLACE_PROJECT_UPDATED = (state, projectUpdated) => {
  const newProject = state.projects.map(project => {
    if (projectUpdated.id === project.id) {
      return { ...project, ...projectUpdated };
    } else {
      return { ...project };
    }
  });
  state.projects = newProject;
};

const SET_PROJECT_STATUS_EDITING = (state, projectEditing = null) => {
  state.showEditProjectStatusDialog = !state.showEditProjectStatusDialog;
  if (projectEditing) state.projectEditing = projectEditing;
};

export default {
  SET_PROJECTS,
  SET_PROJECT,
  TOGGLE_PROJECT_ADD,
  TOGGLE_EDIT_PROJECT_DURATION_DIALOG,
  SET_PROJECT_EDITING,
  REPLACE_PROJECT_UPDATED,
  SET_PROJECT_STATUS_EDITING
};
