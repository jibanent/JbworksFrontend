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
import roles from './roles'

export default {
  message: {
    ...common,
    ...auth,
    ...sidebar,
    ...settings,
    ...users,
    ...tasks,
    ...customers,
<<<<<<< HEAD
    ...deparments,
    ...dashboard,
    ...targets,
    ...roles,
	  ...goals,
    ...reports
=======
    ...reports,
    ...departments,
    ...targets,
    ...roles
>>>>>>> da0ea647bc24b1cb7107623a395e8a40b03281e0
  }
}
