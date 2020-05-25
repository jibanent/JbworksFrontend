const SET_DEPARTMENTS = (state, departments) => {
  state.departments = departments
}

const TOGGLE_ADD_DEPARTMENT_DIALOG = state => {
  console.log(state);

  state.showAddDepartmentDialog = !state.showAddDepartmentDialog
}

export default {
  SET_DEPARTMENTS,
  TOGGLE_ADD_DEPARTMENT_DIALOG
}
