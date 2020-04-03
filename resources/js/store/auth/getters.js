export default {
  isLoggedIn: state => {
    if(state.currentUser !== null){
      return true;
    }else {
      return false;
    }
  },
  currentUser: state => {
    return state.currentUser;
  }
};
