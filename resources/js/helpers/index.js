export const getAvatar = (avatarUrl = null) => {
  if (avatarUrl !== null) {
    return avatarUrl;
  } else {
    return "assets/images/avatar/default-avatar.png";
  }
};
