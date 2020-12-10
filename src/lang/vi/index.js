import auth from './auth'
import common from './common'
import sidebar from './sidebar'
import settings from './settings'
import users from './users'
import tasks from './tasks'
import customers from './customers'
import reports from './reports'
import deparments from './deparments'
import goals from './goals'
import dashboard from './dashboard'
import roles from './roles'
import targets from './targets'

export default {
  message: {
    ...common,
    ...auth,
    ...sidebar,
    ...settings,
    ...users,
    ...tasks,
    ...customers,
    ...deparments,
    ...dashboard,
    ...targets,
    ...roles,
	  ...goals,
    ...reports
  }
}
