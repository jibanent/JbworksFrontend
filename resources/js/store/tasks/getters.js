import moment from "moment";

const renderTasks = state => {
  const tasks = state.tasks.data;
  if (tasks) {
    const groups = tasks.reduce((accumulator, task) => {
      const startOfWeek = moment(task.created_at)
        .startOf("week")
        .format("YYYY-MM-DD");

      const endOfWeek = moment(task.created_at)
        .endOf("week")
        .format("YYYY-MM-DD");

      const dateWeek = `${startOfWeek} to ${endOfWeek}`;

      if (!accumulator[dateWeek]) accumulator[dateWeek] = [];

      accumulator[dateWeek].push(task);

      return accumulator;
    }, []);

    const result = Object.keys(groups).map(dateWeek => {
      return {
        from: dateWeek.substring(0, dateWeek.indexOf("to") - 1),
        to: dateWeek.substring(dateWeek.indexOf("to") + 3),
        value: groups[dateWeek]
      };
    });
    return result;
  }
};

const renderTask = state => {
  return state.task;
};

export default {
  renderTasks,
  renderTask
};
