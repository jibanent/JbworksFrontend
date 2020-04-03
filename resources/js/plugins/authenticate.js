import store from "../store";

const ifNotAuthenticated = (to, from, next) => {
  store.dispatch("checkLogin").then(response => {
    if (response.error) {
      next();
    } else {
      next({ name: "reports" });
    }
  });
};

const ifAuthenticated = (to, from, next) => {
  store.dispatch("checkLogin").then(response => {
    if (!response.error) {
      next();
    } else {
      next({ name: "login" });
    }
  });
};

export { ifNotAuthenticated, ifAuthenticated };
