export const AUTH_CONFIG = {
  clientId: 'RkRu3zjZW0wskPE67zGOPmaIytLwv141',
  domain: 'adminify.auth0.com',
  callbackUrl: process.env.NODE_ENV === 'development' ? 'http://localhost:8080/callback' : 'http://bebo.theironnetwork.org/callback',
  apiUrl: 'API_IDENTIFIER'
}
