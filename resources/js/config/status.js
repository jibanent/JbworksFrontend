
export const projectStatuses = {
  open: [
    {
      value: "on track",
      bg_color: "rgba(31, 181, 58, 0.1)",
      text_color: "#2ede4c"
    },
    {
      value: "off track",
      bg_color: "rgba(237, 203, 33, 0.1)",
      text_color: "#f1d248"
    },
    {
      value: "at risk",
      bg_color: "rgba(201, 46, 46, 0.1)",
      text_color: "#da4f4f"
    }
  ],
  close: [
    {
      value: "success",
      bg_color: "rgba(20, 204, 63, 0.1)",
      text_color: "#29ec56"
    },
    {
      value: "failed",
      bg_color: "rgba(195, 67, 67, 0.1)",
      text_color: "#d26363"
    },
    {
      value: "canceled",
      bg_color: "rgba(161, 161, 161, 0.1)",
      text_color: "#bbabab"
    }
  ]
};

export const taskStatus = {
  done: "done",
  doing: "doing",
  done_late: "done late",
  overdue: "overdue",
  urgent: "urgent",
  important: "important"
};
