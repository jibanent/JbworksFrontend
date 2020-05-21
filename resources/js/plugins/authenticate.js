import store from "../store";
import { checkAuthorization } from "./authorization";

const ifNotAuthenticated = (to, from, next) => {
  store.dispatch("checkLogin").then(response => {
    if (response.error) {
      next();
    } else {
      const { roles } = response.currentUser;
      if (roles.includes("admin")) {
        next({ name: "reports" });
      } else if (roles.includes("leader")) {
        next({ name: "projects" });
      } else {
        next({ name: "tasks" });
      }
    }
  });
};

const ifAuthenticated = (to, from, next) => {
  store.dispatch("checkLogin").then(response => {
    if (!response.error) {
      const { requiredRoles } = to.meta;
      const role = response.currentUser.roles[0];
      if (checkAuthorization(requiredRoles, role)) {
        next();
      } else {
        next({ name: "unauthorized" });
      }
    } else {
      next({ name: "login" });
    }
  });
};

export { ifNotAuthenticated, ifAuthenticated };
