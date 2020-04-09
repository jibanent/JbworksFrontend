/** =================================================================================
    USERS MUTATIONS
  =================================================================================*/

const SET_USERS = (state, users) => {
  state.users = users
}

const SET_MY_MEMBERS = (state, myMembers) => {
  state.myMembers = myMembers;
};

export default {
  SET_USERS,
  SET_MY_MEMBERS,
};
