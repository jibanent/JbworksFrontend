import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'login',
    component: require('../views/login').default
  },
  {
    path: '/dashboard',
    name: 'dashboard',
    meta: { layout: 'base-layout' },
    component: () => import('../views/dashboard')
  },
  {
    path: '/users',
    name: 'users',
    meta: { layout: 'base-layout', breadcrumb: 'message.usersUsersList' },
    component: () => import('../views/users')
  },
  {
    path: '/profile/:id',
    name: 'profile',
    meta: { layout: 'base-layout' },
    component: () => import('../views/profile')
  },
  {
    path: '/role-permission',
    name: 'role-permission',
    meta: { layout: 'base-layout' },
    component: () => import('../views/role-permission')
  },
  {
    path: '/departments',
    name: 'departments',
    meta: { layout: 'base-layout' },
    component: () => import('../views/departments')
  },
  {
    path: '/tasks',
    name: 'tasks',
    meta: { layout: 'base-layout', breadcrumb: 'message.tasksTasksList' },
    component: () => import('../views/tasks')
  },
  {
    path: '/task/:id',
    name: 'task',
    meta: { layout: 'base-layout', breadcrumb: 'message.tasksTaskDetail' },
    component: () => import('../views/tasks/TaskDetail')
  },
  {
    path: '/customers',
    name: 'customers',
    meta: { layout: 'base-layout', breadcrumb: 'message.customersCustomersList' },
    component: () => import('../views/customers')
  },
  {
    path: '/customer/:id',
    name: 'customer',
    meta: { layout: 'base-layout', breadcrumb: 'message.customersCustomerDetail' },
    component: () => import('../views/customer-detail')
  },
  {
    path: '/reports',
    name: 'reports',
    meta: { layout: 'base-layout', breadcrumb: 'message.reportsSaleReports' },
    component: () => import('../views/reports')
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
