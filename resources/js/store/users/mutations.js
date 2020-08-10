/** =================================================================================
    USERS MUTATIONS
  =================================================================================*/

const SET_USERS = (state, users) => {
  state.users = users;
};

const SET_USER = (state, user) => {
  state.user = user;
};

const SET_USERS_BELONG_TO_PROJECT = (state, usersBelongToProject) => {
  state.usersBelongToProject = usersBelongToProject;
};

const TOGGLE_ADD_USER_DIALOG = state => {
  state.showAddUserDialog = !state.showAddUserDialog;
};

const TOGGLE_EDIT_USER_DIALOG = state => {
  state.showEditUserDialog = !state.showEditUserDialog;
};

const ADD_NEW_USER = (state, user) => {
  const { data } = state.users;
  data.unshift(user);
  state.users.data = data;
};

const UPDATE_USER = (state, user) => {
  var users = state.users.data;
  const newUser = users.map(item => {
    if (item.id === user.id) {
      return { ...item, ...user };
    } else {
      return { ...item };
    }
  });

  state.users.data = newUser;
};

const TOGGLE_CONFIRM_DELETE_USER = state => {
  state.showConfirmDeleteUser = !state.showConfirmDeleteUser;
};

const DELETE_USER = (state, user) => {
  var users = state.users.data;
  const newUsers = users.filter(item => {
    return item.id !== user.id;
  });
  state.users.data = newUsers;
};

const TOGGLE_IMPORT_USERS_DIALOG = state => {
  state.showImportUserDialog = !state.showImportUserDialog;
}

export default {
  SET_USERS,
  SET_USERS_BELONG_TO_PROJECT,
  TOGGLE_ADD_USER_DIALOG,
  ADD_NEW_USER,
  SET_USER,
  TOGGLE_EDIT_USER_DIALOG,
  UPDATE_USER,
  TOGGLE_CONFIRM_DELETE_USER,
  DELETE_USER,
  TOGGLE_IMPORT_USERS_DIALOG
};
