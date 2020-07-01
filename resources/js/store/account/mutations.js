/** =================================================================================
    ACCOUNT MUTATIONS
  =================================================================================*/

const TOGGLE_EDIT_MY_PROFILE_DIALOG = state => {
  state.showEditMyProfileDialog = !state.showEditMyProfileDialog;
}

const TOGGLE_CHANGE_PASSWORD_DIALOG = state => {
  state.showChangePassword = !state.showChangePassword
}

export default {
  TOGGLE_EDIT_MY_PROFILE_DIALOG,
  TOGGLE_CHANGE_PASSWORD_DIALOG
};
