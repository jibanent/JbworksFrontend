/** =================================================================================
    CONVERSATIONS MUTATIONS
  =================================================================================*/

const OPEN_TAB_CONVERSATIONS = state => {
  (state.openTabConversations = true), (state.openTabUsers = false);
};

const OPEN_TAB_USERS = state => {
  (state.openTabConversations = false), (state.openTabUsers = true);
};

const SET_CONVERSATIONS = (state, conversations) => {
  state.currentPage = conversations.meta.current_page;
  state.lastPage = conversations.meta.last_page;
  if (state.currentPage === 1) {
    state.conversations = conversations.data;
  } else {
    state.conversations = [...state.conversations, ...conversations.data];
  }
};

const SET_CONVERSATION = (state, conversation) => {
  state.conversation = conversation;
};

const SET_RECEIVER = (state, receiver) => {
  state.receiver = receiver;
};

export default {
  OPEN_TAB_CONVERSATIONS,
  OPEN_TAB_USERS,
  SET_CONVERSATIONS,
  SET_CONVERSATION,
  SET_RECEIVER
};
