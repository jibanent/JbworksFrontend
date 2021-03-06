export default class Auth {
  constructor(auth) {
    this.auth = auth;
  }

  roles() {
    if (this.auth.currentUser) {
      return this.auth.currentUser.roles;
    }
  }

  permissions() {
    if (this.auth.currentUser) {
      return this.auth.currentUser.permissions.map(
        permission => permission.name
      );
    }
  }

  isAdmin() {
    if (this.roles()) {
      return this.roles().includes("admin");
    }
  }

  isLeader() {
    if (this.roles()) {
      return this.roles().includes("leader");
    }
  }

  isManager() {
    if (this.roles()) {
      return this.roles().includes("manager");
    }
  }

  isMember() {
    if (this.roles()) {
      return this.roles().includes("member");
    }
  }

  can(permissionName) {
    if (this.permissions()) {
      return this.permissions().includes(permissionName);
    }
  }
}
