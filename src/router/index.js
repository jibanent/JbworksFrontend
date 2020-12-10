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
    meta: {  layout: 'base-layout',  title: 'message.dashboard',   breadcrumb: 'message.dashboardDashboard' },
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
    path: '/roles',
    name: 'roles',
    meta: { layout: 'base-layout', breadcrumb: 'message.platformAdministrationRoleAndPermission' },
    component: () => import('../views/role-permission/roles')
  },
  {
    path: '/role/:id',
    name: 'role',
    meta: { layout: 'base-layout' },
    component: () => import('../views/role-permission/permissions')
  },
  {
    path: '/departments',
    name: 'departments',
    meta: { layout: 'base-layout', breadcrumb: 'message.departmentsDepartmentsList' },
    component: () => import('../views/departments')
  },
  {
    path: '/department/:id',
    name: 'department',
    meta: { layout: 'base-layout' },
    component: () => import('../views/department-detail')
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
    path: '/companion',
    name: 'companion',
    meta: { layout: 'base-layout', breadcrumb: 'message.companion' },
    component: () => import('../views/companion')
  },
  {
    path: '/taskstype',
    name: 'taskstype',
    meta: { layout: 'base-layout', breadcrumb: 'message.tasktype' },
    component: () => import('../views/taskstype')
  },  
  {
    path: '/logs',
    name: 'logs',
    meta: { layout: 'base-layout', breadcrumb: 'message.activitylog' },
    component: () => import('../views/logs')
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
