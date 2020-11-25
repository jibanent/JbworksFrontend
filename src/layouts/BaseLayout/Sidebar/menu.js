export default {
  routes: [
    {
      menu_title: 'sidebar.dashboard',
      menu_icon: 'zmdi zmdi-view-dashboard',
      path: '/dashboard',
      active: false,
      child_routes: null
    },
    {
      menu_title: 'sidebar.departments',
      menu_icon: 'zmdi zmdi-group',
      path: '/departments',
      active: false,
      child_routes: null
    },
    {
      menu_title: 'sidebar.userManagement',
      menu_icon: 'zmdi zmdi-accounts',
      active: false,
      child_routes: [
        {
          route_name: 'users',
          path: '/users',
          menu_title: 'sidebar.users'
        },
        {
          route_name: 'role-permission',
          path: '/role-permission',
          menu_title: 'sidebar.rolePermission'
        }
      ]
    }
  ]
}
