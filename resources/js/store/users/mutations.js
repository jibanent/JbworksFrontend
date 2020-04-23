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

export default {
  SET_USERS,
  SET_MY_MEMBERS,
  SET_USERS_BELONG_TO_PROJECT
};
