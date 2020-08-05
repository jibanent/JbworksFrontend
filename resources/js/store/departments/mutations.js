const SET_DEPARTMENTS = (state, departments) => {
  state.departments = departments;
};

const SET_DEPARTMENT = (state, department) => {
  state.department = department;
};

const TOGGLE_ADD_DEPARTMENT_DIALOG = state => {
  state.showAddDepartmentDialog = !state.showAddDepartmentDialog;
};

const TOGGLE_EDIT_DEPARTMENT_DIALOG = state => {
  state.showEditDepartmentDialog = !state.showEditDepartmentDialog;
};

const TOGGLE_CONFIRM_DELETE_DEPARTMENT = state => {
  state.showConfirmDeleteDepartment = !state.showConfirmDeleteDepartment;
};

const ADD_NEW_DEPARTMENT = (state, department) => {
  const { data } = state.departments;
  const item = { ...department, children: [] };
  const parent = findChild(data, department.parent_id);
  if (parent) {
    parent.children.push(item);
  } else {
    data.unshift(item);
  }
};

const REPLACE_DEPARTMENT_UPDATED = (state, department) => {
  const { data } = state.departments;
  const item = { ...department, children: [] };
  const parent = findChild(data, department.parent_id);
  if (parent) {
    const newDepartment = parent.children.map(item => {
      if (department.id === item.id) {
        return { ...item, ...department };
      } else {
        return { ...item };
      }
    });
    parent.children = newDepartment;
  } else {
    const newDepartment = data.map(item => {
      if (department.id === item.id) {
        return { ...item, ...department };
      } else {
        return { ...item };
      }
    });
    state.departments.data = newDepartment;
  }
};

const DELETE_DEPARTMENT = (state, department) => {
  const { data } = state.departments;
  const item = { ...department, children: [] };
  const parent = findChild(data, department.parent_id);

  if (parent) {
    const newDepartments = parent.children.filter(item => {
      return item.id !== department.id;
    });
    parent.children = newDepartments;
  } else {
    const newDepartments = data.filter(item => {
      return item.id !== department.id;
    });
    state.departments.data = newDepartments;
  }
};

const findChild = (tree, parent_id) => {
  for (const item of tree) {
    if (item.id == parent_id) {
      return item;
    }
    if (item.children.length > 0) {
      const temp = findChild(item.children, parent_id);
      if (temp) {
        return temp;
      }
    }
  }
  return null;
};

export default {
  SET_DEPARTMENTS,
  SET_DEPARTMENT,
  TOGGLE_ADD_DEPARTMENT_DIALOG,
  TOGGLE_EDIT_DEPARTMENT_DIALOG,
  TOGGLE_CONFIRM_DELETE_DEPARTMENT,
  ADD_NEW_DEPARTMENT,
  REPLACE_DEPARTMENT_UPDATED,
  DELETE_DEPARTMENT,
  findChild
};
