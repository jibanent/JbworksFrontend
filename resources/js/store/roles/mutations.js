const SET_ROLES = (state, roles) => {
  state.roles = roles;
};

const SET_ACCESS_CONTROL_LIST = (state, data) => {
  state.accessControlList = {
    roles: data.roles,
    permissions: data.permissions
  };
};

export default {
  SET_ROLES,
  SET_ACCESS_CONTROL_LIST
};
