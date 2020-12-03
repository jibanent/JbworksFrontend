export default {
  routes: [
    {
      menu_title: 'message.dashboard',
      menu_icon: 'zmdi zmdi-view-dashboard',
      path: '/dashboard',
      active: false,
      child_routes: null
    },
    {
      menu_title: 'message.departments',
      menu_icon: 'zmdi zmdi-group',
      path: '/departments',
      active: false,
      child_routes: null
    },
    {
      menu_title: 'message.userManagement',
      menu_icon: 'zmdi zmdi-accounts',
      active: false,
      child_routes: [
        {
          route_name: 'users',
          path: '/users',
          menu_title: 'message.users'
        },
        {
          route_name: 'role-permission',
          path: '/role-permission',
          menu_title: 'message.rolePermission'
        }
      ]
    },
    {
      menu_title: 'message.tasks',
      menu_icon: 'zmdi zmdi-case',
      path: '/tasks',
      active: false,
      child_routes: null
    },
    {
      menu_title: 'message.customers',
      menu_icon: 'zmdi zmdi-case',
      path: '/customers',
      active: false,
      child_routes: null
    }
  ]
}
