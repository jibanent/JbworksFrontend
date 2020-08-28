/** =================================================================================
    MESSAGES MUTATIONS
  =================================================================================*/

const SET_LIST_USERS = (state, data) => {
  state.listUsers = data;
};

const TOGGLE_COLLAPSE_MESSAGES = state => {
  state.collapsedMessages = !state.collapsedMessages;
};

const TOGGLE_COLLAPSE_INBOX = state => {
  state.collapsedInbox = !state.collapsedInbox;
};

const OPEN_INBOX = state => {
  state.openInbox = true;
};

const CLOSE_INBOX = state => {
  state.openInbox = false;
};

const SET_MESSAGES = (state, messages) => {
  if (messages) {
    state.currentPage = messages.meta.current_page;
    state.lastPage = messages.meta.last_page;
    if (state.currentPage === 1) {
      state.messages = messages.data;
    } else {
      state.messages = [...state.messages, ...messages.data];
    }
  } else {
    state.messages = null;
  }
};

const SEND_NEW_MESSAGE = (state, message) => {
  const data = state.messages;
  data.unshift(message);
  state.messages = data;
};

export default {
  SET_LIST_USERS,
  TOGGLE_COLLAPSE_MESSAGES,
  TOGGLE_COLLAPSE_INBOX,
  OPEN_INBOX,
  CLOSE_INBOX,
  SET_MESSAGES,
  SEND_NEW_MESSAGE
};
