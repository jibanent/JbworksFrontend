import Login from "./components/auth/Login";
import Reports from "./components/reports/Reports";
import Tasks from "./components/tasks/Tasks";
import TaskDetail from "./components/tasks/taskdetail/TaskDetail";
import Projects from "./components/projects/Projects";
import Users from "./components/users/Users";
import Departments from "./components/departments/Departments";
import TasksByProject from './components/projects/tasks/TasksByProject'
import Notfound from "./components/notFound/NotFound";
import ProjectEditing from './components/projects/settings/ProjectEditing';
import Permissions from './components/projects/settings/Permissions';

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
    path: "/tasks/:task.:id",
    name: "task-detail",
    component: TaskDetail,
    beforeEnter: ifAuthenticated
  },
  {
    path: "/projects",
    name: "projects",
    component: Projects,
    beforeEnter: ifAuthenticated
  },
  {
    path: "/projects/:project.:id",
    name: "tasks-by-project",
    component: TasksByProject,
    beforeEnter: ifAuthenticated
  },
  {
    path: "/projects/:project/:id/settings/",
    name: "project-editing",
    component: ProjectEditing,
    beforeEnter: ifAuthenticated
  },
  {
    path: "/projects/:project/:id/settings/acl",
    name: "permissions",
    component: Permissions,
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
