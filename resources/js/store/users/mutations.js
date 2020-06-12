/** =================================================================================
    USERS MUTATIONS
  =================================================================================*/

const SET_USERS = (state, users) => {
  state.users = users;
};

const SET_MY_MEMBERS = (state, myMembers) => {
  state.myMembers = myMembers;
};

const SET_USERS_BELONG_TO_PROJECT = (state, usersBelongToProject) => {
  state.usersBelongToProject = usersBelongToProject;
};

const TOGGLE_ADD_USER_DIALOG = state => {
  state.showAddUserDialog = !state.showAddUserDialog;
};

const SET_MY_PROFILE = (state, myProfile) => {
  state.myProfile = myProfile;
};

const TOGGLE_EDIT_USER_DIALOG = state => {
  state.showEditUserDialog = !state.showEditUserDialog;
}

export default {
  SET_USERS,
  SET_MY_MEMBERS,
  SET_USERS_BELONG_TO_PROJECT,
  TOGGLE_ADD_USER_DIALOG,
  SET_MY_PROFILE,
  TOGGLE_EDIT_USER_DIALOG
};
