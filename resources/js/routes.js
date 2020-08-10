import Login from "./views/auth/Login";
import Reports from "./views/reports/Reports";
import Tasks from "./views/tasks/Tasks";
import TaskDetail from "./views/tasks/taskdetail/TaskDetail";
import Projects from "./views/projects/Projects";
import Users from "./views/users/Users";
import Departments from "./views/departments/Departments";
import TasksByProject from "./views/projects/tasks/TasksByProject";
import Notfound from "./views/errors/NotFound";
import Unauthorized from "./views/errors/Unauthorized";
import ProjectEditing from "./views/projects/settings/ProjectEditing";
import AccessControlList from "./views/projects/settings/AccessControlList";
import ProjectMembers from "./views/projects/settings/ProjectMembers";
import ProjectSettings from "./views/projects/settings/ProjectSettings";
import Profile from "./views/account/Profile";
import ImportUsers from './views/users/ImportUsers'
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
      requiredRoles: ["admin", "leader", "manager"]
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
    path: "/tasks/department/:task.:id",
    name: "task-detail-department",
    component: TaskDetail,
    beforeEnter: ifAuthenticated
  },
  {
    path: "/tasks/:project.:projectId/:task.:id",
    name: "task-detail-project",
    component: TaskDetail,
    beforeEnter: ifAuthenticated
  },
  {
    path: "/projects",
    name: "projects",
    component: Projects,
    meta: {
      requiredRoles: ["admin", "leader", "manager"]
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
        component: ProjectMembers
      }
    ]
  },
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
      requiredRoles: ["admin", "leader", "manager"]
    },
    beforeEnter: ifAuthenticated
  },
  {
    path: "/users/import",
    name: "import-users",
    component: ImportUsers,
    meta: {
      requiredRoles: ["admin", "leader", "manager"]
    },
    beforeEnter: ifAuthenticated
  },
  {
    path: "/departments",
    name: "departments",
    component: Departments,
    meta: {
      requiredRoles: ["admin", "leader", "manager"]
    },
    beforeEnter: ifAuthenticated
  },
  {
    path: "/profile",
    name: "profile",
    component: Profile,
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
