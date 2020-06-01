const SET_NOTIFICATIONS = (state, notifications) => {
  state.notifications = [...state.notifications, ...notifications];
};

const TOGGLE_NOTIFICATIONS = state => {
  state.showNotifications = !state.showNotifications;
};

const REPLACE_READ_NOTIFICATION = (state, readNotification) => {
  const newNotifications = state.notifications.map(notification => {
    if (readNotification.id === notification.id) {
      return { ...notification, ...readNotification };
    } else {
      return { ...notification };
    }
  });
  state.notifications = newNotifications;
};

const SET_LOAD_MORE_NOTIFICATION = (state, loadMore = false) => {
  state.isLoadMoreNotification = loadMore;
};

export default {
  SET_NOTIFICATIONS,
  TOGGLE_NOTIFICATIONS,
  REPLACE_READ_NOTIFICATION,
  SET_LOAD_MORE_NOTIFICATION
};
