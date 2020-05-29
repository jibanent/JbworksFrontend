const SET_NOTIFICATIONS = (state, notifications) => {
  state.notifications = notifications;
};

const TOGGLE_NOTIFICATIONS = state => {
  state.showNotifications = !state.showNotifications;
}

export default {
  SET_NOTIFICATIONS,
  TOGGLE_NOTIFICATIONS
};
