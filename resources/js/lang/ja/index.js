import sidebar from "./sidebar";
// import account from "./account";
import tasks from "./tasks";
// import auth from "./auth";
import projects from "./projects";
import common from "./common";
import users from "./users";
import departments from "./departments";
import comments from './comments'
import messages from './messages'
import permissions from './permissions'

export default {
  ...sidebar,
  ...tasks,
  ...projects,
  ...common,
  ...users,
  ...departments,
  ...comments,
  ...messages,
  ...permissions
};