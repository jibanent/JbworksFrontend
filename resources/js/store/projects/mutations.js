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

const TOGGLE_PROJECT_MEMBER_ACTIONS = state => {
  state.showProjectMemberActions = !state.showProjectMemberActions;
};

const SET_PROJECT_MEMBER_SELECTED = (
  state,
  { project, member, coordinates }
) => {
  state.projectMemberSelected = { project, member };
  state.coordinatesShowProjectMemberActions = coordinates;
};

const SET_PROJECT_PARTICIPANTS = (state, projectParticipants) => {
  state.projectParticipants = projectParticipants;
};

const REMOVE_MEMBER_FROM_PROJECT = (state, memberIdDeleted) => {
  console.log("data.memberIdDeleted", memberIdDeleted);
  const { projectParticipants } = state;
  state.projectParticipants = projectParticipants.filter(item => {
    return item.id !== memberIdDeleted;
  });
};

export default {
  SET_PROJECTS,
  SET_PROJECT,
  TOGGLE_PROJECT_ADD,
  TOGGLE_EDIT_PROJECT_DURATION_DIALOG,
  SET_PROJECT_EDITING,
  REPLACE_PROJECT_UPDATED,
  SET_PROJECT_STATUS_EDITING,
  TOGGLE_PROJECT_MEMBER_ACTIONS,
  SET_PROJECT_MEMBER_SELECTED,
  SET_PROJECT_PARTICIPANTS,
  REMOVE_MEMBER_FROM_PROJECT
};
