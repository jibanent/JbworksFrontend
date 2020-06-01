const renderMyNotifications = state => {
  const myNotifications = state.notifications;
  if (myNotifications) {
    const groups = myNotifications.reduce(function(r, a) {
      let date = a.created_at.split(" ")[0];
      if (!r[date]) {
        r[date] = [];
      }
      r[date].push(a);
      return r;
    }, {});

    const notifications = Object.keys(groups).map(date => {
      return {
        created_at: date,
        value: groups[date]
      };
    });
    return notifications;
  } else {
    return [];
  }
};

const unreadNotificationsCount = state => {
  const myNotifications = state.notifications;
  let count = 0;
  if (myNotifications) {
    const result = myNotifications.filter(notification => {
      return !notification.read_at;
    });
    count = result.length;
  }

  return count;
};

export default {
  renderMyNotifications,
  unreadNotificationsCount
};
