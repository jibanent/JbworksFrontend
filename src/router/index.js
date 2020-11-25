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
    meta: { layout: 'base-layout', breadcrumb: 'users.usersUsersList' },
    component: () => import('../views/users')
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
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
