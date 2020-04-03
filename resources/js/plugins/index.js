// import store from "../store";

// import mapState from 'vuex'

// const  unAuthenticated = (to, from, next) => {
//   console.log('trong router', store.state.auth.isLogined);

//   if(!store.getters.isLogin) {
//     next()
//   }else{
//     next({
//       name: 'reports',
//       query: {
//         redirect: to.name
//       }
//     })
//   }
//   console.log("to", to);
//   console.log("from", from);
//   console.log("store", store);

//   // next();
// };

// const authenticated = (to, from, next) => {
//   console.log("to", to);
//   console.log("from", from);
//   console.log("store", store);

//   next();
// };

// export {
//   authenticated,
//   unAuthenticated
// };
