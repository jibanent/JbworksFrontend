import common from './common'
import auth from './auth'
import sidebar from './sidebar'
import settings from './settings'
import users from './users'
import tasks from './tasks'
import customers from './customers'
import reports from './reports'
import departments from './departments'
import goals from './goals'

export default {
  message: {
    ...common,
    ...auth,
    ...sidebar,
    ...settings,
    ...users,
    ...tasks,
    ...customers,
    ...reports,
    ...departments,
    ...goals
  }
}
