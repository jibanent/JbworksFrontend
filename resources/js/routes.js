import Reports from './components/reports/Reports.vue'
import Tasks from './components/tasks/Tasks.vue'
import Projects from './components/projects/Projects.vue'
import Users from './components/users/Users.vue'
import Departments from './components/departments/Departments.vue'

export const routes = [
  { path: '/reports', component: Reports },
  { path: '/tasks', component: Tasks},
  { path: '/projects', component: Projects},
  { path: '/users', component: Users},
  { path: '/departments', component: Departments},
]
