const SET_DEPARTMENTS = (state, departments) => {
  state.departments = departments;
};

const TOGGLE_ADD_DEPARTMENT_DIALOG = state => {
  state.showAddDepartmentDialog = !state.showAddDepartmentDialog;
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
  TOGGLE_ADD_DEPARTMENT_DIALOG,
  ADD_NEW_DEPARTMENT,
  findChild
};
