import auth from './auth'
import sidebar from './sidebar'
import settings from './settings'
import users from './users'
import tasks from './tasks'

export default {
  message: {
    ...auth,
    ...sidebar,
    ...settings,
    ...users,
    ...tasks
  }
}
