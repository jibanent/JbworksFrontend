import auth from './auth'
import sidebar from './sidebar'
import settings from './settings'
import users from './users'
import tasks from './tasks'
import customers from './customers'
import reports from './reports'

export default {
  message: {
    ...auth,
    ...sidebar,
    ...settings,
    ...users,
    ...tasks,
    ...customers,
    ...reports
  }
}
