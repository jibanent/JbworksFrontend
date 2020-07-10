/** =================================================================================
    USERS MUTATIONS
  =================================================================================*/

const SET_USERS = (state, users) => {
  state.users = users;
};

const SET_USERS_BELONG_TO_PROJECT = (state, usersBelongToProject) => {
  state.usersBelongToProject = usersBelongToProject;
};

const TOGGLE_ADD_USER_DIALOG = state => {
  state.showAddUserDialog = !state.showAddUserDialog;
};

const ADD_NEW_USER = (state, user) => {
  const { data } = state.users;
  data.unshift(user);
  state.users.data = data;
}


export default {
  SET_USERS,
  SET_USERS_BELONG_TO_PROJECT,
  TOGGLE_ADD_USER_DIALOG,
  ADD_NEW_USER
};
