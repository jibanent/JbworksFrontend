import Login from "./components/auth/Login";
import Reports from "./components/reports/Reports";
import Tasks from "./components/tasks/Tasks";
import TaskDetail from "./components/tasks/taskdetail/TaskDetail";
import Projects from "./components/projects/Projects";
import Users from "./components/users/Users";
import Departments from "./components/departments/Departments";
import TasksByProject from "./components/projects/tasks/TasksByProject";
import Notfound from "./components/errors/NotFound";
import Unauthorized from "./components/errors/Unauthorized";
import ProjectEditing from "./components/projects/settings/ProjectEditing";
import AccessControlList from "./components/projects/settings/AccessControlList";
import ProjectMembers from "./components/projects/settings/ProjectMembers";
import ProjectSettings from "./components/projects/settings/ProjectSettings";

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
    meta: {
      requiredRoles: ["admin", "leader"]
    },
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
    meta: {
      requiredRoles: ["admin", "leader"]
    },
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
    component: ProjectSettings,
    beforeEnter: ifAuthenticated,
    children: [
      {
        path: "",
        name: "project-editing",
        component: ProjectEditing
      },
      {
        path: "acl",
        name: "access-control-list",
        component: AccessControlList
      },
      {
        path: "members",
        name: "project-members",
        component: ProjectMembers,
      }
    ]
  },
  // {
  //   path: "/projects/:project/:id/settings/",
  //   name: "project-editing",
  //   component: ProjectEditing,
  //   beforeEnter: ifAuthenticated
  // },
  // {
  //   path: "/projects/:project/:id/settings/acl",
  //   name: "access-control-list",
  //   component: AccessControlList,
  //   beforeEnter: ifAuthenticated
  // },
  // {
  //   path: "/projects/:project/:id/settings/members",
  //   name: "project-members",
  //   component: ProjectMembers,
  //   beforeEnter: ifAuthenticated
  // },
  {
    path: "/projects/admin",
    name: "projects-admin",
    component: Projects,
    meta: {
      requiredRoles: ["admin"]
    },
    beforeEnter: ifAuthenticated
  },
  {
    path: "/users",
    name: "users",
    component: Users,
    meta: {
      requiredRoles: ["admin"]
    },
    beforeEnter: ifAuthenticated
  },
  {
    path: "/departments",
    name: "departments",
    component: Departments,
    meta: {
      requiredRoles: ["admin"]
    },
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
  },
  {
    path: "/unauthorized",
    name: "unauthorized",
    component: Unauthorized
  }
];

export default routes;
