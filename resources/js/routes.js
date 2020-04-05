import Login from "./components/auth/Login";
import Reports from "./components/reports/Reports.vue";
import Tasks from "./components/tasks/Tasks.vue";
import Projects from "./components/projects/Projects.vue";
import Users from "./components/users/Users.vue";
import Departments from "./components/departments/Departments.vue";
import Notfound from "./components/notFound/NotFound";

import { ifNotAuthenticated, ifAuthenticated } from "./plugins/authenticate";

const routes = [
  {
    path: "/reports",
    name: "reports",
    component: Reports,
    beforeEnter: ifAuthenticated
  },
  {
    path: "/tasks",
    name: "tasks",
    component: Tasks,
    beforeEnter: ifAuthenticated
  },
  {
    path: "/tasks/department",
    name: "tasks-department",
    component: Tasks,
    beforeEnter: ifAuthenticated
  },
  {
    path: "/projects",
    name: "projects",
    component: Projects,
    beforeEnter: ifAuthenticated
  },
  {
    path: "/projects/admin",
    name: "projects-admin",
    component: Projects,
    beforeEnter: ifAuthenticated
  },
  {
    path: "/users",
    name: "users",
    component: Users,
    beforeEnter: ifAuthenticated
  },
  {
    path: "/departments",
    name: "departments",
    component: Departments,
    beforeEnter: ifAuthenticated
  },
  {
    path: "/",
    name: "login",
    component: Login,
    beforeEnter: ifNotAuthenticated
  },
  {
    path: "*",
    name: "not-found",
    component: Notfound
  }
];

export default routes;
