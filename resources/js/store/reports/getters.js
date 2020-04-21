import moment from "moment";

const getDateLabel = state => {
  const label = [];
  for (const key in state.taskStatsByDate)
    label.push(moment(state.taskStatsByDate[key].date).format("DD/MM/YYYY"));
  return label;
};

const getTotalTaskByDate = state => {
  const stats = [];
  for (const key in state.taskStatsByDate)
    stats.push(state.taskStatsByDate[key].total);
  return stats;
};

const getCompleteTaskByDate = state => {
  const stats = [];
  for (const key in state.taskStatsByDate)
    stats.push(state.taskStatsByDate[key].completed);
  return stats;
};

const getOverdueTaskByDate = state => {
  const stats = [];
  for (const key in state.taskStatsByDate)
    stats.push(state.taskStatsByDate[key].overdue);
  return stats;
};

const getProcessingTaskByDate = state => {
  const stats = [];
  for (const key in state.taskStatsByDate)
    stats.push(state.taskStatsByDate[key].processing);
  return stats;
};

const getWeekLabel = state => {
  const label = [];
  for (const key in state.taskStatsByWeek)
    label.push(
      moment(state.taskStatsByWeek[key].from).format("DD/MM") +
        "-" +
        moment(state.taskStatsByWeek[key].to).format("DD/MM/YYYY")
    );
  return label;
};

const getTotalTaskByWeek = state => {
  const stats = [];
  for (const key in state.taskStatsByWeek)
    stats.push(state.taskStatsByWeek[key].total);
  return stats;
};

const getCompleteTaskByWeek = state => {
  const stats = [];
  for (const key in state.taskStatsByWeek)
    stats.push(state.taskStatsByWeek[key].completed);
  return stats;
};

const getOverdueTaskByWeek = state => {
  const stats = [];
  for (const key in state.taskStatsByWeek)
    stats.push(state.taskStatsByWeek[key].overdue);
  return stats;
};

const getProcessingTaskByWeek = state => {
  const stats = [];
  for (const key in state.taskStatsByWeek)
    stats.push(state.taskStatsByWeek[key].processing);
  return stats;
};

const getDepartmentLabel = state => {
  const label = [];
  for (const key in state.taskStatsByDepartment)
    label.push(state.taskStatsByDepartment[key].department.name);
  return label;
};

const getTotalTaskByDepartment = state => {
  const stats = [];
  for (const key in state.taskStatsByDepartment)
    stats.push(state.taskStatsByDepartment[key].total);
  return stats;
};

const getCompleteTaskByDepartment = state => {
  const stats = [];
  for (const key in state.taskStatsByDepartment)
    stats.push(
      state.taskStatsByDepartment[key].completed_ontime +
        state.taskStatsByDepartment[key].completed_late
    );
  return stats;
};

const getOverdueTaskByDepartment = state => {
  const stats = [];
  for (const key in state.taskStatsByDepartment)
    stats.push(state.taskStatsByDepartment[key].overdue);
  return stats;
};

const getProcessingTaskByDepartment = state => {
  const stats = [];
  for (const key in state.taskStatsByDepartment)
    stats.push(state.taskStatsByDepartment[key].processing);
  return stats;
};

export default {
  getDateLabel,
  getTotalTaskByDate,
  getCompleteTaskByDate,
  getOverdueTaskByDate,
  getProcessingTaskByDate,
  getWeekLabel,
  getTotalTaskByWeek,
  getCompleteTaskByWeek,
  getOverdueTaskByWeek,
  getProcessingTaskByWeek,
  getDepartmentLabel,
  getTotalTaskByDepartment,
  getCompleteTaskByDepartment,
  getOverdueTaskByDepartment,
  getProcessingTaskByDepartment
};
