export const checkAuthorization = (requiredRoles, role) => {
  if (requiredRoles) {
    if (requiredRoles.includes(role)) {
      return true;
    } else {
      return false;
    }
  }
  return true;
};
