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
  console.log(state.projects);
  const { projects } = state;

  if (projects && projects.data.length > 0) {
    const newProject = projects.data.map(project => {
      if (projectUpdated.id === project.id) {
        return { ...project, ...projectUpdated };
      } else {
        return { ...project };
      }
    });
    state.projects.data = newProject;
  }
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

const TOGGLE_ADD_MEMBERS_TO_PROJECT_DIALOG = (state, project = null) => {
  state.showAddMembersToProjectDialog = !state.showAddMembersToProjectDialog;
  if (project) state.projectMemberSelected = project;
};

const ADD_MEMBERS_TO_PROJECT = (state, users) => {
  state.projectParticipants = [...state.projectParticipants, ...users];
};

const TOGGLE_EDIT_PROJECT_MANAGER_DIALOG = (state, project = null) => {
  state.showEditProjectManagerDialog = !state.showEditProjectManagerDialog;
  if (project) state.projectMemberSelected = project;
};

const SET_PROJECT_MANAGER = (state, manager) => {
  state.manager = manager;
};

const SET_PROJECT_CLOSING_OR_REOPENING = (state, projectEditing = null) => {
   state.showCloseProjectDialog = !state.showCloseProjectDialog;
  if (projectEditing) state.projectEditing = projectEditing;
}

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
  REMOVE_MEMBER_FROM_PROJECT,
  TOGGLE_ADD_MEMBERS_TO_PROJECT_DIALOG,
  ADD_MEMBERS_TO_PROJECT,
  TOGGLE_EDIT_PROJECT_MANAGER_DIALOG,
  SET_PROJECT_MANAGER,
  SET_PROJECT_CLOSING_OR_REOPENING
};
