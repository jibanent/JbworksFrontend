import auth from './auth'
import sidebar from './sidebar'
import settings from './settings'
import users from './users'

export default {
  auth: { ...auth },
  sidebar: { ...sidebar },
  settings: { ...settings },
  users: { ...users }
}
